<?php

namespace App\SalesMail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SalesReprosesMail extends Mailable
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

        $data=$this->view('sales_mails.reproses')
        ->with('data',$this->data)
        ->with('user',$this->user)
        ->with('body1',$this->body1)
        ->with('body2',$this->body2)
        ->subject($this->subject);

        foreach($this->data->ticket->first()->file_manager as $file_item){
            $data->attach(
               public_path('storage/files/tickets/'.$file_item->file),
                ['as' => pathinfo(public_path('storage/files/tickets/'.$file_item->file), PATHINFO_BASENAME)]
            );
        }

        return $data;
    }
}
