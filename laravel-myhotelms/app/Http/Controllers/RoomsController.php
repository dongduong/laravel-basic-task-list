<?php

namespace App\Http\Controllers;

class RoomsController extends Controller
{
    /**
     * Show rooms page index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('rooms');
    }
}
