<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomType;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Services\StoreGuestReservationService;
use App\Http\Requests\StoreGuestReservationRequest;

class BookRoomsController extends Controller
{
    public function index(Request $request)
    {   
        $rooms = Room::all()->pluck('room_number', 'id');

        $room = Room::find($request->input('room_id'));
        return view('book-rooms', compact('rooms', 'room'));
    }

    public function store(StoreGuestReservationRequest $request)
    {
        $service = new StoreGuestReservationService();

        $reservation = $service->performStore($request);

        return redirect()->route('book-rooms.success', ['reservation_id' => $reservation->id]);
    }

    public function success(Request $request)
    {
        if($request->input('reservation_id')) {
            $reservation = Reservation::find($request->input('reservation_id'));
            return view('book-success', compact('reservation'));
        }
        else {
            return redirect('/');
        }
        
    }
}
