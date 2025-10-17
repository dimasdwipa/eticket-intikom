<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\Ticket;

class EticketStatistik extends Component
{
    public $chartData = [];
    public $teamId;

    protected $listeners = ['updateChartData' => 'loadChartData'];

    public function mount()
    {

        $this->teamId = (int) request()->segment(3);
        $this->loadChartData();
    }

    public function loadChartData()
    {

        $this->chartData = [
            'Open' => Ticket::allTeams()->where('team_id', $this->teamId)->where('status', 'Open')->count(),
            'Awaiting Response' => Ticket::allTeams()->where('team_id', $this->teamId)->where('status', 'Awaiting Response')->count(),
            'On Progress' => Ticket::allTeams()->where('team_id', $this->teamId)->where('status', 'On Progress')->count(),
            'Repairing' => Ticket::allTeams()->where('team_id', $this->teamId)->where('status', 'Repairing')->count(),
            'Resolved' => Ticket::allTeams()->where('team_id', $this->teamId)->where('status', 'Resolved')->count(),
            'Closed' => Ticket::allTeams()->where('team_id', $this->teamId)->where('status', 'Closed')->count()
        ];

        // Kirim data ke JavaScript untuk update Highcharts
        $this->dispatchBrowserEvent('refreshChart', ['chartData' => array_values($this->chartData)]);
    }

    public function render()
    {
        return view('livewire.guest.eticket-statistik', [
            'chartData' => $this->chartData
        ]);
    }
}
