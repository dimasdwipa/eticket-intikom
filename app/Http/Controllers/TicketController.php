<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Lokasi;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Complain;
use App\Models\Team;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Pagination\Paginator; // <-- 1. TAMBAHKAN INI DI ATAS


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (auth()->guest() || ! auth()->user()->currentTeam) {

                return redirect('teams');

            }

            if (Auth::user()->role=="user"||Auth::user()->role=="administrator"||Auth::user()->role=="supervisor-agent-user"||Auth::user()->role=="supervisor-user"||Auth::user()->role=="agent-user"||Auth::user()->role=="manager"){

                return $next($request);
            }else{
                return redirect('no-access');
            }


        });

    }
    public function index()
    {

        // if(!empty($_GET['start_date'])&&!empty($_GET['end_date'])){
        //     $tickets=Ticket::whereBetween('created_at',[$_GET['start_date'],  $_GET['end_date']])->get();
        // }else{




            $tickets=Ticket::where('user_id',Auth::id())
            ->where('status','!=','Closed')
            ->where('status','!=','Canceled')
            ->allTeams()
            ->when(!empty($_GET['status']),function($query){
                    return $query->where('status', $_GET['status']);
             })
            ->orderby('created_at','desc')->get();


            $tickets_icon=Ticket::whereBetween('created_at',[Carbon::now()->startOfYear(), Carbon::now()])
            ->where('user_id',Auth::id())
            ->allTeams()
            // ->when(!empty($_GET['status']),function($query){
            //     return $query->where('status', $_GET['status']);
            //  })
            ->orderby('created_at','desc')->get();


        // }

        return view('ticket.home')
        ->with('tickets',$tickets)
        ->with('tickets_icon',$tickets_icon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create')
        ->with('teams',Team::orderby('code')->get())
        ->with('lokasi',Lokasi::orderby('created_at','desc')->AllTeams()->get())
        ->with('kategori',Kategori::orderby('created_at','desc')->AllTeams()->get())
        ->with('subkategori',SubKategori::orderby('created_at','desc')->AllTeams()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'lokasi.*' => 'required|integer',
            'katagori.*' => 'required|integer',
            'subkategori.*' => 'required|integer',
            'problem.*' => 'required',
            'team_id.*' => 'required',
        ]);

        $startOfYear = Carbon::now()->startOfYear();
        $block_add_ticket=Ticket::where('user_id',Auth::id())
        ->where('status','closed')
        ->where('created_at', '>', $startOfYear)
        ->wherenull('rating')
        ->first();

        if(!empty($block_add_ticket)){
            return back()->with('error','Anda belum memberikan rating pada ticket #'.$block_add_ticket->code.', mohon memberikan rating terlebih dahulu ');
        }

        $code=strtotime(now());
        DB::beginTransaction();

        try {
            foreach($request->team_id as $key => $item){
                $file_data=false;
                $sk=  SubKategori::AllTeams()->find($request->subkategori[$key]);
                $save = new Ticket();
                $save->code=$code.$key;
                $save->tanggal=$request->tanggal;
                $save->bu=$request->bu;
                $save->user_id=Auth::user()->id;
                $save->lokasi_id=$request->lokasi[$key];
                $save->katagori_id=$request->katagori[$key];
                $save->sub_katagori_id=$request->subkategori[$key];
                $save->problem=$request->problem[$key];
                $save->prioritas = $request->prioritas[$key];
                $save->team_id = $request->team_id[$key];

                $save->sla_ticket_time=$sk->extend_ticket_SLA_default;

                $save->sla_response_time=$sk->extend_response_SLA_default;
                $save->send_assignment_default=$sk->send_assignment_default;

                try {
                    $save->files=$code.$key.'.'.$request->file('files')[$key]->extension() ??null;
                    $file_data=true;
                } catch (\Throwable $th) {
                    //throw $th;
                }

                $save->save();

                if($file_data){
                 try{

                    $filePath = Storage::putFileAs("public/files/tickets",$request->file('files')[$key],$code.$key.'.'.$request->file('files')[$key]->extension());

                    }catch (\Throwable $th) {

                        DB::rollBack();
                    }
                }

                $data = new Complain();
                $data->ticket_id = $save->id;
                $data->user_id = Auth::user()->id;
                $data->comment = $request->problem[$key];
                $data->note = $sk->sub_kategori;
                $data->status="Open Ticket";
                $data->approve=null;
                $data->team_id = $request->team_id[$key];
                $data->save();


            }




            DB::commit();
            $email=new MailController();
            $email->newticket($code);


        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return back()->with('error',$th);
        }


        return redirect('ticket')->with('success','Create Ticket #'.$save->code.' successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function close(Request $request){
        $validated = $request->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);

        $data = Ticket::allTeams()->find($request->id);
        $data->rating = $request->rating;
        $data->state = "Responded";
        $data->sla_close = now();
        $data->comment_requestor = $request->comment;
        if($data->agent_id!=null){

            $data->status = 'Closed';
        }else{
            $data->status = 'Canceled';
        }
        $data->save();

        $data2 = new Complain();
        $data2->ticket_id = $request->id;
        $data2->user_id = Auth::user()->id;
        $data2->comment = $request->comment;

        if($data->agent_id!=null){

            $data2->status = 'Closed';
        }else{
            $data2->status = 'Canceled';
        }
        $data2->approve = null;
        $data2->save();


        $email=new MailController();
        $email->actionclose($data,$data->id);

        return back()->with('success','Closing Ticket #'.$data->code.' successfully.');
    }

    public function complain(Request $request){
        $validated = $request->validate([
            'comment' => 'required|min:4'
        ]);

        $data = Ticket::allTeams()->find($request->id);
        if($data->status!="Open"){

            // ini merubah ke on progres
            // $data->status = "On Progress";
        }
        $data->state = "Request Feedback";
        $data->sla_resolved = null;
        $data->save();


        $data2 = new Complain();
        $data2->ticket_id = $request->id;
        $data2->user_id = Auth::user()->id;
        $data2->comment = $request->comment;
        $data2->status = "Complain";
        $data2->agent_id = $data->agent_id;
        $data2->supervisor_id = $data->supervisor_id;
        $data2->approve = null;
        $data2->team_id = $data->team_id;
        $data2->save();

        $email=new MailController();
        $email->actioncomplain($data,$data2->id);


        return back()->with('success','Complaint Ticket #'.$request->code.' has been sent successfully.');
    }

    public function rating(Request $request){
        $validated = $request->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);


        $data = Ticket::allTeams()->find($request->id);
        $data->rating = $request->rating;
        $data->comment_requestor = $request->comment;
        $data->save();

        $data2 = new Complain();
        $data2->ticket_id = $request->id;
        $data2->user_id = Auth::user()->id;
        $data2->comment = $request->comment;
        $data2->status = 'Give Rating';
        $data2->approve = null;
        $data2->team_id = $data->team_id;
        $data2->save();


        $email=new MailController();
        $email->actiongiverating($data,$data->id);

        return back()->with('success','Rating Ticket #'.$data->code.' successfully.');
    }

    public function report(Request $request)
    {
        // Hanya menampilkan view, data akan diambil oleh JavaScript.
        return view('ticket.summary-report');
    }

    public function getSummaryReportApi(Request $request)
    {
        // 2. Ambil parameter 'length' & 'start' yang dikirim oleh DataTables
        $length = $request->input('length', 15);
        $start = $request->input('start', 0);
        $page = ($start / $length) + 1;

        // 3. Beritahu Laravel secara manual halaman mana yang sedang diminta
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });
        
        $startDate = $request->input('start_date', date('Y-01-01'));
        $endDate = $request->input('end_date', date('Y-m-d'));

        // Query-nya tetap sama, tapi sekarang paginate() akan menggunakan halaman yang benar
        $paginatedTickets = Ticket::with(['agent:id,name', 'user:id,name', 'lokasi', 'katagori', 'sub_katagori', 'team'])
            ->where('user_id', Auth::id())
            ->allTeams()
            ->when($request->filled('team_id'), function ($query) use ($request) {
                $query->where('team_id', $request->team_id);
            })
            ->when($request->filled('filter_by') && $request->filled('keyword'), function ($query) use ($request) {
                $query->where($request->filter_by, 'like', '%' . $request->keyword . '%');
            })
            ->whereBetween('tickets.created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->orderby('tickets.created_at', 'desc')
            ->paginate($length); // 4. Gunakan variabel $length di sini

        // Format JSON sudah benar dan tidak perlu diubah
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $paginatedTickets->total(),
            "recordsFiltered" => $paginatedTickets->total(),
            "data" => $paginatedTickets->items()
        ]);
    }
}
