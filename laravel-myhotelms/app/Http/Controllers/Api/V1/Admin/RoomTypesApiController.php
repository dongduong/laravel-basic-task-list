<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\RoomType;

class RoomTypesApiController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();

        return $roomTypes;
    }

    public function store(StoreRoomTypeRequest $request)
    {
        return RoomType::create($request->all());
    }

    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {
        return $roomType->update($request->all());
    }

    public function show(RoomType $roomType)
    {
        return $roomType;
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();

        return response("OK", 200);
    }
}
