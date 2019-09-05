<?php

namespace App\Services;

use App\Room;

class UpdateStatusRoomService
{
    public function perform($reservation, $room_status_id)
    {
        $room = Room::find($reservation->room_id);
        $room->update(['room_status_id' => $room_status_id]);

        //history
        $historyService = new HistoryRoomService();
        $historyService->save($room, $reservation);
        return $room;
    }
}
