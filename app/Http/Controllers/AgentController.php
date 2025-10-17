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

        $hari_ini = date("Y-m-d");
        $tgl_pertama =  date('Y-01-01', strtotime($hari_ini));
        $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));

        if(!empty($_GET['start_date'])){
            $tgl_pertama=$_GET['start_date'];
        }

        if(!empty($_GET['end_date'])){

            $tgl_terakhir= $_GET['end_date'];
        }

        $tickets=Ticket::select('tickets.*','users.name')
            ->leftjoin('users','tickets.agent_id','=','users.id')
            ->when(!empty($_GET['filter_by']),function($query){
                return $query->where($_GET['filter_by'], 'like',  '%'.$_GET['keyword'].'%');
             })
            ->whereBetween('tickets.created_at', [$tgl_pertama.' 00:00:00', $tgl_terakhir.' 23:59:59'])
            ->where('tickets.agent_id',Auth::id())
            ->where('tickets.status','!=','Open')
            ->where('tickets.status','!=','Canceled')
            ->orderby('tickets.created_at','desc')->get();





        return view('agent.myticket')
        ->with('lokasi',Lokasi::orderby('created_at','desc')->get())
        ->with('kategori',Kategori::orderby('created_at','desc')->get())
        ->with('subkategori',SubKategori::orderby('created_at','desc')->get())
        ->with('tickets',$tickets);

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


        if($request->status=="On Progress"){

            $email=new MailController();
            $email->actionticket($data->id,"response");

        }elseif($request->status=="Resolved"){

            $email=new MailController();
            $email->actionticket($data->id,"resolved");
        }

        DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error',$th);
        }



        if($request->status=="On Progress"){
            return back()->with('success','Ticket #'.$data->code.' have been responded to with you, Enjoy your work !');
        }elseif($request->status=="Resolved"){
            return back()->with('success','Ticket #'.$data->code.' has been resolved with you !');
        }else{
            return back()->with('success','Ticket #'.$data->code.' reworked with you, Enjoy your work !');
        }
    }


    public function request(Request $request){
        $validated = $request->validate([
            'id' => 'required',
            'status' => 'required|max:255',
            'comment' => 'required'
        ]);

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
