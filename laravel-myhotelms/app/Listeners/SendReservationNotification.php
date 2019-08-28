<?php

namespace App\Listeners;

use App\Events\RoomReserved;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        // Access the order using $event->order...
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