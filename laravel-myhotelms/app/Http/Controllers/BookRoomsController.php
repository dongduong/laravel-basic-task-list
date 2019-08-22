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
        $rooms = RoomType::all()->pluck('name', 'id');
        return view('book-rooms', compact('rooms'));
    }
}
