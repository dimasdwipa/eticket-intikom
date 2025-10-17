<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\Ticket;
use Carbon\Carbon;

class EticketDailyStatistik extends Component
{
    public $progressChartData = [];
    public $teamId;

    protected $listeners = ['updateProgressChartData' => 'loadProgressChartData'];

    public function mount()
    {
        $this->teamId = (int) request()->segment(3);
        $this->loadProgressChartData();
        $this->dispatchBrowserEvent('startAutoReload'); // Memulai auto reload
    }

    public function loadProgressChartData()
    {
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $progressData = Ticket::selectRaw("CONVERT(DATE, created_at) as date, COUNT(*) as count")
            ->whereBetween('created_at', [$startDate, $endDate])
             ->allTeams()->where('team_id', $this->teamId)
            ->groupByRaw("CONVERT(DATE, created_at)")
            ->orderBy("date")
            ->pluck("count", "date")
            ->map(function ($count) {
                return (int) $count;
            })
            ->toArray();

        $dates = [];
        $ticketProgressCounts = [];

        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i)->toDateString();
            $dates[] = $date;
            $ticketProgressCounts[] = $progressData[$date] ?? 0;
        }



        $this->progressChartData = array_combine($dates, $ticketProgressCounts);

        // Kirim data ke Highcharts untuk update chart
        $this->dispatchBrowserEvent('refreshProgressChart', [
            'dates' => $dates,
            'ticketProgressCounts' => $ticketProgressCounts,
        ]);
    }

    public function render()
    {
        return view('livewire.guest.eticket-daily-statistik', [
            'progressChartData' => $this->progressChartData
        ]);
    }
}
