<?php

namespace App\Listeners;

use App\Events\SendNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\DataNotification;

class SendNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendNotification  $event
     * @return void
     */
    public function handle(SendNotification $event)
    {

      
        $title="title";
        $message="message";

        $otherUser = User::find(1); // Gantikan dengan cara Anda mendapatkan pengguna lain
        $notification = new DataNotification($title,$message);
        $otherUser->notify($notification);
    }
}
