<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionsOptionRequest;
use App\Http\Requests\UpdateQuestionsOptionRequest;
use App\QuestionsOption;

class QuestionsOptionsApiController extends Controller
{
    public function index()
    {
        $questionsOptions = QuestionsOption::all();

        return $questionsOptions;
    }

    public function store(StoreQuestionsOptionRequest $request)
    {
        return QuestionsOption::create($request->all());
    }

    public function update(UpdateQuestionsOptionRequest $request, QuestionsOption $questionsOption)
    {
        return $questionsOption->update($request->all());
    }

    public function show(QuestionsOption $questionsOption)
    {
        return $questionsOption;
    }

    public function destroy(QuestionsOption $questionsOption)
    {
        $questionsOption->delete();

        return response("OK", 200);
    }
}
