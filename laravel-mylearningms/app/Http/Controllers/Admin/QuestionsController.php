<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyQuestionRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Question;

class QuestionsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('question_access'), 403);

        $questions = Question::all();

        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('question_create'), 403);

        return view('admin.questions.create');
    }

    public function store(StoreQuestionRequest $request)
    {
        abort_unless(\Gate::allows('question_create'), 403);

        $question = Question::create($request->all());

        if ($request->input('question_image', false)) {
            $question->addMedia(storage_path('tmp/uploads/' . $request->input('question_image')))->toMediaCollection('question_image');
        }

        return redirect()->route('admin.questions.index');
    }

    public function edit(Question $question)
    {
        abort_unless(\Gate::allows('question_edit'), 403);

        return view('admin.questions.edit', compact('question'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        abort_unless(\Gate::allows('question_edit'), 403);

        $question->update($request->all());

        if ($request->input('question_image', false)) {
            if (!$question->question_image || $request->input('question_image') !== $question->question_image->file_name) {
                $question->addMedia(storage_path('tmp/uploads/' . $request->input('question_image')))->toMediaCollection('question_image');
            }
        } elseif ($question->question_image) {
            $question->question_image->delete();
        }

        return redirect()->route('admin.questions.index');
    }

    public function show(Question $question)
    {
        abort_unless(\Gate::allows('question_show'), 403);

        return view('admin.questions.show', compact('question'));
    }

    public function destroy(Question $question)
    {
        abort_unless(\Gate::allows('question_delete'), 403);

        $question->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionRequest $request)
    {
        Question::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
