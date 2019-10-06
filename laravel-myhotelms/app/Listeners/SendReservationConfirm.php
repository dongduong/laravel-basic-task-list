<?php

namespace App\Listeners;

use App\Events\RoomConfirmed;
use App\Mail\RoomConfirmEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendReservationConfirm implements ShouldQueue
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
     * @param  \App\Events\RoomConfirmed  $event
     * @return void
     */
    public function handle(RoomConfirmed $event)
    {
        try {
            $mail = new RoomConfirmEmail();
            $mail->reservation = $event->reservation;
            Mail::send($mail);
        } catch (\Exception $e) {

        }
    }

    /**
     * Handle a job failure.
     *
     * @param  \App\Events\OrderShipped  $event
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(RoomConfirmed $event, $exception)
    {
        //
    }
}