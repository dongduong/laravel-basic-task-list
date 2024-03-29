<?php

namespace App\Http\Controllers\Admin;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReservationRequest;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Services\StoreReservationService;
use App\Services\ConfirmReservationService;
use App\Services\CancelReservationService;
use App\Services\CheckInReservationService;
use App\Services\CheckOutReservationService;
use App\Reservation;
use App\ReservationHistory;
use App\Room;
use App\Payment;
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

    public function checkin($reservation_id)
    {
        abort_unless(\Gate::allows('reservation_edit'), 403);

        $service = new CheckInReservationService();

        $reservation = $service->perform($reservation_id);

        Session::flash('message', 'Check-In Reservation was successfully !');

        return redirect()->route('admin.reservations.show', compact('reservation'));
    }

    public function checkout($reservation_id)
    {
        abort_unless(\Gate::allows('reservation_edit'), 403);

        $service = new CheckOutReservationService();

        $reservation = $service->perform($reservation_id);

        Session::flash('message', 'Check-Out Reservation was successfully !');

        return redirect()->route('admin.reservations.show', compact('reservation'));
    }

    public function cancel($reservation_id)
    {
        abort_unless(\Gate::allows('reservation_edit'), 403);

        $service = new CancelReservationService();

        $reservation = $service->perform($reservation_id);

        Session::flash('message', 'Cancel Reservation was successfully !');

        return redirect()->route('admin.reservations.show', compact('reservation'));
    }

    public function show(Reservation $reservation)
    {
        abort_unless(\Gate::allows('reservation_show'), 403);

        $reservation->load('guest', 'room');

        $reservation_histories = ReservationHistory::all()->where('reservation_id', $reservation->id);

        $payments = Payment::all()->where('reservation_id', $reservation->id);

        return view('admin.reservations.show', compact('reservation', 'reservation_histories', 'payments'));
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
