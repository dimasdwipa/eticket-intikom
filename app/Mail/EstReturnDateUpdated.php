<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EstReturnDateUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $assetRequest;
    public $asset;
    public $updatedBy;
    public $newDate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($assetRequest, $asset, $updatedBy ,$newDate)
    {
        $this->assetRequest = $assetRequest;
        $this->asset = $asset;
        $this->updatedBy = $updatedBy;
        $this->newDate = $newDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('asset_mail.est_return_date_updated')
            ->subject('Est Return Date Updated by User Notification')
            ->with([
                'assetRequest' => $this->assetRequest,
                'asset' => $this->asset,
                'updatedBy' => $this->updatedBy,
                'newDate' => $this->newDate,
            ]);
    }
}
