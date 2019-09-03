<?php

namespace App\Services;

use App\Room;

class UpdateStatusRoomService
{
    public function perform($room_id, $room_status_id)
    {
        $room = Room::find($room_id);
        $room->update(['room_status_id' => $room_status_id]);
        return $room;
    }
}
