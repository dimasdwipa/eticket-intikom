<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesMail\NewTicketEmail;
use App\SalesMail\ActionTicketEmail;
use App\SalesMail\NotifOverdueEmail;
use App\SalesMail\CloseSysTicketEmail;
use App\SalesMail\AgentRequestEmail;
use App\SalesMail\ComplainMail;
use App\SalesMail\CloseMail;
use App\SalesMail\NotifMasterDataEmail;
use App\SalesMail\NotifActionMasterDataEmail;
use App\SalesMail\RatingMail;
use App\SalesMail\RemenderRatingMail;
use App\SalesMail\AssignmentSystemEmail;
use App\SalesMail\AssignmentEmail;
use App\SalesMail\EditSupervisorEmail;
use App\SalesMail\TaskEmail;
use App\SalesMail\ResponseEmail;
use App\SalesMail\AgentReuqestEmail;
use App\SalesMail\ResolvedEmail;
use App\SalesMail\SupervisorApprovalEmail;
use App\SalesMail\SalesReprosesMail;
use App\SalesMail\DocRevisonEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Complain;
use App\Notifications\DataNotification;
use App\models\Team;

class SalesMailController extends Controller
{
    public function newticket($code,$type=0){


        $ticket=Ticket::AllTeams()->where('code','like','%'.$code.'%')->get();

      
        $email_cc=$ticket->first()->cc_mails;

        $id_cc=array();

        $title="New Ticket #";
        $url_manager=url("summary-report-sumpervisor-sla?start_date=&end_date=&filter_by=code&keyword=".$code);
        $url_supervisor=url("supervisor-assignment?filter_by=code&keyword=".$code);



        //email cc to manager
        foreach($ticket as $key=> $item){

            $Manager=User::where("users.role","=","manager")
            ->join('team_user','team_user.user_id',"users.id")
            ->where('team_user.team_id', $item->team_id)
            ->get();
            foreach($Manager as $value){
                array_push($email_cc,$value->email);
                    $notification = new DataNotification($title.$item->code,$item->problem,$url_manager);
                    $value->notify($notification);
                }

        }
         //email cc to spv
        foreach($ticket as $item){
        $Supervisor=User::where(function($query){
            $query->where('role', 'supervisor')
            ->orwhere('role', 'supervisor-agent')
            ->orwhere('role','supervisor-agent-user')
            ->orwhere('role','supervisor-user');
        })
        ->join('team_user','team_user.user_id',"users.id")
        ->where('team_user.team_id', $item->team_id)
        ->get();



         foreach($Supervisor as $value){
            array_push($email_cc,$value->email);
                $notification = new DataNotification($title.$item->code,$item->problem,$url_supervisor);
                $value->notify($notification);
         }


        }



         //Email for user
         
        $User=Auth::user()->email;
        array_push($email_cc,$User=Auth::user()->email);

        $Agent=User::find($ticket->first()->agent_id);
        if($type==1){
            Mail::to($Agent->email)
            ->cc($email_cc)
            ->send(new NewTicketEmail($ticket,"eTicketing ".(Team::find($item->team_id)->name??'')." -  New Ticket"));
        }else{
            Mail::to($Agent->email)
            ->cc($email_cc)
            ->send(new NewTicketEmail($ticket,"eTicketing ".(Team::find($item->team_id)->name??'')." -  Update Ticket"));
        }
		


		return 200;
	}

