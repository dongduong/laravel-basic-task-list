<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionsOptionRequest;
use App\Http\Requests\StoreQuestionsOptionRequest;
use App\Http\Requests\UpdateQuestionsOptionRequest;
use App\Question;
use App\QuestionsOption;

class QuestionsOptionsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('questions_option_access'), 403);

        $questionsOptions = QuestionsOption::all();

        return view('admin.questionsOptions.index', compact('questionsOptions'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('questions_option_create'), 403);

        $questions = Question::all()->pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.questionsOptions.create', compact('questions'));
    }

    public function store(StoreQuestionsOptionRequest $request)
    {
        abort_unless(\Gate::allows('questions_option_create'), 403);

        $questionsOption = QuestionsOption::create($request->all());

        return redirect()->route('admin.questions-options.index');
    }

    public function edit(QuestionsOption $questionsOption)
    {
        abort_unless(\Gate::allows('questions_option_edit'), 403);

        $questions = Question::all()->pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questionsOption->load('question');

        return view('admin.questionsOptions.edit', compact('questions', 'questionsOption'));
    }

    public function update(UpdateQuestionsOptionRequest $request, QuestionsOption $questionsOption)
    {
        abort_unless(\Gate::allows('questions_option_edit'), 403);

        $questionsOption->update($request->all());

        return redirect()->route('admin.questions-options.index');
    }

    public function show(QuestionsOption $questionsOption)
    {
        abort_unless(\Gate::allows('questions_option_show'), 403);

        $questionsOption->load('question');

        return view('admin.questionsOptions.show', compact('questionsOption'));
    }

    public function destroy(QuestionsOption $questionsOption)
    {
        abort_unless(\Gate::allows('questions_option_delete'), 403);

        $questionsOption->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionsOptionRequest $request)
    {
        QuestionsOption::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
