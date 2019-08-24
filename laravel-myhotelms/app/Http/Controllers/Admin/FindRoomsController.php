<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class FindRoomsController extends Controller
{
    public function index(Request $request)
    {
        abort_unless(\Gate::allows('find_room_access'), 403);
        
        $time_from = $request->input('time_from');
        $time_to = $request->input('time_to');

        if ($request->isMethod('POST')) {
            $rooms = Room::with('booking')->whereHas('booking', function ($q) use ($time_from, $time_to) {
                $q->where(function ($q2) use ($time_from, $time_to) {
                    $q2->where('check_in_date', '>=', date('Y-m-d', strtotime($time_to)))
                       ->orWhere('check_out_date', '<=', date('Y-m-d', strtotime($time_from)));
                });
            })->orWhereDoesntHave('booking')->get();
        } else {
            $rooms = null;
        }
        return view('admin.find_rooms.index', compact('rooms', 'time_from', 'time_to'));
    }
}
