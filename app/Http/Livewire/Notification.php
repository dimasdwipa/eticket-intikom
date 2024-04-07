<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $countmasse;
    public $notif;

    public $showdata;

    protected $listeners=['newnotification'];

    public function newnotification(){
        
        if( auth()->user()->unreadNotifications->count()>0){
            $this->countmasse='<sup style="margin-left: 0.1em;top:-1em;"><span class="badge badge-pill badge-danger bg-gradient-primary2">'.
                auth()->user()->unreadNotifications->count().'<span></sup>';


            
        }else{
            $this->countmasse=null;
        }
    }

    public function show()
    {
        if(empty($this->showdata)){
            $this->showdata="show";
        }else{
            $this->showdata=null;
        }
       
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
