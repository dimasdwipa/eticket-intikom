<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Lokasi;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Complain;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;


class AgentController extends Controller
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

        if (Auth::user()->role=="agent"||Auth::user()->role=="administrator"||Auth::user()->role=="supervisor-agent"||Auth::user()->role=="supervisor-agent-user"||Auth::user()->role=="agent-user"){

            return $next($request);
        }else{
            return redirect('no-access');
        }


        });
    }


    public function index()
    {
        $tickets_icon=Ticket::whereBetween('created_at',[Carbon::now()->startOfYear(), Carbon::now()])
        ->where('user_id',Auth::id())
        // ->when(!empty($_GET['status']),function($query){
        //     if($_GET['status']!='Overdue'){
        //         return $query->where('status', 'On Progress')
        //         ->whereRaw('DATE_ADD(sla_respone , interval sla_ticket_time MINUTE) < now()')
        //         ->whereNotNull('sla_respone');
        //     }else{
        //         return $query->where('status', $_GET['status']);
        //     }
        //  })
        ->orderby('created_at','desc')->get();

        $tickets=Ticket::whereBetween('created_at',[Carbon::now()->startOfYear(), Carbon::now()])
        ->where('agent_id',Auth::id())
        ->when(!empty($_GET['status']),function($query){
            if($_GET['status']!='Overdue'){
                return $query->where('status', 'On Progress')
                // ->whereRaw('DATE_ADD(sla_respone , interval sla_ticket_time MINUTE) < now()')
                ->whereRaw('DATEADD(MINUTE, sla_ticket_time, sla_respone) < GETDATE()')
                ->whereNotNull('sla_respone');
            }else{
                return $query->where('status', $_GET['status']);
            }
         })
        ->where(function($query){
            $query->orwhere('status','!=','Closed');
        })
        ->orderby('created_at','desc')->get();



        return view('agent.home')
        ->with('tickets_icon',$tickets_icon)
        ->with('tickets',$tickets);
    }

    public function assignment()
    {
        return view('agent.myticket')
            ->with('lokasi', Lokasi::orderby('created_at', 'desc')->get())
            ->with('kategori', Kategori::orderby('created_at', 'desc')->get())
            ->with('subkategori', SubKategori::orderby('created_at', 'desc')->get());
    }

    public function getMyTicketsApi(Request $request)
    {
        // Ambil parameter pagination dari DataTables
        $length = $request->input('length', 15);
        $start = $request->input('start', 0);
        $page = ($start / $length) + 1;

        // Beritahu Laravel halaman mana yang sedang diminta
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });
        
        // Ambil parameter filter dari request AJAX
        $startDate = $request->input('start_date', date('Y-01-01'));
        $endDate = $request->input('end_date', date('Y-m-d'));

        // Query builder utama yang sudah dioptimalkan
        $query = Ticket::with(['user:id,name', 'lokasi', 'katagori', 'sub_katagori'])
            ->where('tickets.agent_id', Auth::id())
            ->where('tickets.status', '!=', 'Open')
            ->where('tickets.status', '!=', 'Canceled');

        // Terapkan filter kustom jika ada
        $query->when($request->filled('filter_by') && $request->filled('keyword'), function ($q) use ($request) {
            $q->where($request->filter_by, 'like', '%' . $request->keyword . '%');
        });
        
        // Terapkan filter tanggal jika ada
        $query->when($request->filled('start_date') && $request->filled('end_date'), function ($q) use ($startDate, $endDate) {
            $q->whereBetween('tickets.created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
        });

        // Terapkan filter dari searchbox utama DataTables
        if ($request->filled('search.value')) {
            $searchValue = $request->input('search.value');
            $query->where(function($q) use ($searchValue) {
                $q->where('code', 'like', "%{$searchValue}%")
                  ->orWhere('problem', 'like', "%{$searchValue}%")
                  ->orWhere('status', 'like', "%{$searchValue}%")
                  ->orWhereHas('user', function($subQuery) use ($searchValue) {
                      $subQuery->where('name', 'like', "%{$searchValue}%");
                  });
            });
        }

        // Eksekusi query dengan ordering dan paginasi
        $paginatedTickets = $query->orderby('tickets.created_at', 'desc')->paginate($length);

        // Format JSON agar sesuai dengan DataTables
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $paginatedTickets->total(),
            "recordsFiltered" => $paginatedTickets->total(),
            "data" => $paginatedTickets->items()
        ]);
    }

    public function response(Request $request){

        $validated = $request->validate([
            'id' => 'required',
            'status' => 'required|max:255',
            'comment' => 'required'
        ]);

        DB::beginTransaction();

        try {

        $data = Ticket::find($request->id);
        if($request->status=="End Repair"){
            $data->status = "On Progress";
            $data->sla_repair_end = now();
        }
        elseif($request->status=="End Repair"){
            $data->status = "On Progress";
            $data->sla_repair_end = now();
        }
        elseif($request->status=="End Pending"){
            $data->status = "On Progress";
            $data->sla_pending_end = now();

        }elseif($request->status=="On Progress"){
            $data->sla_respone=now();
            $data->estimation_date=Carbon::now()->addMinutes($data->sla_ticket_time);
            $data->status = "On Progress";


        }elseif($request->status=="Resolved"){
            $data->sla_resolved=now();
            $data->state="Responded";
            $data->solution=$request->comment;
            $data->note=$request->note;
            $data->status = "Resolved";
        }
        $data->save();


        $data2 = new Complain();
        $data2->ticket_id = $request->id;
        $data2->agent_id = Auth::user()->id;
        $data2->comment = $request->comment;
        $data2->note = $request->note;
        if($request->status=="On Progress"){
            $data2->status="Response";
        }elseif($request->status=="Resolved"){
            $data2->status="Resolved";
        }elseif($request->status=="End Repair"){
            $data2->status="End Repair";
        }
        elseif($request->status=="End Pending"){
            $data2->status="End Pending";
        }
        $data2->approve=null;
        $data2->save();


        // Panggil email. Laravel akan otomatis menggunakan driver 'log' di lokal 
        // dan 'smtp' di production berdasarkan file .env Anda.
        if($request->status=="On Progress"){
            $email = new MailController();
            $email->actionticket($data->id,"response");
        }elseif($request->status=="Resolved"){
            $email = new MailController();
            $email->actionticket($data->id,"resolved");
        }

        DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            // Jika terjadi error, kirim response JSON yang sesuai
            if ($request->ajax()) {
                // Berikan pesan error yang lebih detail saat development
                return response()->json(['error' => 'An error occurred: ' . $th->getMessage()], 500);
            }
            return back()->with('error', $th->getMessage());
            }

                // Siapkan pesan sukses
                $message = 'Action completed successfully for Ticket #'.$data->code;
                if($request->status=="On Progress"){
                    $message = 'Ticket #'.$data->code.' have been responded to with you, Enjoy your work !';
                }elseif($request->status=="Resolved"){
                    $message = 'Ticket #'.$data->code.' has been resolved with you !';
                }

                // Kirim response JSON jika ini adalah request AJAX
                if ($request->ajax()) {
                    return response()->json(['success' => $message]);
                }

                // Fallback untuk non-AJAX
                return back()->with('success', $message);
            }


    public function request(Request $request){
        $validated = $request->validate([
            'id' => 'required',
            'status' => 'required|max:255',
            'comment' => 'required'
        ]);

        $ticket = Ticket::find($request->id);
        if ($request->status === 'Request Pending') {
            $ticket->status = 'Pending'; // Ubah status tiketnya
            $ticket->sla_pending = now(); // Catat waktu mulai pending
        } else if ($request->status === 'Request Repair') {
            $ticket->status = 'Repairing'; // Ubah status tiketnya
            $ticket->sla_repair = now(); // Catat waktu mulai repair
        }
        $ticket->save();

        $data2 = new Complain();
        $data2->ticket_id = $request->id;
        $data2->agent_id = Auth::user()->id;
        $data2->comment = $request->comment;
        $data2->note = $request->note;
        $data2->sla_request=$request->start_date??null;
        $data2->sla_request_end=$request->end_date??null;
        $data2->close_request=$request->close_request??null;
        if($request->status=="Unable Respond"){
            $data2->extend_response_SLA=$request->extend_SLA??null;
        }else{
            $data2->extend_SLA=$request->extend_SLA??null;
        }
        $data2->status=$request->status;
        $data2->save();

        $email=new MailController();

        $email->actionticket($data2->id,"agent reuqest");

        return back()->with('success',$request->status.' have been seen to supervisor !');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hari_ini = date("Y-m-d");
        $tgl_pertama = date('Y-01-01', strtotime($hari_ini));
        $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));

        if (!empty($_GET['start_date'])) {
            $tgl_pertama = $_GET['start_date'];
        }

        if (!empty($_GET['end_date'])) {

            $tgl_terakhir = $_GET['end_date'];
        }

        $tickets = Complain::select('complains.*', 'users.name')
            ->leftjoin('users', 'complains.agent_id', '=', 'users.id')
            ->leftjoin('tickets', 'complains.ticket_id', '=', 'tickets.id')
            ->when(!empty($_GET['filter_by']), function ($query) {
                return $query->where($_GET['filter_by'], 'like',  '%' . $_GET['keyword'] . '%');
            })
            ->where(function($query){
                if(!empty($_GET['alltype'])){
                    if($_GET['alltype']==1){
                        $query->where('complains.approve', 'await')
                        ->orwhere('complains.approve', 'aproved')
                        ->orwhere('complains.approve', 'rejected');
                    }else{

                        $query->where('complains.approve', 'await');
                    }
                }else{
                    $query->where('complains.approve', 'await');
                }

            })
            ->where('complains.agent_id', Auth::id())
            ->orderby('complains.created_at', 'desc')->get();



        $agents = User::where(
            function($query){
                $query->where('role','supervisor-agent')
                ->orwhere('role','supervisor-agent-user')
                ->orwhere('role','agent')
                ->orwhere('role','agent-user');
            }
        )
            ->orderby('name', 'asc')
            ->get();

        return view('agent.request-extend')
            ->with('agents', $agents)
            ->with('tickets', $tickets);
    }

    public function complain()
    {
        $hari_ini = date("Y-m-d");
        $tgl_pertama = date('Y-01-01', strtotime($hari_ini));
        $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));

        if (!empty($_GET['start_date'])) {
            $tgl_pertama = $_GET['start_date'];
        }

        if (!empty($_GET['end_date'])) {

            $tgl_terakhir = $_GET['end_date'];
        }

        $tickets = Complain::select('complains.*', 'users.name')
            ->leftjoin('users', 'complains.agent_id', '=', 'users.id')
            ->leftjoin('tickets', 'complains.ticket_id', '=', 'tickets.id')
            ->when(!empty($_GET['filter_by']), function ($query) {
                return $query->where($_GET['filter_by'], 'like',  '%' . $_GET['keyword'] . '%');
            })
            ->where('complains.status',"Complain")
            ->where('complains.agent_id', Auth::id())
            ->orderby('complains.created_at', 'desc')->get();



        $agents = User::where(function($query){
            $query->where('role','supervisor-agent')
            ->orwhere('role','supervisor-agent-user')
            ->orwhere('role','agent')
            ->orwhere('role','agent-user');
        })
            ->orderby('name', 'asc')
            ->get();

        return view('agent.complain')
            ->with('agents', $agents)
            ->with('tickets', $tickets);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function request_extend(){

    }
}
