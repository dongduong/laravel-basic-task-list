<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    /**
     * Show About page index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('about');
    }
}
