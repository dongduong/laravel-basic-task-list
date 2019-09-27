<?php

namespace App\Services;

use App\Reservation;

class PaymentReservationService
{
    public function perform($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        $reservation->update(['reservation_status_id' => 10, 'editing_user_id' => \Auth::user()->id]);
        $historyService = new HistoryReservationService();
        $historyService->save($reservation);
        return $reservation;
    }
}
