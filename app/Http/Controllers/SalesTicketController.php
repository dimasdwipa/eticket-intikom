<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Lokasi;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\BaseUnit;
use App\Models\User;
use App\Models\Complain;
use App\Models\Team;
use App\Models\FileManager;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SalesMailController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class SalesTicketController extends Controller
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


            if (Auth::user()->role=="user"||Auth::user()->role=="administrator"||Auth::user()->role=="supervisor-agent-user"||Auth::user()->role=="supervisor-user"||Auth::user()->role=="agent-user"){

                return $next($request);
            }else{
                return redirect('no-access');
            }


        });


    }
    public function index()
    {

            $tickets=Ticket::where('user_id',Auth::id())
            ->where('status','!=','Closed')
            ->where('status','!=','Canceled')
            ->allTeams()
            ->when(!empty($_GET['status']),function($query){
                if($_GET['status']=='Request Feedback'){
                    return $query->where('state', $_GET['status']);
                }elseif($_GET['status']=='Overdue'){
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


            $tickets_icon=Ticket::whereBetween('created_at',[ Carbon::now()->startOfYear(), Carbon::now()])
            ->where('user_id',Auth::id())
            ->allTeams()
            // ->when(!empty($_GET['status']),function($query){
            //     return $query->where('status', $_GET['status']);
            //  })
            ->orderby('created_at','desc')->get();


        // }

        return view('sales-tiket.home')
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

        return view('sales-tiket.create')
        ->with('teams',Team::orderby('code')->get())
        ->with('sales_admin',User::GetTeam()->where(function($query){
            $query->where('role','supervisor-agent')
            ->orwhere('role','supervisor-agent-user')
            ->orwhere('role','agent')
            ->orwhere('role','agent-user');
        })->get())
        ->with('base_unit',BaseUnit::orderby('created_at','desc')->AllTeams()->where('team_id',3)->get())
        ->with('subkategori',SubKategori::orderby('created_at','desc')->AllTeams()->where('team_id',3)->get());
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
            'subkategori' => 'required|integer',
            'tanggal' => 'required|date',
            'customer' => 'required',
            'no_CRM' => 'required',
            'bu' => 'required',
            'sales_admin' => 'required',
            'problem' => 'required'
        ]);

        // null arry ccmail
        $request->cc_mails = array_filter($request->cc_mails, function($value) {
            return $value !== null;
        });

        $block_add_ticket=Ticket::where('user_id',Auth::id())
        ->where('status','Resolved')
        ->first();

        if(!empty($block_add_ticket)){
            return back()->with('error','Anda belum memberikan rating pada ticket #'.$block_add_ticket->code.', mohon memberikan rating terlebih dahulu ');
        }

            $team=Team::find($request->team_id);
            if($team->year!=date('Y')){
                $team->year=date('Y');
                $team->number=1;
                $team->save();
            }else{
                $team->number=$team->number+1;
                $team->save();
            }

            $code = $team->code . date('Y') . sprintf('%05d', $team->number);


            $file_data=false;
            $sk=  SubKategori::AllTeams()->find($request->subkategori);
            $bu=  BaseUnit::AllTeams()->find($request->bu);
            $sa= User::find($request->sales_admin);

            $ticket_save = new Ticket();


            $ticket_save->code=$code;
            $ticket_save->tanggal=$request->tanggal;
            $ticket_save->bu=$bu->code;
            $ticket_save->user_id=Auth::user()->id;
            $ticket_save->sub_katagori_id=(int)$request->subkategori;
            $ticket_save->problem=$request->problem;
            $ticket_save->lokasi_id=(int)$request->lokasi_id;
            $ticket_save->prioritas = $request->prioritas;
            $ticket_save->team_id = (int)$request->team_id;
            $ticket_save->katagori_id=(int)$sk->katagori_id;
            $ticket_save->sla_ticket_time=$sk->extend_ticket_SLA_default;
            $ticket_save->sla_response_time=$sk->extend_response_SLA_default;
            $ticket_save->send_assignment_default=$sk->send_assignment_default;

            $ticket_save->customer=$request->customer;
            $ticket_save->no_CRM=$request->no_CRM;

            $ticket_save->sales_admin=$sa->name;
            $ticket_save->agent_id=$sa->id;
            $ticket_save->supervisor_id=$bu->su_user_id;
            $ticket_save->quot_itk=(int)$request->quot_itk;
            $ticket_save->po_customer=(int)$request->po_customer;
            $ticket_save->po_suplayer=(int)$request->po_suplayer;
            $ticket_save->cost_sheet=(int)$request->cost_sheet;
            $ticket_save->other=$request->other;
            $ticket_save->cc_mails=$request->cc_mails;
            $ticket_save->sla_assignment = now();
            $ticket_save->state= 'Request Feedback';
            $ticket_save->status = 'Awaiting Response';

            $ticket_save->save();

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $key => $value) {
                    $name_file=$code.$key.'.'.$value->extension();
                    Storage::putFileAs("public/files/tickets",$value,$name_file);
                    FileManager::create([
                        'model' => 'App\Models\Ticket',
                        'model_id' => $ticket_save->id,
                        'file' => $name_file,
                    ]);
                }
            }




            $data = new Complain();
            $data->ticket_id = $ticket_save->id;
            $data->user_id = Auth::user()->id;
            $data->comment = $request->problem;
            $data->note = $sk->sub_kategori;
            $data->status="Awaiting Response";
            $data->approve=null;
            $data->team_id = $request->team_id;
            $data->save();

            $email=new SalesMailController();
            $email->newticket($code);

        return redirect()->route('sa.sales.user')->with('success','Create Ticket #'.$ticket_save->code.' successfully.');
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
    public function edit($ticket)
    {
        $data=Ticket::find($ticket);

        return view('sales-tiket.edit')
        ->with('data',$data)
        ->with('teams',Team::orderby('code')->get())
        ->with('sales_admin',User::GetTeam()->where(function($query){
            $query->where('role','supervisor-agent')
            ->orwhere('role','supervisor-agent-user')
            ->orwhere('role','agent')
            ->orwhere('role','agent-user');
        })->get())
        ->with('base_unit',BaseUnit::orderby('created_at','desc')->AllTeams()->where('team_id',3)->get())
        ->with('subkategori',SubKategori::orderby('created_at','desc')->AllTeams()->where('team_id',3)->get());


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        $validated = $request->validate([
            'subkategori' => 'required|integer',
            'tanggal' => 'required|date',
            'customer' => 'required',
            'no_CRM' => 'required',
            'bu' => 'required',
            'sales_admin' => 'required',
            'problem' => 'required'
        ]);

        $request->cc_mails = array_filter($request->cc_mails, function($value) {
            return $value !== null;
        });


        $block_add_ticket=Ticket::where('user_id',Auth::id())
        ->where('status','closed')
        ->wherenull('rating')
        ->first();

        if(!empty($block_add_ticket)){
            return back()->with('error','Anda belum memberikan rating pada ticket #'.$block_add_ticket->code.', mohon memberikan rating terlebih dahulu ');
        }

            $file_data=false;
            $sk=  SubKategori::AllTeams()->find($request->subkategori);
            $bu=  BaseUnit::AllTeams()->find($request->bu);
            $sa= User::find($request->sales_admin);

            $ticket_save = Ticket::find($request->id);
            $ticket_save->tanggal=$request->tanggal;
            $ticket_save->bu=$bu->code;
            $ticket_save->user_id=Auth::user()->id;
            $ticket_save->sub_katagori_id=(int)$request->subkategori;
            $ticket_save->problem=$request->problem;
            $ticket_save->note=$request->note;
            $ticket_save->reponse_desc=$request->note;
            $ticket_save->lokasi_id=(int)$request->lokasi_id;
            $ticket_save->prioritas = $request->prioritas;
            $ticket_save->team_id = (int)$request->team_id;
            $ticket_save->katagori_id=(int)$sk->katagori_id;
            $ticket_save->sla_ticket_time=$sk->extend_ticket_SLA_default;
            $ticket_save->sla_response_time=$sk->extend_response_SLA_default;
            $ticket_save->send_assignment_default=$sk->send_assignment_default;

            $ticket_save->customer=$request->customer;
            $ticket_save->no_CRM=$request->no_CRM;

            $ticket_save->sales_admin=$sa->name;
            $ticket_save->agent_id=$sa->id;
            $ticket_save->supervisor_id=$bu->su_user_id;
            $ticket_save->quot_itk=(int)$request->quot_itk;
            $ticket_save->po_customer=(int)$request->po_customer;
            $ticket_save->po_suplayer=(int)$request->po_suplayer;
            $ticket_save->cost_sheet=(int)$request->cost_sheet;
            $ticket_save->other=$request->other;
            $ticket_save->cc_mails=$request->cc_mails;
            // $ticket_save->sla_assignment = now();
            // $ticket_save->state= 'Request Feedback';
            // $ticket_save->status = 'Awaiting Response';

            $ticket_save->save();

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $key => $value) {
                    $name_file=$ticket_save->code.$key.'.'.$value->extension();
                    Storage::putFileAs("public/files/tickets",$value,$name_file);
                    FileManager::create([
                        'model' => 'App\Models\Ticket',
                        'model_id' => $ticket_save->id,
                        'file' => $name_file,
                    ]);
                }
            }




            $data = new Complain();
            $data->ticket_id = $ticket_save->id;
            $data->user_id = Auth::user()->id;
            $data->comment = $request->problem;
            $data->note = $sk->sub_kategori;
            $data->status="Awaiting Response";
            $data->approve=null;
            $data->team_id = $request->team_id;
            $data->save();

            $email=new SalesMailController();
            $email->newticket($ticket_save->code,2);

        return redirect()->route('sa.sales.user')->with('success','Update Ticket #'.$ticket_save->code.' successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($ticket)
    {
       $data = FileManager::find($ticket);
       $data->delete();
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


        $email=new SalesMailController();
        $email->actionclose($data,$data->id);

        return back()->with('success','Closing Ticket #'.$data->code.' successfully.');
    }

    public function complain(Request $request){


        $validated = $request->validate([
            'comment' => 'required|min:4'
        ]);

        $data = Ticket::allTeams()->find($request->id);
        if($data->status!="Awaiting Response"){

            // ini merubah ke Panding
            $data->status = "Complain";
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


        $email=new SalesMailController();
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


        $email=new SalesMailController();
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
            ->allTeams()
            ->when(!empty($_GET['filter_by']),function($query){
                return $query->where($_GET['filter_by'], 'like',  '%'.$_GET['keyword'].'%');
             })
            ->whereBetween('tickets.created_at', [$tgl_pertama.' 00:00:00', $tgl_terakhir.' 23:59:59'])
            ->orderby('tickets.created_at','desc')->get();


        return view('sales-tiket.user.summary-report')
        ->with('tickets',$tickets);
    }
}
