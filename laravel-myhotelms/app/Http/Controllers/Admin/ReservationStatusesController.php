<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReservationStatusRequest;
use App\Http\Requests\StoreReservationStatusRequest;
use App\Http\Requests\UpdateReservationStatusRequest;
use App\ReservationStatus;

class ReservationStatusesController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('reservation_status_access'), 403);

        $reservationStatuses = ReservationStatus::all();

        return view('admin.reservationStatuses.index', compact('reservationStatuses'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('reservation_status_create'), 403);

        return view('admin.reservationStatuses.create');
    }

    public function store(StoreReservationStatusRequest $request)
    {
        abort_unless(\Gate::allows('reservation_status_create'), 403);

        $reservationStatus = ReservationStatus::create($request->all());

        return redirect()->route('admin.reservation-statuses.index');
    }

    public function edit(ReservationStatus $reservationStatus)
    {
        abort_unless(\Gate::allows('reservation_status_edit'), 403);

        return view('admin.reservationStatuses.edit', compact('reservationStatus'));
    }

    public function update(UpdateReservationStatusRequest $request, ReservationStatus $reservationStatus)
    {
        abort_unless(\Gate::allows('reservation_status_edit'), 403);

        $reservationStatus->update($request->all());

        return redirect()->route('admin.reservation-statuses.index');
    }

    public function show(ReservationStatus $reservationStatus)
    {
        abort_unless(\Gate::allows('reservation_status_show'), 403);

        return view('admin.reservationStatuses.show', compact('reservationStatus'));
    }

    public function destroy(ReservationStatus $reservationStatus)
    {
        abort_unless(\Gate::allows('reservation_status_delete'), 403);

        $reservationStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyReservationStatusRequest $request)
    {
        ReservationStatus::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
