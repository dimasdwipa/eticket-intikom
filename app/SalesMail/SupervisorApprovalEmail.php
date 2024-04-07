<?php

namespace App\SalesMail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupervisorApprovalEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $user;
    public $subject;
    public $body1;
    public $body2;

    public function __construct($tickets,$user,$subject,$body1=null,$body2=null)
    {
        $this->data=$tickets;
        $this->user=$user;
        $this->subject=$subject;
        $this->body1=$body1;
        $this->body2=$body2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('sales_mails.supervisor-approval')
        ->with('data',$this->data)
        ->with('user',$this->user)
        ->with('body1',$this->body1)
        ->with('body2',$this->body2)
        ->subject($this->subject);
    }
}
