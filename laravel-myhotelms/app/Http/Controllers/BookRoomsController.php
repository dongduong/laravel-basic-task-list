<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class BookRoomsController extends Controller
{
    public function index(Request $request)
    {
        return view('book-rooms');
    }
}
