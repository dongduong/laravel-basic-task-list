<?php

namespace App\Services;

use App\Reservation;

class CheckInReservationService
{
    public function perform($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        $reservation->update(['reservation_status_id' => 3]);
        return $reservation;
    }
}
