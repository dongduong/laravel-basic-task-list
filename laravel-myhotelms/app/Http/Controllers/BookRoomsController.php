<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class BookRoomsController extends Controller
{
    public function index(Request $request)
    {   
        $rooms = Room::all()->pluck('room_number', 'id');

        $room = Room::find($request->input('room_id'));
        return view('book-rooms', compact('rooms', 'room'));
    }
}
