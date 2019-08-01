<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoomStatusRequest;
use App\Http\Requests\StoreRoomStatusRequest;
use App\Http\Requests\UpdateRoomStatusRequest;
use App\RoomStatus;

class RoomStatusesController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('room_status_access'), 403);

        $roomStatuses = RoomStatus::all();

        return view('admin.roomStatuses.index', compact('roomStatuses'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('room_status_create'), 403);

        return view('admin.roomStatuses.create');
    }

    public function store(StoreRoomStatusRequest $request)
    {
        abort_unless(\Gate::allows('room_status_create'), 403);

        $roomStatus = RoomStatus::create($request->all());

        return redirect()->route('admin.room-statuses.index');
    }

    public function edit(RoomStatus $roomStatus)
    {
        abort_unless(\Gate::allows('room_status_edit'), 403);

        return view('admin.roomStatuses.edit', compact('roomStatus'));
    }

    public function update(UpdateRoomStatusRequest $request, RoomStatus $roomStatus)
    {
        abort_unless(\Gate::allows('room_status_edit'), 403);

        $roomStatus->update($request->all());

        return redirect()->route('admin.room-statuses.index');
    }

    public function show(RoomStatus $roomStatus)
    {
        abort_unless(\Gate::allows('room_status_show'), 403);

        return view('admin.roomStatuses.show', compact('roomStatus'));
    }

    public function destroy(RoomStatus $roomStatus)
    {
        abort_unless(\Gate::allows('room_status_delete'), 403);

        $roomStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoomStatusRequest $request)
    {
        RoomStatus::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