    public function actionbysytem($id){

        $ticket=Ticket::allTeams()->find($id);
        $email_cc=array();

        $title="Penutupan  ticket #".$ticket->code." oleh system";
        $url_user=url("summary-report?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
        $url_agent=url("my-ticket?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
        $url_supervisor=url("summary-report-sumpervisor-sla?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
        $url_manager=url("summary-report-sumpervisor-sla?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
        // Email cc to Agent
        $Agent=User::find($ticket->agent_id);
        array_push($email_cc,$Agent->email);

        $notification = new DataNotification($title,$ticket->problem,$url_agent);
        $Agent->notify($notification);

        // Email cc to Supervisor
        $Supervisor=User::find($ticket->supervisor_id);
        array_push($email_cc,$Supervisor->email);

        $notification = new DataNotification($title,$ticket->problem,$url_supervisor);
        $Supervisor->notify($notification);

        // Email cc to manager
        $Manager=User::where("users.role","=","manager")
        ->join('team_user','team_user.user_id',"users.id")
        ->where('team_user.team_id', $ticket->team_id)
        ->get();

        foreach($Manager as $value){
           array_push($email_cc,$value->email);
           $notification = new DataNotification($title,$ticket->problem,$url_manager);
           $value->notify($notification);
        }

        // Email for user
        $User=User::find($ticket->user_id);
        $notification = new DataNotification($title,$ticket->problem,$url_user);
        $User->notify($notification);

       
        Mail::to($User->email)
        ->cc($email_cc)
        ->send(new CloseSysTicketEmail($ticket,$User,"eTicketing ".(Team::find($ticket->team_id)->name)." - Penutupan ticket #".$ticket->code));

		return 200;
	}

    public function actioncomplain($ticket,$id){

        $complain=Complain::find($id);

        $email_cc=array();

        $title="Ticket #".$ticket->code." has been Complain by the user ";

        $url_agent=url("agent-complain?alltype=1&start_date=&end_date=&filter_by=tickets.code&keyword=".$ticket->code);
        $url_supervisor=url("supervisor-complain?alltype=1&start_date=&end_date=&filter_by=tickets.code&keyword=".$ticket->code);


          // Email cc to Manager
        // $Manager=User::where("role","=","manager")->get();
        // foreach($Manager as $value){
        //    array_push($email_cc,$value->email);
        // }

        // Email cc for User
        // $User=User::find($ticket->user_id);
        // array_push($email_cc,$User->email);

        // Email cc to Agent
        if($ticket->agent_id!=null){
            $Agent=User::find($ticket->agent_id);
            array_push($email_cc,$Agent->email);

            $notification = new DataNotification($title,$complain->comment,$url_agent);
            $Agent->notify($notification);

            // Email cc to Supervisor
            $Supervisor=User::find($ticket->supervisor_id);
            array_push($email_cc,$Supervisor->email);

            $notification = new DataNotification($title,$complain->comment,$url_supervisor);
            $Supervisor->notify($notification);

            Mail::to($Agent->email)
            ->cc($email_cc)
            ->send(new ComplainMail($complain,$Agent,"eTicketing ".(Team::find($ticket->team_id)->name??'')." - Ticket #".$ticket->code." has been Complain by the user "));
        }else{

            // Email for Supervisor
            $Supervisor=User::where("role","=","supervisor")->get();

            foreach($Supervisor as $value){

                $notification = new DataNotification($title,$complain->comment,$url_supervisor);
                $value->notify($notification);

               Mail::to($Supervisor->first()->email)
                ->cc($email_cc)
                ->send(new ComplainMail($complain,$value,"eTicketing ".(Team::find($ticket->team_id)->name??'')." - The ticket #".$ticket->code." has been Complain by the user "));
            }


        }


		return 200;
	}

    public function actionResolved($ticket,$id){


        $email_cc=array();


          // Email cc to Manager
        // $Manager=User::where("role","=","manager")->get();
        // foreach($Manager as $value){
        //    array_push($email_cc,$value->email);
        // }

        // Email cc for User
        // $User=User::find($ticket->user_id);
        // array_push($email_cc,$User->email);

        $title="Ticket #".$ticket->code." telah diselesaikan oleh Agent ";
        $url_user=url("sa/summary-report?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
        $url_supervisor=url("sa/summary-report-sumpervisor-sla?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

        // Email cc to User
            $User=User::find($ticket->user_id);
            array_push($email_cc,$User->email);

            $notification = new DataNotification($title,$ticket->problem,$url_user);
            $User->notify($notification);
                       // Email cc to Supervisor
            $Supervisor=User::find($ticket->supervisor_id);
            array_push($email_cc,$Supervisor->email);

            $notification = new DataNotification($title,$ticket->problem,$url_supervisor);
            $Supervisor->notify($notification);

            Mail::to($User->email)
            ->cc($email_cc)
            ->send(new CloseMail($ticket,$User,"eTicketing ".(Team::find($ticket->team_id)->name??'')." - Ticket #".$ticket->code." telah diselesaikan oleh Agent "));



		return 200;
	}

    public function actiongiverating($ticket,$id){
        $email_cc=array();

        $title="Ticket #".$ticket->code." telah diberi rating oleh User ";

        $url_agent=url("sa/my-ticket?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
        $url_supervisor=url("sa/summary-report-sumpervisor-sla?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);



          // Email cc to Manager
        // $Manager=User::where("role","=","manager")->get();
        // foreach($Manager as $value){
        //    array_push($email_cc,$value->email);
        // }

        // Email cc for User
        // $User=User::find($ticket->user_id);
        // array_push($email_cc,$User->email);

        // Email cc to Agent
        if($ticket->agent_id!=null){
            $Agent=User::find($ticket->agent_id);
            array_push($email_cc,$Agent->email);

            $notification = new DataNotification($title,$ticket->problem,$url_agent);
            $Agent->notify($notification);

            // Email cc to Supervisor
            $Supervisor=User::find($ticket->supervisor_id);
            array_push($email_cc,$Supervisor->email);


            $notification = new DataNotification($title,$ticket->problem,$url_supervisor);
            $Supervisor->notify($notification);

            Mail::to($Agent->email)
            ->cc($email_cc)
            ->send(new RatingMail($ticket,$Agent,"eTicketing ".(Team::find($ticket->team_id)->name??'')." - Ticket #".$ticket->code." telah diberi rating oleh User "));
        }else{

            // Email cc for Supervisor
            $Supervisor=User::where("users.role","=","supervisor")
            ->join('team_user','team_user.user_id',"users.id")
            ->where('team_user.team_id', $ticket->team_id)
            ->get();

            foreach($Supervisor as $value){

                $notification = new DataNotification($title,$ticket->problem,$url_supervisor);
                $value->notify($notification);

                Mail::to($Supervisor->first()->email)
                ->cc($email_cc)
                ->send(new RatingMail($ticket,$value,"eTicketing ".(Team::find($ticket->team_id)->name??'')." -  The ticket #".$ticket->code." has been given a rating by the user "));
            }

        }


		return 200;
	}

    public function actionclose($ticket,$id){


        $email_cc=array();


          // Email cc to Manager
        // $Manager=User::where("role","=","manager")->get();
        // foreach($Manager as $value){
        //    array_push($email_cc,$value->email);
        // }

        // Email cc for User
        // $User=User::find($ticket->user_id);
        // array_push($email_cc,$User->email);

        $title="Ticket #".$ticket->code." telah diclosed oleh User ";
        $url_agent=url("sa/my-ticket?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
        $url_supervisor=url("sa/summary-report-sumpervisor-sla?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

        // Email cc to Agent
        if($ticket->agent_id!=null){
            $Agent=User::find($ticket->agent_id);
            array_push($email_cc,$Agent->email);

            $notification = new DataNotification($title,$ticket->problem,$url_agent);
            $Agent->notify($notification);
                       // Email cc to Supervisor
            $Supervisor=User::find($ticket->supervisor_id);
            array_push($email_cc,$Supervisor->email);

            $notification = new DataNotification($title,$ticket->problem,$url_supervisor);
            $Supervisor->notify($notification);

            Mail::to($Agent->email)
            ->cc($email_cc)
            ->send(new CloseMail($ticket,$Agent,"eTicketing ".(Team::find($ticket->team_id)->name??'')." - Ticket #".$ticket->code." telah diclosed oleh User "));
        }else{

            // Email cc for Supervisor
            $Supervisor=User::where("users.role","=","supervisor")
            ->join('team_user','team_user.user_id',"users.id")
            ->where('team_user.team_id', $ticket->team_id)
            ->get();

            foreach($Supervisor as $value){

                $notification = new DataNotification($title,$ticket->problem,$url_supervisor);
                $value->notify($notification);

                Mail::to($Supervisor->first()->email)
                ->cc($email_cc)
                ->send(new CloseMail($ticket,$value,"eTicketing ".(Team::find($ticket->team_id)->name??'')." -  The ticket #".$ticket->code." has been canceled by the user "));
            }

        }


		return 200;
	}

    public function actionticket($id,$action,$complain=null){

       
        $ticket=Ticket::allTeams()->find($id);
        $email_cc=  $ticket->cc_mails;

        // $request->cc_mails = array_filter($request->cc_mails, function($value) {
        //     return $value !== null;
        // });
        
        if($action=="assignment-system"){

            $ticket=Ticket::allTeams()->find($id);

            // Email cc to Supervisor
            // $Supervisor=User::find($ticket->supervisor_id);
            // array_push($email_cc,$Supervisor->email);

            // Email cc to Manager
            // $Manager=User::where("role","=","manager")->get();
            // foreach($Manager as $value){
            //    array_push($email_cc,$value->email);
            // }

            $title="Ticket #".$ticket->code." assignment to you";
            $url_user=url("sa/summary-report?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
            $url_agent=url("sa/my-ticket?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

            // Email to Agent
            $Agent=User::find($ticket->agent_id);

            $notification = new DataNotification($title,$ticket->problem,$url_agent);
            $Agent->notify($notification);

            // Email cc to user
            $User=User::find($ticket->user_id);
            //array_push($email_cc,$User->email);
            $title="Ticket #".$ticket->code." assignment to agent";
            $notification = new DataNotification($title,$ticket->problem,$url_user);
            $User->notify($notification);



            $email_subject="Ticketing System - Ticket #".$ticket->code." assignment to you";
            $email_body1="Tiket dari ".$User->name." telah ditugaskan kepada anda, mohon segera untuk menindak lanjuti.";
            $email_body2="SLA respon tiket 15 menit dihitung saat anda menerima email ini.";
            $email_to=$Agent;

            Mail::to($email_to->email)
            //->cc($email_cc)
            ->send(new AssignmentSystemEmail($ticket,$email_to,$email_subject,$email_body1,$email_body2));


        }elseif($action=="assignment"){


            $ticket=Ticket::find($id);

            // Email cc to Supervisor
            // $Supervisor=User::find($ticket->supervisor_id);
            // array_push($email_cc,$Supervisor->email);

            // Email cc to Manager
            // $Manager=User::where("role","=","manager")->get();
            // foreach($Manager as $value){
            //    array_push($email_cc,$value->email);
            // }

            // Email to Agent
            $Agent=User::find($ticket->agent_id);

            $title="Ticket #".$ticket->code." assignment to you";
            $url_user=url("sa/summary-report?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
            $url_agent=url("sa/my-ticket?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

            $notification = new DataNotification($title,$ticket->problem,$url_agent);
            $Agent->notify($notification);

            // Email cc to user
            $User=User::find($ticket->user_id);
            //array_push($email_cc,$User->email);
            $title="Ticket #".$ticket->code." assignment to agent";
            $notification = new DataNotification($title,$ticket->problem,$url_user);
            $User->notify($notification);


            $email_subject="Ticketing System - Ticket #".$ticket->code." telah ditugaskan kepada anda";
            $email_body1="Tiket dari ".$User->name." telah ditugaskan kepada anda, mohon segera untuk menindak lanjuti.";
            $email_body2="SLA respon berlaku 15 menit mohon segera respon ticket anda .";
            $email_to=$Agent;

            Mail::to($email_to->email)
            //->cc($email_cc)
            ->send(new AssignmentEmail($ticket,$email_to,$email_subject,$email_body1,$email_body2));

        }elseif($action=="task"){


            $ticket=Ticket::find($id);

            // Email cc to Supervisor
            $Supervisor=User::find($ticket->supervisor_id);
            array_push($email_cc,$Supervisor->email);

            $url_agent=url("sa/my-ticket?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

            // Email cc to Manager
            // $Manager=User::where("role","=","manager")->get();
            // foreach($Manager as $value){
            //    array_push($email_cc,$value->email);
            // }

            // Email to Agent
            $Agent=User::find($ticket->agent_id);

            $title="Any taks to you with code #".$ticket->code;
            $notification = new DataNotification($title,$ticket->problem,$url_agent);
            $Agent->notify($notification);

            // Email cc to user
            // $User=User::find($ticket->user_id);
            // array_push($email_cc,$User->email);

            $email_subject="eTicketing ".(Team::find($ticket->team_id)->name??'')." - Any taks to you with code #".$ticket->code;
            $email_body1="Berikut penugasan tiket untuk anda, mohon segera direspon ";
            $email_body2="SLA respon tiket 30 menit jika ada pekerjaan lain silahkan request perpanjangan SLA ke Supervisor. ";
            $email_to=$Agent;

            Mail::to($email_to->email)
            ->cc($email_cc)
            ->send(new TaskEmail($ticket,$email_to,$email_subject,$email_body1,$email_body2));

        }elseif($action=="response"){


            $ticket=Ticket::find($id);

             // Email cc to user
             $User=User::find($ticket->user_id);

             $title="Your ticket has been responded with code #".$ticket->code;
             $url_user=url("sa/summary-report?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
             $url_supervisor=url("sa/summary-report-sumpervisor-sla?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

             $notification = new DataNotification($title,$ticket->problem,$url_user);
             $User->notify($notification);

             // Email to Agent
              $Agent=User::find($ticket->agent_id);
            //  array_push($email_cc,$Agent->email);

             if($ticket->user_id!==$ticket->supervisor_id){
                // Email cc to
                $Supervisor=User::find($ticket->supervisor_id);
                array_push($email_cc,$Supervisor->email);

                $title="Your ticket has been responded with code #".$ticket->code;
                $notification = new DataNotification($title,$ticket->problem,$url_supervisor);
                $Supervisor->notify($notification);
             }


            // Email cc to Manager
            // $Manager=User::where("role","=","manager")->get();
            // foreach($Manager as $value){
            //    array_push($email_cc,$value->email);
            // }

            $email_subject="eTicketing ".(Team::find($ticket->team_id)->name??'')." - Your ticket has been responded with code #".$ticket->code;
            $email_body1="Thank you for your ticket ";
            $email_body2="This work is carried out from date: ".$ticket->start_work." to : ".$ticket->end_work;
            $email_to=$User;

            Mail::to($email_to->email)
            ->cc($email_cc)
            ->send(new ResponseEmail($ticket,$email_to,$email_subject,$email_body1,$email_body2));

        }elseif($action=="edit supervisor"){

            $ticket=Ticket::find($id);


            // Email cc to Supervisor
            // $Supervisor=User::find($ticket->supervisor_id);
            // array_push($email_cc,$Supervisor->email);

            // Email cc to Manager
            // $Manager=User::where("role","=","manager")->get();
            // foreach($Manager as $value){
            //    array_push($email_cc,$value->email);
            // }


            // Email to Agent
            $Agent=User::find($ticket->agent_id);

            $title="Ticket #".$ticket->code." have been update";
            $url_agent=url("sa/my-ticket?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

            $notification = new DataNotification($title,$ticket->problem,$url_agent);
            $Agent->notify($notification);

            // Email cc to user
            // $User=User::find($ticket->user_id);
            // array_push($email_cc,$User->email);

            $email_subject="eTicketing ".(Team::find($ticket->team_id)->name??'')." - Ticket #".$ticket->code." have been update";
            $email_body1="The following tickets have been updated by the supervisor";
            $email_body2=null;
            $email_to=$Agent;

            Mail::to($email_to->email)
            ->cc($email_cc)
            ->send(new EditSupervisorEmail($ticket,$email_to,$email_subject,$email_body1,$email_body2));

        }elseif($action=="reproses"){

            $ticket=Complain::find($complain);
            $url_supervisor=url("sa/supervisor-request-extend?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

            $email_cc=  $ticket->ticket->cc_mails;
            // Email cc to user
            $User=User::find($ticket->ticket->user_id);
            // array_push($email_cc,$Supervisor->email);

            // Email to Agent
            //  $Agent=User::find($ticket->agent_id);
           //  array_push($email_cc,$Agent->email);

            // if($ticket->user_id!==$ticket->supervisor_id){

            // Email  to Supervisor
            $Supervisor=User::find($ticket->ticket->supervisor_id);
            array_push($email_cc,$Supervisor->email);
            // }

            $title="Agent re-proses a ticket";
            $notification = new DataNotification($title,$ticket->comment,$url_supervisor);
            $Supervisor->notify($notification);


           // Email cc to Manager
           // $Manager=User::where("role","=","manager")->get();
           // foreach($Manager as $value){
           //    array_push($email_cc,$value->email);
           // }


           $email_subject="eTicketing ".(Team::find($ticket->team_id)->name??'')." - Your agent re-proses a ticket";
           $email_body1=null;
           $email_body2=null;
           $email_to=$User;

           $email_cc = array_filter($email_cc, function($value) {
            return $value !== null;
        });

           Mail::to($email_to->email)
           ->cc($email_cc)
           ->send(new SalesReprosesMail($ticket,$email_to,$email_subject,$email_body1,$email_body2));

        }
        elseif($action=="agent reuqest"){

            $ticket=Complain::find($complain);
            $url_supervisor=url("supervisor-request-extend?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

            $email_cc=  $ticket->ticket->cc_mails;
            // Email cc to user
            $User=User::find($ticket->ticket->user_id);
            array_push($email_cc,$User->email);

            // Email to Agent
            //  $Agent=User::find($ticket->agent_id);
           //  array_push($email_cc,$Agent->email);

            // if($ticket->user_id!==$ticket->supervisor_id){

            // Email  to Supervisor
            $Supervisor=User::find($ticket->ticket->supervisor_id);
            array_push($email_cc,$Supervisor->email);
            // }

            $title="Agent request panding a ticket";
            $notification = new DataNotification($title,$ticket->comment,$url_supervisor);
            $Supervisor->notify($notification);


           // Email cc to Manager
           // $Manager=User::where("role","=","manager")->get();
           // foreach($Manager as $value){
           //    array_push($email_cc,$value->email);
           // }


           $email_subject="eTicketing ".(Team::find($ticket->team_id)->name??'')." - Your agent panding a ticket";
           $email_body1="I need approval pending for ticket No. :  ".$ticket->ticket->code.", Date : ".$ticket->ticket->tanggal." cannot be processed, because:";
           $email_body2=null;
           $email_to=$Supervisor;

          
           $email_cc = array_filter($email_cc, function($value) {
            return $value !== null;
        });
      
                Mail::to($email_to->email)
                ->cc($email_cc)
                ->send(new AgentRequestEmail($ticket,$email_to,$email_subject,$email_body1,$email_body2));
        }
        elseif($action=="Reassign"){

            $ticket=Complain::find($complain);
            $url_supervisor=url("supervisor-request-extend?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

            $email_cc=  $ticket->ticket->cc_mails;
            // Email cc to user
            $User=User::find($ticket->ticket->user_id);
            array_push($email_cc,$User->email);

            // Email to Agent
            //  $Agent=User::find($ticket->agent_id);
           //  array_push($email_cc,$Agent->email);

            // if($ticket->user_id!==$ticket->supervisor_id){

            // Email  to Supervisor
            $Supervisor=User::find($ticket->ticket->supervisor_id);
            array_push($email_cc,$Supervisor->email);
            // }

            $title="Agent request change agent for a ticket";
            $notification = new DataNotification($title,$ticket->comment,$url_supervisor);
            $Supervisor->notify($notification);


           // Email cc to Manager
           // $Manager=User::where("role","=","manager")->get();
           // foreach($Manager as $value){
           //    array_push($email_cc,$value->email);
           // }


           $email_subject="eTicketing ".(Team::find($ticket->team_id)->name??'')." - Your agent request change agent for a ticket";
           $email_body1= $email_body1="I need approval request change agent for ticket No. :  ".$ticket->ticket->code.", Date : ".$ticket->ticket->tanggal.", because :";
           $email_body2=null;
           $email_to=$Supervisor;

          
           $email_cc = array_filter($email_cc, function($value) {
            return $value !== null;
        });
      
                Mail::to($email_to->email)
                ->cc($email_cc)
                ->send(new AgentRequestEmail($ticket,$email_to,$email_subject,$email_body1,$email_body2));
        }
        elseif($action=="DocRevison"){

            $ticket=Complain::find($complain);
            $url_supervisor=url("supervisor-request-extend?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

            $email_cc=  $ticket->ticket->cc_mails;
            // Email cc to user
            $User=User::find($ticket->ticket->user_id);
            // array_push($email_cc,$Supervisor->email);

            // Email to Agent
            //  $Agent=User::find($ticket->agent_id);
           //  array_push($email_cc,$Agent->email);

            // if($ticket->user_id!==$ticket->supervisor_id){

            // Email  to Supervisor
            $Supervisor=User::find($ticket->ticket->supervisor_id);
            array_push($email_cc,$Supervisor->email);
            // }

            $title="Need doc revison a ticket";
            $notification = new DataNotification($title,$ticket->comment,$url_supervisor);
            $Supervisor->notify($notification);


           // Email cc to Manager
           // $Manager=User::where("role","=","manager")->get();
           // foreach($Manager as $value){
           //    array_push($email_cc,$value->email);
           // }


           $email_subject="eTicketing ".(Team::find($ticket->team_id)->name??'')." - Your agent panding a ticket";
           $email_body1="Agen meminta perpanjangan SLA untuk berikut :";
           $email_body2=null;
           $email_to=$User;

          
           $email_cc = array_filter($email_cc, function($value) {
            return $value !== null;
        });
      
                Mail::to($email_to->email)
                ->cc($email_cc)
                ->send(new AgentRequestEmail($ticket,$email_to,$email_subject,$email_body1,$email_body2));
        }elseif($action=="resolved"){

            $ticket=Ticket::find($id);

            // Email cc to user
            $User=User::find($ticket->user_id);

            $title="Tiket anda sudah diselesaikan dengan no #".$ticket->code;
            $url_user=url("summary-report?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
            $url_supervisor=url("summary-report-sumpervisor-sla?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

            $notification = new DataNotification($title,$ticket->problem,$url_user);
            $User->notify($notification);


            $Agent=User::find($ticket->agent_id);




            if($ticket->user_id!==$ticket->supervisor_id){
               // Email cc to Supervisor
               $Supervisor=User::find($ticket->supervisor_id);

               $title="Tiket anda sudah diselesaikan dengan no #".$ticket->code;
               $notification = new DataNotification($title,$ticket->problem,$url_supervisor);
               $Supervisor->notify($notification);
               array_push($email_cc,$Supervisor->email);
            }

           $email_subject="eTicketing ".(Team::find($ticket->team_id)->name??'')." - Your ticket has been finalized with no #".$ticket->code;
           $email_body1="Tiket anda sudah diselesaikan oleh ".$Agent->name.", berikut detailnya :";
           $email_body2="Silahkan closed dan beri rating untuk tiket yang sudah diselesaikan oleh Agent";
           $email_to=$User;

           Mail::to($email_to->email)
           ->cc($email_cc)
           ->send(new ResolvedEmail($ticket,$email_to,$email_subject,$email_body1,$email_body2));

        }elseif($action=="Supervisor approval"){

            $ticket=Complain::find($id);

          
            // Email cc to user
            // $User=User::find($ticket->user_id);
            // array_push($email_cc,$Supervisor->email);

            // Email to Agent
             $Agent=User::find($ticket->agent_id);

             $title="Permintaan ticket sudahh direspon";
             $url_agent=url("agent/create?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
       
             $notification = new DataNotification($title,$ticket->comment,$url_agent);
             $Agent->notify($notification);
           //  array_push($email_cc,$Agent->email);

            // if($ticket->user_id!==$ticket->supervisor_id){

            // Email  to Supervisor
            // $Supervisor=User::find($ticket->ticket->supervisor_id);

            // }
        

           // Email cc to Manager
           // $Manager=User::where("role","=","manager")->get();
           // foreach($Manager as $value){
           //    array_push($email_cc,$value->email);
           // }

           $email_subject="eTicketing ".(Team::find($ticket->team_id)->name??'')." - Permintaan ticket sudahh direspon";
           $email_body1="Berikut respon dari permintaan anda :";
           $email_body2=null;
           $email_to=$Agent;


           Mail::to($email_to->email)
           ->cc($email_cc)
           ->send(new SupervisorApprovalEmail($ticket,$email_to,$email_subject,$email_body1,$email_body2));

        }


		return 200;
	}


    public function notifoverdue($tickets){

        $email_cc=array();

        // array_push($email_cc,$Supervisor->email);

        // Email cc to Manager
        // $Manager=User::where("role","=","manager")->get();
        // foreach($Manager as $value){
        //     array_push($email_cc,$value->email);
        // }

        // Email to Supervisor
        foreach ($tickets->groupBy('supervisor_id') as $ticket){

            $Supervisor=User::find($ticket->first()->supervisor_id);

             $title="Tickets Overdue #".$ticket->code;
             $url_supervisor=url("summary-report-sumpervisor-sla?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

             $notification = new DataNotification($title,$ticket->problem,$url_supervisor);
             $Supervisor->notify($notification);

            Mail::to($Supervisor->email)
            ->cc($email_cc)
            ->send(new NotifOverdueEmail($ticket,$Supervisor,"eTicketing ".(Team::find($ticket->team_id)->name??'')." - Tickets Overdue"));
        }

        // Email cc to Agent

        foreach ($tickets->groupBy('agent_id') as $ticket){
            $Agent=User::find($ticket->first()->agent_id);

            $title="Tickets Overdue #".$ticket->code;
            $url_agent=url("my-ticket?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);

            $notification = new DataNotification($title,$ticket->problem,$url_agent);
            $Agent->notify($notification);

            Mail::to($Agent->email)
            ->send(new NotifOverdueEmail($ticket,$Agent,"eTicketing ".(Team::find($ticket->team_id)->name??'')." - Your Tickets Overdue"));
        }

        return 200;
	}

    public function notifmasterdata($old,$new,$type,$master){

        $email_cc=array();

        // array_push($email_cc,$Supervisor->email);

        // Email cc to Manager
        $Manager=User::where("users.role","=","manager")
        ->join('team_user','team_user.user_id',"users.id")
        ->get();

        foreach($Manager as $value){
            array_push($email_cc,$value->email);
            $title="Change masterdata";
            $url_manager=url("master/category");
            $notification = new DataNotification($title,$old." to ".$new,$url_manager);
            $value->notify($notification);
        }

        if(!$Manager->isEmpty()){
            Mail::to($Manager->first()->email)
            ->cc($email_cc)
            ->send(new NotifMasterDataEmail($old,$new,$type,$master,$Manager->first(),"eTicketing ".(Team::find($ticket->team_id)->name??'')." - Change masterdata"));

        }

        return 200;
	}


    public function remederrating($ticket){

        // Email cc for User
        $User=User::find($ticket->user_id);

        $title="Reminder rating a service tiket #".$ticket->code;
        $url_user=url("summary-report?start_date=&end_date=&filter_by=code&keyword=".$ticket->code);
        $notification = new DataNotification($title,$ticket->problem,$url_user);
        $User->notify($notification);

            Mail::to($User->email)
            ->send(new RemenderRatingMail($ticket,$User,"eTicketing ".(Team::find($ticket->team_id)->name??'')." - Reminder rating a service tiket #".$ticket->code));

		return 200;
	}
}
