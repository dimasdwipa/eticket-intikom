<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MailController;
use App\Models\Complain;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\SubKategori;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SalesSupervisorController extends Controller
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
            if (auth()->guest() || !auth()->user()->currentTeam) {
                return redirect('teams');
            }
            if (Auth::user()->role == "manager" || Auth::user()->role == "supervisor" || Auth::user()->role == "administrator" || Auth::user()->role == "supervisor-agent" || Auth::user()->role == "supervisor-agent-user") {

                return $next($request);
            } else {
                return redirect('no-access');
            }

        });

    }

    public function index()
    {

        $tickets_icon = Ticket::whereBetween('created_at', [ Carbon::now()->startOfYear(), Carbon::now()])
        // ->when(!empty($_GET['status']),function($query){
        //     if($_GET['status']!='Overdue'){
        //         return $query->where('status', 'On Progress')
        //         ->whereRaw('DATE_ADD(sla_respone , interval sla_ticket_time MINUTE) < now()')
        //         ->whereNotNull('sla_respone');
        //     }else{
        //         return $query->where('status', $_GET['status']);
        //     }
        //  })
            ->orderby('created_at', 'desc')->get();

        $agents = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'agent')
                    ->orwhere('role', 'agent-user');
            })

            ->orderby('name', 'asc')
            ->get();
        return view('sales-tiket.supervisor.home')
            ->with('agents', $agents)
            ->with('tickets_icon', $tickets_icon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignment()
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

        $tickets = Ticket::select('tickets.*', 'users.name')
            ->leftjoin('users', 'tickets.agent_id', '=', 'users.id')
            ->when(!empty($_GET['filter_by']), function ($query) {
                return $query->where($_GET['filter_by'], 'like', '%' . $_GET['keyword'] . '%');
            })
        // ->whereBetween('tickets.created_at', [$tgl_pertama.' 00:00:00', $tgl_terakhir.' 23:59:59'])
            ->where('tickets.status', 'Open')
            ->orderby('tickets.created_at', 'desc')->get();

        $agents = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'agent')
                    ->orwhere('role', 'agent-user');
            })

            ->orderby('name', 'asc')
            ->get();

        return view('supervisor.assignment')
            ->with('agents', $agents)
            ->with('tickets', $tickets);
    }

    public function create()
    {
        $agents = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'agent')
                    ->orwhere('role', 'agent-user');
            })
            ->orderby('name', 'asc')
            ->get();

        return view('supervisor.create')
            ->with('lokasi', Lokasi::orderby('created_at', 'desc')->get())
            ->with('kategori', Kategori::orderby('created_at', 'desc')->get())
            ->with('agents', $agents)
            ->with('subkategori', SubKategori::orderby('created_at', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storetask(Request $request)
    {

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'katagori.*' => 'required',
            'subkatagori.*' => 'required',
            'agent_id.*' => 'required',
        ]);
        $code = strtotime(now());

        DB::beginTransaction();

        try {
            foreach ($request->katagori as $key => $item) {
                $sk = SubKategori::find($request->subkategori[$key]);

                $file_data = false;

                $data = new Ticket();
                $data->code = $code . $key;
                $data->tanggal = $request->tanggal;
                $data->bu = $request->bu;
                $data->lokasi_id = $request->lokasi;
                $data->user_id = Auth::user()->id;
                $data->supervisor_id = Auth::user()->id;
                $data->katagori_id = $request->katagori[$key];
                $data->sub_katagori_id = $request->subkategori[$key];
                $data->problem = $request->problem[$key];
                $data->agent_id = $request->agent_id[$key];
                $data->sla_ticket_time = $request->sla_ticket_time[$key];
                $data->prioritas = $request->prioritas[$key];
                $data->sla_ticket_time = !empty($request->sla_ticket_time[$key]) ? $request->sla_ticket_time[$key] : $sk->extend_ticket_SLA_default;
                $data->sla_response_time = $sk->extend_response_SLA_default;
                $data->sla_assignment = now();
                $data->status = 'Awaiting Response';

                try {
                    $data->files = $code . $key . '.' . $request->file('files')[$key]->extension() ?? null;
                    $file_data = true;
                } catch (\Throwable $th) {
                    //throw $th;
                }

                $data->save();

                if ($file_data) {
                    Storage::putFileAs("public/files/tickets", $request->file('files')[$key], $code . $key . '.' . $request->file('files')[$key]->extension());
                }

                $complain = new Complain();
                $complain->ticket_id = $data->id;
                $complain->supervisor_id = Auth::id();
                $complain->agent_id = $request->agent_id[$key];
                $complain->comment = $request->problem[$key];
                $complain->note = "Give task to agent";
                $complain->status = "Assignment";
                $complain->approve = null;
                $complain->save();

                $email = new MailController();
                $email->actionticket($data->id, "task");

            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th);
        }

        return redirect('supervisor')->with('success', 'Create tasking #' . $data->code . ' successfully.');

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'agent_id' => 'required|max:255',
            'sla_ticket_time' => 'required|max:255',
        ]);

        // DB::beginTransaction();

        try {
            $data = Ticket::find($request->id);
            $data->agent_id = $request->agent_id;
            $data->supervisor_id = Auth::id();
            $data->state = "Responded";
            $data->sla_ticket_time = $request->sla_ticket_time;
            $data->sla_assignment = now();
            $data->status = 'Awaiting Response';
            $data->prioritas = $request->prioritas;
            $data->save();

            $data2 = new Complain();
            $data2->ticket_id = $request->id;
            $data2->supervisor_id = Auth::id();
            $data2->agent_id = $request->agent_id;
            $data2->comment = "Give assignment to agent";
            $data2->status = "Assignment";
            $data2->approve = null;
            $data2->save();

            $email = new MailController();
            $email->actionticket($data->id, "assignment");

            // DB::commit();
        } catch (\Throwable $th) {
            // DB::rollBack();
            return back()->with('error', $th);
        }

        return back()->with('success', 'Assignment Ticket #' . $data->code . ' successfully.');
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

    public function report()
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

        $tickets = Ticket::select('tickets.*', 'users.name')
            ->leftjoin('users', 'tickets.agent_id', '=', 'users.id')
            ->when(!empty($_GET['filter_by']), function ($query) {
                return $query->where($_GET['filter_by'], 'like', '%' . $_GET['keyword'] . '%');
            })
            ->whereBetween('tickets.created_at', [$tgl_pertama . ' 00:00:00', $tgl_terakhir . ' 23:59:59'])
        // ->where('tickets.status','!=','Open')
            ->orderby('tickets.created_at', 'desc')->get();

        $agents = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'agent')
                    ->orwhere('role', 'agent-user');
            })
            ->orderby('name', 'asc')
            ->get();

        return view('sales-tiket.supervisor.summary-report')
            ->with('lokasi', Lokasi::orderby('created_at', 'desc')->get())
            ->with('kategori', Kategori::orderby('created_at', 'desc')->get())
            ->with('subkategori', SubKategori::orderby('created_at', 'desc')->get())
            ->with('agents', $agents)
            ->with('tickets', $tickets);
    }

    public function updatereport(Request $request)
    {

        try {
            $SubKategori = SubKategori::findorfail($request->sub_katagori_id);

            $data = Ticket::find($request->id);
            $data->sub_katagori_id = $request->sub_katagori_id;
            $data->agent_id = $request->agent_id;
            $data->sla_assignment = $request->sla_assignment;
            $data->sla_respone = $request->sla_respone;
            $data->start_work = $request->start_work;
            $data->end_work = $request->end_work;
            $data->sla_repair = $request->sla_repair;
            $data->sla_repair_end = $request->sla_repair_end;
            $data->sla_pending = $request->sla_pending;
            $data->sla_pending_end = $request->sla_pending_end;
            $data->sla_resolved = $request->sla_resolved;
            $data->sla_close = $request->sla_close;
            $data->prioritas = $request->prioritas;
            if ($request->status != null) {
                $data->status = $request->status;
            }

            $data->save();

            // $email=new MailController();
            // $email->actionticket($data->id,"agent reuqest");

            return back()->with('success', 'Update Ticket #' . $data->code . ' successfully.');
        } catch (\Throwable $th) {
            return back()->with('erorr', $th);
            //throw $th;
        }
    }

    public function request_extend()
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
                return $query->where($_GET['filter_by'], 'like', '%' . $_GET['keyword'] . '%');
            })
            ->where(function ($query) {
                if (!empty($_GET['alltype'])) {
                    if ($_GET['alltype'] == 1) {
                        $query->where('complains.approve', 'await')
                            ->orwhere('complains.approve', 'aproved')
                            ->orwhere('complains.approve', 'rejected');
                    } else {

                        $query->where('complains.approve', 'await');
                    }
                } else {
                    $query->where('complains.approve', 'await');
                }

            })
            ->orderby('complains.created_at', 'desc')->get();

        // dd($tickets);


        return view('sales-tiket.supervisor.request-extend')
            ->with('sales_admin',User::GetTeam()->where(function($query){
                $query->where('role','supervisor-agent')
                ->orwhere('role','supervisor-agent-user')
                ->orwhere('role','agent')
                ->orwhere('role','agent-user');
            })->get())
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
                return $query->where($_GET['filter_by'], 'like', '%' . $_GET['keyword'] . '%');
            })
            ->where('complains.status', "Complain")
            ->orderby('complains.created_at', 'desc')->get();

        $agents = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'agent')
                    ->orwhere('role', 'agent-user');
            })
            ->orderby('name', 'asc')
            ->get();

        return view('sales-tiket.supervisor.complain')
            ->with('agents', $agents)
            ->with('tickets', $tickets);
    }

    public function request_extend_update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|max:255',
            'resolution' => 'required|max:255',
        ]);

        try {
            DB::beginTransaction();

            $data = Complain::find($request->id);

            if ($request->resolution == "aproved") {
                $data->approve = "aproved";
                $data->save();

                $data2 = Ticket::find($data->ticket_id);

                if ($data->status == "Request Close") {
                    $data2->status = "Closed";
                    $data2->state = "Responded";
                    $data2->sla_close = $data->close_request;
                } elseif ($data->status == "Request Repair") {
                    $data2->status = "Repairing";
                    $data2->sla_repair = $data->sla_request;
                    $data2->sla_repair_end = $data->sla_request_end;
                } elseif ($data->status == "Request Pending") {
                    $data2->status = "Pending";
                    $data2->sla_pending = $data->sla_request;
                    $data2->sla_pending_end = $data->sla_request_end;
                } elseif ($data->status == "Extend SLA") {
                    $data2->sla_ticket_time = $data2->sla_ticket_time + $data->extend_SLA;
                    $data2->estimation_date = Carbon::create($data2->sla_respone)->addMinutes($data2->sla_ticket_time);
                } elseif ($data->status == "Unable Respond") {
                    $data2->sla_response_time = $data2->sla_response_time + $data->extend_response_SLA;
                }

                $data2->req_status = null;
                $data2->save();

                $data3 = new Complain();
                $data3->ticket_id = $data->ticket_id;
                $data3->supervisor_id = Auth::id();
                $data3->comment = "Request aproved with supervisor";
                $data3->note = $data->status;
                $data3->status = "Request Aprovel";
                $data3->approve = null;
                $data3->save();

                DB::commit();

                $email = new MailController();
                $email->actionticket($data->id, "Supervisor approval");
                return back()->with('Success', 'Request have been successfully approved.');
            } else {

                $data->approve = "Rejected";
                $data->save();

                $data3 = new Complain();
                $data3->ticket_id = $data->ticket_id;
                $data3->supervisor_id = Auth::id();
                $data3->comment = "Request rejected with supervisor";
                $data3->note = $data->status;
                $data3->status = "Request Rejected";
                $data3->approve = null;
                $data3->save();

                $data2 = Ticket::find($data->ticket_id);
                $data2->req_status = null;
                $data2->save();

                DB::commit();

                $email = new MailController();
                $email->actionticket($data->id, "Supervisor aprovel");

                return back()->with('success', 'Request been successfully rejected.');
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('erorr', $th);
            //throw $th;
        }
    }

    public function sla_report()
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

        $tickets = Ticket::select('tickets.*', 'users.name')
            ->leftjoin('users', 'tickets.agent_id', '=', 'users.id')
            ->when(!empty($_GET['filter_by']), function ($query) {
                return $query->where($_GET['filter_by'], 'like', '%' . $_GET['keyword'] . '%');
            })
            ->whereBetween('tickets.created_at', [$tgl_pertama . ' 00:00:00', $tgl_terakhir . ' 23:59:59'])
        // ->where('tickets.status','!=','Open')
            ->orderby('tickets.created_at', 'desc')->get();

        $agents = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'agent')
                    ->orwhere('role', 'agent-user');
            })
            ->orderby('name', 'asc')
            ->get();

        return view('sales-tiket.supervisor.sla-summary-report')
            ->with('lokasi', Lokasi::orderby('created_at', 'desc')->get())
            ->with('kategori', Kategori::orderby('created_at', 'desc')->get())
            ->with('subkategori', SubKategori::orderby('created_at', 'desc')->get())
            ->with('agents', $agents)
            ->with('tickets', $tickets);
    }

    public function sla_report_sa()
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

        $tickets = Ticket::select('tickets.*', 'users.name')
            ->leftjoin('users', 'tickets.agent_id', '=', 'users.id')
            ->when(!empty($_GET['filter_by']), function ($query) {
                if ($_GET['filter_by'] == 'status') {
                    if ($_GET['keyword'] == 'Request Feedback') {
                        return $query->where('state', $_GET['keyword']);
                    } elseif ($_GET['keyword'] == 'Overdue') {
                        return $query->where('status', 'On Progress')
                            // ->whereRaw('DATE_ADD(sla_respone , interval sla_ticket_time MINUTE) < now()')
                            ->whereRaw('DATEADD(MINUTE, sla_ticket_time, sla_respone) < GETDATE()')
                            ->whereNotNull('sla_respone');
                    } else {
                        return $query->where('status', $_GET['keyword']);
                    }
                } else {

                    return $query->where($_GET['filter_by'], 'like', '%' . $_GET['keyword'] . '%');
                }

            })
            ->whereBetween('tickets.created_at', [$tgl_pertama . ' 00:00:00', $tgl_terakhir . ' 23:59:59'])
        // ->where('tickets.status','!=','Open')
            ->orderby('tickets.created_at', 'desc')->get();

        $agents = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'agent')
                    ->orwhere('role', 'agent-user');
            })->orderby('name', 'asc')
            ->get();

        return view('sales-tiket.supervisor.sla-summary-report-sa')
            ->with('lokasi', Lokasi::orderby('created_at', 'desc')->get())
            ->with('kategori', Kategori::orderby('created_at', 'desc')->get())
            ->with('subkategori', SubKategori::orderby('created_at', 'desc')->get())
            ->with('agents', $agents)
            ->with('tickets', $tickets);
    }

    public function import_user()
    {

        if (Auth::user()->role == "supervisor" || Auth::user()->role == "manager") {

            Artisan::call('ldap:import');

            return back()->with('success', 'Import user from LDAP have been successfully.');
        } else {

            return back()->with('erorr', 'Your role not supervisor or manager.');
        }
    }
}
