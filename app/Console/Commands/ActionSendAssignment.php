<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use App\Models\Complain;
use App\Models\SubKategori;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailController;

class ActionSendAssignment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'action:sendassignment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manual Run Auto Send Assignment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       
        $tickets = Ticket::where('status', 'Open')
            ->whereRaw('DATE_ADD(tickets.created_at , interval tickets.send_assignment_default MINUTE) < now()')
            ->whereNull('sla_assignment')
            ->where('tickets.send_assignment_default','>',0)
            ->whereNull('sub_kategoris.agent_id')
            ->whereNull('sub_kategoris.supervisor_id')
            ->allTeams()
            ->leftjoin('sub_kategoris','tickets.sub_katagori_id','sub_kategoris.id')
            ->select('tickets.*')
            ->get();
           
        foreach ($tickets as $item) {
            $agent_id=null;
            $supervisor_id=null;
            $count_ticket_agent=0;
            $count_ticket_supervisor=0;
            $sk=SubKategori::allTeams()->find($item->sub_katagori_id);
       
            if(empty($sk->agent_id)){

                $query_data=User::GetAllTeam()
                ->where('team_user.team_id',$item->team_id)
                ->where(function($query){
                    $query->where('role','supervisor-agent')
                    ->orwhere('role','supervisor-agent-user')
                    ->orwhere('role','agent')
                    ->orwhere('role','agent-user');
                })
                ->where('permission','Active')
                ->get();
             
              
                foreach($query_data as $agent){
                    $jml=$agent->leftjoin('tickets','tickets.agent_id','=','users.id')->where('status','On Progress')->count();

                    if($agent_id==null){
                        $agent_id=$agent->id;
                        $count_ticket_agent=$jml;
                    }elseif($jml==$count_ticket_agent&&rand(0, 1)){
                        $agent_id=$agent->id;
                        $count_ticket_agent=$jml;
                    }elseif($jml<$count_ticket_agent){
                        $agent_id=$agent->id;
                        $count_ticket_agent=$jml;
                    }

                }


            }else{
                $agent_id=$sk->agent_id;
            }

            if(empty($sk->supervisor_id)){

                $query_data=User::GetAllTeam()
                ->where('users.permission','Active')
                ->where('team_user.team_id',$item->team_id)->where(function($query){
                    $query->where('role', 'supervisor')
                    ->orwhere('role', 'supervisor-agent')
                    ->orwhere('role','supervisor-agent-user')
                    ->orwhere('role','supervisor-user');
                })->get();


                foreach($query_data as $supervisor){

                    $jml=$supervisor->leftjoin('tickets','tickets.supervisor_id','=','users.id')->where('status','On Progress')->count();

                    if($supervisor_id==null){
                        $supervisor_id=$supervisor->id;
                        $count_ticket_supervisor=$jml;
                    }elseif($jml==$count_ticket_supervisor&&rand(0, 1)){

                        $supervisor_id=$supervisor->id;
                        $count_ticket_supervisor=$jml;
                    }elseif($jml<$count_ticket_supervisor){
                        $supervisor_id=$supervisor->id;
                        $count_ticket_supervisor=$jml;
                    }

                }

            }else{
                $supervisor_id=$sk->supervisor_id;
            }

            DB::beginTransaction();
            if(!empty($agent_id)&&!empty($supervisor_id)){

                if (empty($supervisor_id)) {
                    // dd( $supervisor_id);
                    $query_data=User::GetAllTeam()
                    ->where('users.permission','Active')
                    ->where('team_user.team_id',$item->team_id) //tenant
                    ->where(function($query){
                        $query->where('role', 'adminstrator');
                    })->first();
                    $supervisor_id= $query_data->id;
                }
    
                try {

                    $data = Ticket::allTeams()->find($item->id);
                    $data->agent_id =  $agent_id;
                    $data->supervisor_id =  $supervisor_id;
                    $data->state = 'Responded';
                    $data->sla_assignment = now();
                    $data->status = 'Awaiting Response';
                    $data->team_id = $data->team_id;
                    $data->save();

                    $data2 = new Complain();
                    $data2->ticket_id = $item->id;
                    $data2->agent_id =  $sk->agent_id;
                    $data2->supervisor_id =  $sk->supervisor_id;
                    $data2->comment = 'Give assignment to agent by system';
                    $data2->status = 'Assignment System';
                    $data2->approve = null;
                    $data2->team_id = $data->team_id;
                    $data2->save();


                    $email = new MailController();
                    $email->actionticket($data->id, 'assignment-system');

                    DB::commit();

                } catch (\Throwable $th) {
                    DB::rollback();
                    return print $th;
                }

            }

        }
        return 200;
    }
}
