<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoomTypeRequest;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\RoomType;

class RoomTypesController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('room_type_access'), 403);

        $roomTypes = RoomType::all();

        return view('admin.roomTypes.index', compact('roomTypes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('room_type_create'), 403);

        return view('admin.roomTypes.create');
    }

    public function store(StoreRoomTypeRequest $request)
    {
        abort_unless(\Gate::allows('room_type_create'), 403);

        $roomType = RoomType::create($request->all());

        return redirect()->route('admin.room-types.index');
    }

    public function edit(RoomType $roomType)
    {
        abort_unless(\Gate::allows('room_type_edit'), 403);

        return view('admin.roomTypes.edit', compact('roomType'));
    }

    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {
        abort_unless(\Gate::allows('room_type_edit'), 403);

        $roomType->update($request->all());

        return redirect()->route('admin.room-types.index');
    }

    public function show(RoomType $roomType)
    {
        abort_unless(\Gate::allows('room_type_show'), 403);

        return view('admin.roomTypes.show', compact('roomType'));
    }

    public function destroy(RoomType $roomType)
    {
        abort_unless(\Gate::allows('room_type_delete'), 403);

        $roomType->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoomTypeRequest $request)
    {
        RoomType::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
