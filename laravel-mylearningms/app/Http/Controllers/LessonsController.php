<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Question;
use App\QuestionsOption;
use App\TestsResult;

class LessonsController extends Controller
{
    
    public function show($lesson_slug)
    {
    	$lesson = Lesson::where('slug', $lesson_slug)->firstOrFail();

    	$test_result = NULL;
    	if ($lesson->test) {
    		$test_result = TestsResult::where('test_id', $lesson->test->id)
    			->where('user_id', \Auth::id())
    			->first();
    	}
    		
    	$previous_lesson = Lesson::where('course_id', $lesson->course_id)
    		->where('position', '<', $lesson->position)
    		->orderBy('position', 'desc')
    		->first();
    	$next_lesson = Lesson::where('course_id', $lesson->course_id)
    		->where('position', '>', $lesson->position)
    		->orderBy('position', 'asc')
    		->first();
    	return view('lesson', compact('lesson', 'previous_lesson', 'next_lesson', 'test_result'));
    }

    public function test($lesson_slug, Request $request)
    {
    	$lesson = Lesson::where('slug', $lesson_slug)->firstOrFail();
    	$answers = [];
    	$test_score = 0;
    	foreach ($request->get('questions') as $question_id => $answer_id) {
    		/*
    		 * Save the answer
    		 * Check if it is correct and then add point
    		 * Save all test result and show the points
    		 */

    		$question = Question::find($question_id);
    		$correct = QuestionsOption::where('question_id', $question_id)
    			->where('id', $answer_id)
    			->where('correct', 1)->count() > 0;
    		$answers[] = [
    			'question_id' => $question_id,
    			'option_id' => $answer_id,
    			'correct' => $correct
    		];
    		if ($correct) {
    			$test_score += $question->score;
    		}
    	}
    	$test_result = TestsResult::create([
    		'test_id' => $lesson->test->id,
    		'user_id' => \Auth::id(),
    		'test_result' => $test_score
    	]);
    	$test_result->answers()->createMany($answers);
    	return redirect()->route('lessons.show', $lesson_slug)->with('message', 'Test score: ' . $test_score);
    }
}
