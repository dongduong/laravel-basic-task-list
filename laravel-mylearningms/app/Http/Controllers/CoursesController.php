<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CoursesController extends Controller
{
    
    public function show($course_slug)
    {
    	$course = Course::where('slug', $course_slug)->firstOrFail();
    	return view('course', compact('course'));
    }
}
