<?php

namespace App\Services;

use App\RoomHistory;
use App\Http\Requests\StoreReservationRequest;
use Illuminate\Support\Str;

class HistoryRoomService
{
    public function save($room, $reservation, $note = "")
    {
        $history = RoomHistory::create([
            'reservation_id' => $reservation->id,
            'room_id' => $room->id,
            'room_status_id' => $room->room_status_id, 
            'note' => $note
        ]);

        return $history;
    }
}