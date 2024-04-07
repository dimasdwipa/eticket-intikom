<?php

namespace App\SalesMail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewTicketEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;
    public $subject;

    public function __construct($tickets,$subject)
    {
        $this->data=$tickets;
        $this->subject=$subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        $data=$this->view('sales_mails.newticket')
        ->with('data',$this->data)
        ->subject($this->subject);

        foreach($this->data->first()->file_manager as $file_item){
            $data->attach(
               public_path('storage/files/tickets/'.$file_item->file),
                ['as' => pathinfo(public_path('storage/files/tickets/'.$file_item->file), PATHINFO_BASENAME)]
            );
        }

       
       return $data;
    }
}
