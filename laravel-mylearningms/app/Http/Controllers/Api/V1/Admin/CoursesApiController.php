<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CoursesApiController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return $courses;
    }

    public function store(StoreCourseRequest $request)
    {
        return Course::create($request->all());
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        return $course->update($request->all());
    }

    public function show(Course $course)
    {
        return $course;
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response("OK", 200);
    }
}
