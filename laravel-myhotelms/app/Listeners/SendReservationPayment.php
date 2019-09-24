<?php

namespace App\Listeners;

use App\Events\RoomPayment;
use App\Mail\RoomPaymentEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendReservationPayment implements ShouldQueue
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
     * @param  \App\Events\RoomPayment  $event
     * @return void
     */
    public function handle(RoomPayment $event)
    {
        try {
            $mail = new RoomPaymentEmail();
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
    public function failed(RoomPayment $event, $exception)
    {
        //
    }
}