<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use App\Models\Complain;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailController;

class ActionCronCloseTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'action:closeticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manual Run Close ticket by system ( Resolved to Closed )';

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
        foreach (Ticket::where('status', 'Resolved')->allTeams()->get() as $item){

               if(!empty($item->sla_resolved)){
                    if (\Carbon\Carbon::create($item->sla_resolved)->addDay() < \Carbon\Carbon::now()){
                        DB::beginTransaction();
                        try {
                            $data_ticket=Ticket::allTeams()->find($item->id);
                            $data_ticket->state = "Responded";
                            $data_ticket->sla_close = now();
                            $data_ticket->status = 'Closed';
                            $data_ticket->save();

                            $data = new Complain();
                            $data->ticket_id = $item->id;
                            $data->comment = "CLose by system";
                            $data->note = "Close Ticket #".$item->code." on ".\Carbon\Carbon::now();
                            $data->status = "Closed";
                            $data->approve = null;
                            $data->team_id = $data_ticket->team_id;
                            $data->save();

                            $email=new MailController();
                            $email->actionbysytem($item->id);
                            DB::commit();
    
                        } catch (\Throwable $th) {

                            DB::rollback();
                            return print($th);

                        }

                    }
                }
        }

        return 200;
    }
}
