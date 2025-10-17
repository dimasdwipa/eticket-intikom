<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssetEmail extends Mailable
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
    public function __construct($assetRequest, $asset,$to)
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
        return $this->view('asset_mail.asset')
        ->subject($this->assetRequest->transaction_type . ' - Asset Notification')
        ->with([
            'assetRequest' => $this->assetRequest,
            'assetCode' => $this->assetRequest,
            'toku',$this->toku
        ]);
    }
}
