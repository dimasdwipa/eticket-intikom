<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Team;
use Livewire\WithPagination;

class EticketList extends Component
{
    use WithPagination;

    public $team;
    public $pageIndex = 1;
    public $totalPages;
    public $perPage = 10;

    public function mount()
    {
        $id = (int) request()->segment(3);
        $this->team = Team::find($id);
        $this->totalPages = ceil(Ticket::allTeams()->where('team_id', $id)->whereIn('status', ['Open', 'On Progress','Awaiting Response','Repairing'])->count() / $this->perPage);

    }

    public function nextPageAuto()
    {
        $this->totalPages = ceil(Ticket::allTeams()->where('team_id', $this->team->id)->whereIn('status', ['Open', 'On Progress','Awaiting Response','Repairing'])->count() / $this->perPage);
        $this->pageIndex = $this->pageIndex < $this->totalPages ? $this->pageIndex + 1 : 1;
    }

    public function render()
    {
        $tickets = Ticket::allTeams()->where('team_id', $this->team->id)
            ->whereIn('status', ['Open', 'On Progress','Awaiting Response','Repairing'])
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage, ['*'], 'page', $this->pageIndex);
 
        return view('livewire.guest.eticket-list', compact('tickets'));
    }
}
