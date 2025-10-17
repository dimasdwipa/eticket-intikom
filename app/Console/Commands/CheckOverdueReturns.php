<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\OverdueReturnNotification;
use App\Models\AssetRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class CheckOverdueReturns extends Command
{
    protected $signature = 'assets:check-overdue-returns';
    protected $description = 'Check for overdue asset returns and send notifications';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        
        // Cari asset requests yang overdue
        $overdueRequests = AssetRequest::where('est_return_date', '<', Carbon::now()->startOfDay())
            ->whereNull('return_date')
            ->allTeams()
            ->get();
    
        foreach ($overdueRequests as $assetRequest) {
            $user = User::GetAllTeam()->find($assetRequest->user_id);
            $agent = User::GetAllTeam()->find($assetRequest->agent_id);
            $supervisor = User::GetAllTeam()->find($assetRequest->supervisor_id);

            // Kirim email ke agent dengan CC ke user dan supervisor
            Mail::to($agent->email)
                ->cc([$user->email, $supervisor->email])
                ->send(new OverdueReturnNotification($assetRequest, $assetRequest->assetAllTeams, $user->name));
                
        }

        $this->info('Overdue return notifications sent successfully!');
    }
}
