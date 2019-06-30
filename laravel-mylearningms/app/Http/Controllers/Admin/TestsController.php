<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTestRequest;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Lesson;
use App\Question;
use App\Test;

class TestsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('test_access'), 403);

        $tests = Test::all();

        return view('admin.tests.index', compact('tests'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('test_create'), 403);

        $courses = Course::ofTeacher()->get();
        $course_ids = $courses->pluck('id');

        $courses = $courses->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessons = Lesson::whereIn('course_id', $course_ids)->get()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::all()->pluck('question', 'id');

        return view('admin.tests.create', compact('courses', 'lessons', 'questions'));
    }

    public function store(StoreTestRequest $request)
    {
        abort_unless(\Gate::allows('test_create'), 403);

        $test = Test::create($request->all());
        $test->questions()->sync($request->input('questions', []));

        return redirect()->route('admin.tests.index');
    }

    public function edit(Test $test)
    {
        abort_unless(\Gate::allows('test_edit'), 403);

        $courses = Course::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessons = Lesson::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::all()->pluck('question', 'id');

        $test->load('course', 'lesson', 'questions');

        return view('admin.tests.edit', compact('courses', 'lessons', 'questions', 'test'));
    }

    public function update(UpdateTestRequest $request, Test $test)
    {
        abort_unless(\Gate::allows('test_edit'), 403);

        $test->update($request->all());
        $test->questions()->sync($request->input('questions', []));

        return redirect()->route('admin.tests.index');
    }

    public function show(Test $test)
    {
        abort_unless(\Gate::allows('test_show'), 403);

        $test->load('course', 'lesson', 'questions');

        return view('admin.tests.show', compact('test'));
    }

    public function destroy(Test $test)
    {
        abort_unless(\Gate::allows('test_delete'), 403);

        $test->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestRequest $request)
    {
        Test::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
