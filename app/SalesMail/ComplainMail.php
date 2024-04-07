<?php

namespace App\SalesMail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplainMail extends Mailable
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

    public function __construct($tickets,$user,$subject)
    {
        $this->data=$tickets;
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
        return $this->view('sales_mails.complainticket')
        ->with('data',$this->data)
        ->with('user',$this->user)
        ->subject($this->subject);
    }
}
