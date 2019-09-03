<?php

namespace App\Services;

use App\Guest;
use App\Reservation;
use App\Http\Requests\StoreGuestReservationRequest;
use App\Rules\RoomAvailable;

class StoreGuestReservationService extends StoreReservationService
{
    public function performStore(StoreGuestReservationRequest $request)
    {
        $request->validate([
            'room_id' => [new RoomAvailable($request->input('checkin_date'), $request->input('checkout_date'))],
        ]);

        $guest_id = $this->createGuest($request);

        $reservation = Reservation::create([
            'guest_id' => $guest_id,
            'room_id' => $request->input('room_id'),
            'check_in_date' => $request->input('checkin_date'),
            'check_out_date' => $request->input('checkout_date'),
            'adults' => $request->input('adults'),
            'children' => $request->input('children'),
            //'additional_information' => $request->input('additional_information'),
            'code' => $this->generateCode(),
            'reservation_status_id' => 1,
            'token' => $this->generateToken()
        ]);

        $historyService = new HistoryReservationService();
        $historyService->save($reservation);

        return $reservation;
    }

    public function createGuest(StoreGuestReservationRequest $request) {
        $guest = Guest::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'country' => $request->input('country')
        ]);
        return $guest->id;
    }
}