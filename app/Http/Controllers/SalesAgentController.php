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
use Illuminate\Support\Facades\Validator;


class SalesAgentController extends Controller
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

        $tickets_icon=Ticket::whereBetween('created_at',[ Carbon::now()->startOfYear(), Carbon::now()])
        ->where('agent_id',Auth::id())
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

        $tickets=Ticket::whereBetween('created_at',[ Carbon::now()->startOfYear(), Carbon::now()])
        ->where('agent_id',Auth::id())
        ->when(!empty($_GET['status']),function($query){
            if($_GET['status']=='Overdue'){
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



        return view('sales-tiket.agent.home')
        ->with('tickets_icon',$tickets_icon)
        ->with('tickets',$tickets);
    }

    public function assignment()
    {
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
            ->when(!empty($_GET['filter_by']),function($query){
                return $query->where($_GET['filter_by'], 'like',  '%'.$_GET['keyword'].'%');
             })
            ->whereBetween('tickets.created_at', [$tgl_pertama.' 00:00:00', $tgl_terakhir.' 23:59:59'])
            ->where('tickets.agent_id',Auth::id())
            ->where('tickets.status','!=','Open')
            ->where('tickets.status','!=','Canceled')
            ->orderby('tickets.created_at','desc')->get();



        return view('sales-tiket.agent.myticket')
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

        // try {

        $data = Ticket::find($request->id);

        if($request->status=="End Repair"){
            $data->status = "On Progress";
            $data->sla_repair_end = now();
        }
        elseif($request->status=="End Repair"){
            $data->status = "On Progress";
            $data->sla_repair_end = now();
        }
        elseif($request->status=="End Document Revison"){
            $validator = Validator::make([
                'sla_revison_end' =>now(),
                'start_work' => $request->start_work,
                'end_work' => $request->end_work,
            ], [
                'start_work' => 'required|date|after_or_equal:sla_revison_end',
                'end_work' => 'required|date|after:start_work',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            $data->status = "On Progress";
            $data->sla_revison_end = now();
            $data->start_work = $request->start_work;
            $data->end_work = $request->end_work;
        }
        elseif($request->status=="Re Prosess"){
            $validator = Validator::make([
                'sla_revison_end' =>now(),
                'start_work' => $request->start_work,
                'end_work' => $request->end_work,
            ], [
                'start_work' => 'required|date|after_or_equal:sla_revison_end',
                'end_work' => 'required|date|after:start_work',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            if( $data->status!='Complain'){
                $data->sla_revison_end = now();
            }
            $data->status = "Re Prosess";
            $data->start_work = $request->start_work;
            $data->end_work = $request->end_work;
        }
        elseif($request->status=="End Pending"){

            $validator = Validator::make([
                'sla_pending_end' =>now(),
                'start_work' => $request->start_work, // Provide a default value if not present
                'end_work' => $request->end_work,
            ], [
                'start_work' => 'required|date|after_or_equal:sla_pending_end',
                'end_work' => 'required|date|after:start_work',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }


            $data->status = "On Progress";
            $data->sla_pending_end = now();
            $data->start_work = $request->start_work;
            $data->end_work = $request->end_work;

        }elseif($request->status=="On Progress"){

            $validator = Validator::make([
                'sla_respone' =>now(),
                'start_work' => $request->start_work, // Provide a default value if not present
                'end_work' => $request->end_work,
            ], [
                'start_work' => 'required|date|after:sla_respone',
                'end_work' => 'required|date|after:start_work',
            ]);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }


            $data->sla_respone=now();
            $data->estimation_date=Carbon::now()->addMinutes($data->sla_ticket_time);
            $data->status = "On Progress";
            $data->start_work = $request->start_work;
            $data->end_work = $request->end_work;


        }elseif($request->status=="Resolved"){

            $validator = Validator::make([
                'start_work' =>$data->start_work,
                'date_finish' => $request->date_finish,
                'doc_no' => $request->doc_no,
            ], [
                'date_finish' => 'required|date|after_or_equal:start_work',
                'doc_no' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }


            $data->sla_resolved=now();
            $data->state="Responded";
            $data->solution=$request->comment;
            $data->note=$request->note;
            $data->status = "Resolved";
            $data->date_finish = $request->date_finish;
            $data->doc_no = $request->doc_no;
        }


        $data->save();

        if($request->status=="On Progress"){

            $email=new SalesMailController();
            $email->actionticket($data->id,"response");

        }elseif($request->status=="Resolved"){

            $email=new SalesMailController();
            $email->actionticket($data->id,"resolved");
        }

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
        elseif($request->status=="End Document Revison"){
            $data2->status="End Document Revison";
        }
        elseif($request->status=="Re Prosess"){
            $data2->status="Re Prosess";
        }
        $data2->approve=null;
        $data2->save();


        if($request->status=="End Pending"){

           $email=new SalesMailController();
           $email->actionticket($data->id,"reproses",$data2->id);
        }elseif($request->status=="End Document Revison"){
            $email=new SalesMailController();
            $email->actionticket($data->id,"reproses",$data2->id);
        }if($request->status=="Re Prosess"){
            $email=new SalesMailController();
            $email->actionticket($data->id,"reproses",$data2->id);
        }
        DB::commit();

        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     return back()->with('error',$th);
        // }



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

        $data = new Complain();
        $data->ticket_id = $request->id;
        $data->agent_id = Auth::user()->id;
        $data->comment = $request->comment;
        $data->note = $request->note;
        $data->sla_request=$request->start_date??null;
        $data->sla_request_end=$request->end_date??null;

        if ($request->status != "Request Close") {
            $data->close_request=$request->close_request??null;
            $data->approve = "aproved";
        }

        if($request->status == "Request Pending"){
            $data->approve ='await';
        }

        if($request->status == "Reassign"){
            $data->approve ='await';
        }

        if($request->status=="Unable Respond"){
            $data->approve ='await';
            $data->extend_response_SLA=$request->extend_SLA??null;
        }

        if ($data->status == "Extend SLA") {
            $data->approve ='await';
            $data->extend_SLA=$request->extend_SLA??null;
        }

        $data->status=$request->status;
        $data->save();



        $data2 = Ticket::find($request->id);


        if ($data->status == "Document Revison") {

            $data2->status = "Document Revison";
            $data2->sla_revison =$request->start_date;
            $data2->sla_revison_end =null;
            $data2->start_work = null;
            $data2->end_work = null;
        }

        if($data->status == "Reassign"){
            $data2->req_status ='Reassign';
        }

        if($data->status == "Request Pending"){
            $data2->req_status ='Request Pending';
        }

        if ($data->status == "Extend SLA") {
            $data2->req_status ='Extend SLA';
        }


        if ($data->status == "Unable Respond") {
            $data2->req_status ='Extend SLA';
        }

        $data2->save();


        $email=new SalesMailController();
       if($data->status == "Document Revison"){
            $email->actionticket($data->ticket_id,"DocRevison",$data->id);
       }elseif($data->status == "Reassign"){

            $email->actionticket($data->ticket_id,"Reassign",$data->id);
       }else{
           $email->actionticket($data->ticket_id,"agent reuqest",$data->id);
       }

        return back()->with('success',$request->status.' have been seen auto aprove with supervisor !');
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

        return view('sales-tiket.agent.request-extend')
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

        return view('sales-tiket.agent.complain')
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
