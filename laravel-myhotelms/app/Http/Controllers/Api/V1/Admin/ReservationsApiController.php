<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Reservation;

class ReservationsApiController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return $reservations;
    }

    public function store(StoreReservationRequest $request)
    {
        return Reservation::create($request->all());
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        return $reservation->update($request->all());
    }

    public function show(Reservation $reservation)
    {
        return $reservation;
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return response("OK", 200);
    }
}
