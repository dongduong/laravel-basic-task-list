<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;

class LessonsController extends Controller
{
    
    public function show($lesson_slug)
    {
    	$lesson = Lesson::where('slug', $lesson_slug)->firstOrFail();
    	$previous_lesson = Lesson::where('course_id', $lesson->course_id)
    		->where('position', '<', $lesson->position)
    		->orderBy('position', 'desc')
    		->first();
    	$next_lesson = Lesson::where('course_id', $lesson->course_id)
    		->where('position', '>', $lesson->position)
    		->orderBy('position', 'asc')
    		->first();
    	return view('lesson', compact('lesson', 'previous_lesson', 'next_lesson'));
    }
}
