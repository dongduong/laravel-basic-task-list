<?php

namespace App\Services;

use App\Reservation;
use App\Http\Requests\StoreReservationRequest;

class StoreReservationService
{
    public function perform(StoreReservationRequest $request)
    {
        $request->request->add(['code' => $this->generateCode()]); 

        $reservation = Reservation::create($request->all());

        return $reservation;
    }

    public function generateCode() {
        if (Reservation::orderBy('id','DESC')->take(1)->first()) {
            return "RESER" . now()->year . sprintf('%04d', (Reservation::orderBy('id','DESC')->take(1)->first()->id + 1));
        } else {
            return "RESER". now()->year . "0001";
        }
    }
}