<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::where('published', 1)->orderBy('id', 'desc')->get();
        return view('index', compact('courses'));
    }
}
