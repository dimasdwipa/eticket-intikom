<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifMasterDataEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


     public $new;
     public $old;
     public $type;
     public $master;
     public $user;
     public $subject;

    public function __construct($new,$old,$type,$master,$user,$subject)
    {
        $this->new=$new;
        $this->old=$old;
        $this->type=$type;
        $this->master=$master;
        $this->user=$user;
        $this->subject=$subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notifmasterdata')
        ->with('new',$this->new)
        ->with('old',$this->old)
        ->with('type',$this->type)
        ->with('master',$this->master)
        ->with('user',$this->user)
        ->subject($this->subject);
    }
}
