<?php

namespace App\Http\Controllers;

class BlogController extends Controller
{
    /**
     * Show Blog page index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('blog');
    }
}
