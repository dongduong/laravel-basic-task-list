<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    /**
     * Show Contact page index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('contact');
    }
}
