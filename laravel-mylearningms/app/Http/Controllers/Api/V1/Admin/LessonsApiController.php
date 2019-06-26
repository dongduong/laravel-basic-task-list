<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Lesson;

class LessonsApiController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();

        return $lessons;
    }

    public function store(StoreLessonRequest $request)
    {
        return Lesson::create($request->all());
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        return $lesson->update($request->all());
    }

    public function show(Lesson $lesson)
    {
        return $lesson;
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return response("OK", 200);
    }
}
