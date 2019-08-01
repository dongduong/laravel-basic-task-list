<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomStatusRequest;
use App\Http\Requests\UpdateRoomStatusRequest;
use App\RoomStatus;

class RoomStatusesApiController extends Controller
{
    public function index()
    {
        $roomStatuses = RoomStatus::all();

        return $roomStatuses;
    }

    public function store(StoreRoomStatusRequest $request)
    {
        return RoomStatus::create($request->all());
    }

    public function update(UpdateRoomStatusRequest $request, RoomStatus $roomStatus)
    {
        return $roomStatus->update($request->all());
    }

    public function show(RoomStatus $roomStatus)
    {
        return $roomStatus;
    }

    public function destroy(RoomStatus $roomStatus)
    {
        $roomStatus->delete();

        return response("OK", 200);
    }
}
