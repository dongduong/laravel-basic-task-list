<?php

namespace App\Services;

use App\Reservation;

class CheckOutReservationService
{
    public function perform($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        $reservation->update(['reservation_status_id' => 4]);
        return $reservation;
    }
}
