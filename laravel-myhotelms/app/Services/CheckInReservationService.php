<?php

namespace App\Services;

use App\Reservation;

class CheckInReservationService
{
    public function perform($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        $historyService = new HistoryReservationService();
        $historyService->save($reservation);
        $reservation->update(['reservation_status_id' => 3, 'editing_user_id' => \Auth::user()->id]);
        return $reservation;
    }
}
