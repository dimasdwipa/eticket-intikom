<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Lokasi;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Complain;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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

            if (Auth::user()->role=="user"||Auth::user()->role=="administrator"||Auth::user()->role=="supervisor-agent-user"){

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
            ->orderby('created_at','desc')->get();


            $tickets_icon=Ticket::whereBetween('created_at',[ Carbon::now()->startOfYear(), Carbon::now()])
            ->where('user_id',Auth::id())
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
        ->with('lokasi',Lokasi::orderby('created_at','desc')->get())
        ->with('kategori',Kategori::orderby('created_at','desc')->get())
        ->with('subkategori',SubKategori::orderby('created_at','desc')->get());
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
        ]);

        $code=strtotime(now());

        DB::beginTransaction();

        try {
            foreach($request->katagori as $key => $item){


                $file_data=false;
                $sk=  SubKategori::find($request->subkategori[$key]);

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
                    Storage::putFileAs("public/files/tickets",$request->file('files')[$key],$code.$key.'.'.$request->file('files')[$key]->extension());
                 }



                $data = new Complain();
                $data->ticket_id = $save->id;
                $data->user_id = Auth::user()->id;
                $data->comment = $request->problem[$key];
                $data->note = $sk->sub_kategori;
                $data->status="Open Ticket";
                $data->approve=null;
                $data->save();

            }

            $email=new MailController();
            $email->newticket($code);

            DB::commit();



        } catch (\Throwable $th) {
            DB::rollBack();
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

        $data = Ticket::find($request->id);
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

        $data = Ticket::find($request->id);
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

        $data = Ticket::find($request->id);
        $data->rating = $request->rating;
        $data->comment_requestor = $request->comment;
        $data->save();

        $data2 = new Complain();
        $data2->ticket_id = $request->id;
        $data2->user_id = Auth::user()->id;
        $data2->comment = $request->comment;
        $data2->status = 'Give Rating';
        $data2->approve = null;
        $data2->save();


        $email=new MailController();
        $email->actiongiverating($data,$data->id);

        return back()->with('success','Rating Ticket #'.$data->code.' successfully.');
    }

    public function report(Request $request){

        $hari_ini = date("Y-m-d");
        $tgl_pertama = date('Y-01-01', strtotime($hari_ini));
        $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));

        if(!empty($_GET['start_date'])){
            $tgl_pertama=$_GET['start_date'];
        }

        if(!empty($_GET['end_date'])){

            $tgl_terakhir= $_GET['end_date'];
        }

        $tickets=Ticket::select('tickets.*','users.name')
            ->leftjoin('users','tickets.agent_id','=','users.id')
            ->where('user_id',Auth::id())
            ->when(!empty($_GET['filter_by']),function($query){
                return $query->where($_GET['filter_by'], 'like',  '%'.$_GET['keyword'].'%');
             })
            ->whereBetween('tickets.created_at', [$tgl_pertama.' 00:00:00', $tgl_terakhir.' 23:59:59'])
            ->orderby('tickets.created_at','desc')->get();


        return view('ticket.summary-report')
        ->with('tickets',$tickets);
    }
}
