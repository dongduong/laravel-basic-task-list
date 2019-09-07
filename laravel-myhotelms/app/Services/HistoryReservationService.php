<?php

namespace App\Services;

use App\ReservationHistory;
use Illuminate\Support\Str;

class HistoryReservationService
{
    public function save($reservation, $note = "")
    {
        $history = ReservationHistory::create([
            'reservation_id' => $reservation->id, 
            'edit_user_id' => $reservation->editing_user_id, 
            'action' => $this->getAction($reservation->reservation_status_id), 
            'changed_at' => $reservation->updated_at,
            'note' => $note
        ]);

        return $history;
    }

    public function getAction($reservationStatusId) {
        switch ($reservationStatusId) {
            case 1:
                return \Config::get('reservation.action.request');
            case 2:
                return \Config::get('reservation.action.confirm');
            case 3:
                return \Config::get('reservation.action.checkin');
            case 4:
                return \Config::get('reservation.action.checkout');
            case 5:
                return \Config::get('reservation.action.cancel');
            default:
                return "UNKNOWN";
        }
    }
}