<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OverdueReturnNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $assetRequest;
    public $asset;
    public $toku;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($assetRequest, $asset, $to)
    {
        
        $this->assetRequest = $assetRequest;
        $this->asset = $asset;
        $this->toku = $to;
   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('asset_mail.overdue_return')
            ->subject('Overdue Asset Return Notification')
            ->with([
                'assetRequest' => $this->assetRequest,
                'asset' => $this->asset,
                'toku' => $this->toku,
            ]);
    }
}
