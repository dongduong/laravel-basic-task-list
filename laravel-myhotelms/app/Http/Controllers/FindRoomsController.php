<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Requests\FindRoomRequest;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class FindRoomsController extends Controller
{
    public function index(Request $request)
    {
        $time_from = $request->input('checkin_date');
        $time_to = $request->input('checkout_date');

        return view('find-rooms', compact('time_from', 'time_to'));
    }


    public function find(FindRoomRequest $request)
    {
        $time_from = $request->input('checkin_date');
        $time_to = $request->input('checkout_date');

        $rooms = Room::with('booking')->whereHas('booking', function ($q) use ($time_from, $time_to) {
            $q->where(function ($q2) use ($time_from, $time_to) {
                $q2->where('check_in_date', '>=', $time_to)
                   ->orWhere('check_out_date', '<=', $time_from);
            });
        })->orWhereDoesntHave('booking')->get();
        
        return view('find-rooms', compact('rooms', 'time_from', 'time_to'));
    }
}
