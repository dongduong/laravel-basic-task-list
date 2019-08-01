<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Room;

class RoomApiController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return $rooms;
    }

    public function store(StoreRoomRequest $request)
    {
        return Room::create($request->all());
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        return $room->update($request->all());
    }

    public function show(Room $room)
    {
        return $room;
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return response("OK", 200);
    }
}
