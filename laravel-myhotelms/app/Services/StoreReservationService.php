<?php

namespace App\Services;

use App\Reservation;
use App\Http\Requests\StoreReservationRequest;
use Illuminate\Support\Str;

class StoreReservationService
{
    public function perform(StoreReservationRequest $request)
    {
        $request->request->add(['code' => $this->generateCode(), 'reservation_status_id' => 1, 'token' => $this->generateToken()], 'editing_user_id' => \Auth::user()->id]); 

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

    public function generateToken() {
        return (string) Str::uuid();
    }
}