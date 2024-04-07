<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Job extends Component
{
    public $count;

    public function aa(){
  
        $this->emit('orderCompleted');
        $data=auth()->user()->unreadNotifications->where('read_at',null)->count();

        if($data!=$this->count){
            $this->emit('newnotification');
            $this->count = $data;
            $this->emit("music");
        }

    }

    public function notif_up(){
      
        foreach (auth()->user()->unreadNotifications->where('read_at',null)->where('notif_up',null) as $item){

            $item->notif_up=now();
            $item->save();
        }

    }

    public function render()
    {
        return view('livewire.job');
    }
}
