<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\User;

class CoursesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('course_access'), 403);

        $courses = Course::all();

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('course_create'), 403);

        $teachers = User::all()->pluck('name', 'id');

        return view('admin.courses.create', compact('teachers'));
    }

    public function store(StoreCourseRequest $request)
    {
        abort_unless(\Gate::allows('course_create'), 403);

        $course = Course::create($request->all());
        $course->teachers()->sync($request->input('teachers', []));

        if ($request->input('course_image', false)) {
            $course->addMedia(storage_path('tmp/uploads/' . $request->input('course_image')))->toMediaCollection('course_image');
        }

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course)
    {
        abort_unless(\Gate::allows('course_edit'), 403);

        $teachers = User::all()->pluck('name', 'id');

        $course->load('teachers');

        return view('admin.courses.edit', compact('teachers', 'course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        abort_unless(\Gate::allows('course_edit'), 403);

        $course->update($request->all());
        $course->teachers()->sync($request->input('teachers', []));

        if ($request->input('course_image', false)) {
            if (!$course->course_image || $request->input('course_image') !== $course->course_image->file_name) {
                $course->addMedia(storage_path('tmp/uploads/' . $request->input('course_image')))->toMediaCollection('course_image');
            }
        } elseif ($course->course_image) {
            $course->course_image->delete();
        }

        return redirect()->route('admin.courses.index');
    }

    public function show(Course $course)
    {
        abort_unless(\Gate::allows('course_show'), 403);

        $course->load('teachers');

        return view('admin.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_unless(\Gate::allows('course_delete'), 403);

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
