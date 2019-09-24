<?php

namespace App\Events;

use App\Reservation;
use Illuminate\Queue\SerializesModels;

class RoomPayment
{
    use SerializesModels;

    public $reservation;

    /**
     * Create a new event instance.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }
}
