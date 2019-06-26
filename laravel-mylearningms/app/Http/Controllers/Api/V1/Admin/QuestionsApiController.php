<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Question;

class QuestionsApiController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return $questions;
    }

    public function store(StoreQuestionRequest $request)
    {
        return Question::create($request->all());
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        return $question->update($request->all());
    }

    public function show(Question $question)
    {
        return $question;
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return response("OK", 200);
    }
}
