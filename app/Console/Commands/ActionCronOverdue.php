<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\MailController;
use App\Models\Ticket;

class ActionCronOverdue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'action:ticketoverdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manual Run Notification overdue by system';

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
        $tickets=Ticket::where('status', 'On Progress')
        ->whereRaw('DATE_ADD(sla_respone , interval sla_ticket_time MINUTE) < now()')
        ->whereNotNull('sla_respone')
        ->allTeams()
        ->get();


        if($tickets->count()>0){
            try {
                $email=new MailController();
                $email->notifoverdue($tickets);

              
            } catch (\Throwable $th) {
                return print($th);
            }

        }

        return 200;
    }
}
