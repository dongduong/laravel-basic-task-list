<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoomRequest;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Room;
use App\RoomStatus;
use App\RoomType;

class RoomController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('room_access'), 403);

        $rooms = Room::all();

        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('room_create'), 403);

        $room_types = RoomType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $room_statuses = RoomStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rooms.create', compact('room_types', 'room_statuses'));
    }

    public function store(StoreRoomRequest $request)
    {
        abort_unless(\Gate::allows('room_create'), 403);

        $room = Room::create($request->all());

        return redirect()->route('admin.rooms.index');
    }

    public function edit(Room $room)
    {
        abort_unless(\Gate::allows('room_edit'), 403);

        $room_types = RoomType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $room_statuses = RoomStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $room->load('room_type', 'room_status');

        return view('admin.rooms.edit', compact('room_types', 'room_statuses', 'room'));
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        abort_unless(\Gate::allows('room_edit'), 403);

        $room->update($request->all());

        return redirect()->route('admin.rooms.index');
    }

    public function show(Room $room)
    {
        abort_unless(\Gate::allows('room_show'), 403);

        $room->load('room_type', 'room_status');

        return view('admin.rooms.show', compact('room'));
    }

    public function destroy(Room $room)
    {
        abort_unless(\Gate::allows('room_delete'), 403);

        $room->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoomRequest $request)
    {
        Room::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
