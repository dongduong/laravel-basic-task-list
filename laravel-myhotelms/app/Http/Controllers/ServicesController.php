<?php

namespace App\Http\Controllers;

class ServicesController extends Controller
{
    /**
     * Show services page index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('services');
    }
}
