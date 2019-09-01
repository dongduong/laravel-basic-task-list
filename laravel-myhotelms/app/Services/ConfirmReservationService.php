<?php

namespace App\Services;

use App\Reservation;

class ConfirmReservationService
{
    public function perform($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        $historyService = new HistoryReservationService();
        $historyService->save($reservation);
        $reservation->update(['reservation_status_id' => 2, 'editing_user_id' => \Auth::user()->id]);
        return $reservation;
    }
}
