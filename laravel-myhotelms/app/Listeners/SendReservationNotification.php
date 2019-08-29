<?php

namespace App\Listeners;

use App\Events\RoomReserved;
use App\Mail\RoomReservationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendReservationNotification implements ShouldQueue
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
     * @param  \App\Events\RoomReserved  $event
     * @return void
     */
    public function handle(RoomReserved $event)
    {
        try {
            $mail = new RoomReservationEmail();
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
    public function failed(RoomReserved $event, $exception)
    {
        //
    }
}