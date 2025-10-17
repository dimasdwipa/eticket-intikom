<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use App\Models\Complain;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailController;

class ActionRemederRating extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'action:remederrating';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manual Run Remender Rating';

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
      $tickets = Ticket::where(function($query){
        $query->where('status', 'Resolved')
        ->orwhere('status', 'Closed');
    })
    // ->whereRaw('DATE_ADD(sla_resolved , interval 1440 MINUTE) > now() or DATE_ADD(sla_close , interval 1440 MINUTE) > now()')
    // ->whereRaw('DATEADD(MINUTE, 1440, sla_resolved) > GETDATE() OR DATEADD(MINUTE, 1440, sla_close) > GETDATE()')
    ->where(function($query) {
        $query->whereRaw("DATEADD(MINUTE, 1440, sla_resolved) > GETDATE()")
              ->orWhereRaw("DATEADD(MINUTE, 1440, sla_close) > GETDATE()");
    })
    ->whereNull("rating")
    ->allTeams()
    ->get();

        foreach ($tickets as $item){
                     DB::beginTransaction();
                     try {
                         $data_ticket=Ticket::allTeams()->find($item->id);

                         $data = new Complain();
                         $data->ticket_id = $item->id;
                         $data->comment = "Remender Rating by system";
                         $data->note = "Remender Rating Ticket #".$item->code." on ".\Carbon\Carbon::now();
                         $data->status = "Remender Rating";
                         $data->approve = null;
                         $data->team_id = $data_ticket->team_id;
                         $data->save();
                         $email=new MailController();
                         $email->remederrating($data_ticket);

                         DB::commit();

                     } catch (\Throwable $th) {


                         DB::rollback();
                         return print($th);

                     }


        }

     return 200;
    }
}
