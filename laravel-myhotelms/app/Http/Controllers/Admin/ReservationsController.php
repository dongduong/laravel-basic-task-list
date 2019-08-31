<?php

namespace App\Http\Controllers\Admin;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReservationRequest;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Services\StoreReservationService;
use App\Services\ConfirmReservationService;
use App\Reservation;
use App\Room;
use Session;

class ReservationsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('reservation_access'), 403);

        $reservations = Reservation::all();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('reservation_create'), 403);

        $guests = Guest::all()->pluck('last_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rooms = Room::all()->pluck('room_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reservations.create', compact('guests', 'rooms'));
    }

    public function store(StoreReservationRequest $request)
    {
        abort_unless(\Gate::allows('reservation_create'), 403);

        $service = new StoreReservationService();

        $reservation = $service->perform($request);

        return redirect()->route('admin.reservations.index');
    }

    public function edit(Reservation $reservation)
    {
        abort_unless(\Gate::allows('reservation_edit'), 403);

        $guests = Guest::all()->pluck('last_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rooms = Room::all()->pluck('room_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reservation->load('guest', 'room');

        return view('admin.reservations.edit', compact('guests', 'rooms', 'reservation'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        abort_unless(\Gate::allows('reservation_edit'), 403);

        $reservation->update($request->all());

        return redirect()->route('admin.reservations.index');
    }

    public function confirm($reservation_id)
    {
        abort_unless(\Gate::allows('reservation_edit'), 403);

        $service = new ConfirmReservationService();

        $reservation = $service->perform($reservation_id);

        Session::flash('message', 'Confirm Reservation was successfully !');

        return redirect()->route('admin.reservations.show', compact('reservation'));
    }

    public function show(Reservation $reservation)
    {
        abort_unless(\Gate::allows('reservation_show'), 403);

        $reservation->load('guest', 'room');

        return view('admin.reservations.show', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    {
        abort_unless(\Gate::allows('reservation_delete'), 403);

        $reservation->delete();

        return back();
    }

    public function massDestroy(MassDestroyReservationRequest $request)
    {
        Reservation::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
