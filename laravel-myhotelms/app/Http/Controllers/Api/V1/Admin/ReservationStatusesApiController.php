<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationStatusRequest;
use App\Http\Requests\UpdateReservationStatusRequest;
use App\ReservationStatus;

class ReservationStatusesApiController extends Controller
{
    public function index()
    {
        $reservationStatuses = ReservationStatus::all();

        return $reservationStatuses;
    }

    public function store(StoreReservationStatusRequest $request)
    {
        return ReservationStatus::create($request->all());
    }

    public function update(UpdateReservationStatusRequest $request, ReservationStatus $reservationStatus)
    {
        return $reservationStatus->update($request->all());
    }

    public function show(ReservationStatus $reservationStatus)
    {
        return $reservationStatus;
    }

    public function destroy(ReservationStatus $reservationStatus)
    {
        $reservationStatus->delete();

        return response("OK", 200);
    }
}
