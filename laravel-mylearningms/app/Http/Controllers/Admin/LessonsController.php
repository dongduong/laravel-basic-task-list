<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLessonRequest;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Lesson;

class LessonsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_unless(\Gate::allows('lesson_access'), 403);

        $lessons = Lesson::whereIn('course_id', Course::ofTeacher()->pluck('id'));
        if ($request->input('course_id')) {
            $lessons = $lessons->where('course_id', $request->input('course_id'))->get();
        } else {
            $lessons = $lessons->get();
        }

        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lesson_create'), 403);

        $courses = Course::ofTeacher()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lessons.create', compact('courses'));
    }

    public function store(StoreLessonRequest $request)
    {
        abort_unless(\Gate::allows('lesson_create'), 403);

        $lesson = Lesson::create($request->all() + ['position' => Lesson::where('course_id', $request->course_id)->max('position') + 1] );

        if ($request->input('lesson_image', false)) {
            $lesson->addMedia(storage_path('tmp/uploads/' . $request->input('lesson_image')))->toMediaCollection('lesson_image');
        }

        foreach ($request->input('downloadable_files', []) as $file) {
            $lesson->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('downloadable_files');
        }

        return redirect()->route('admin.lessons.index', ['course_id' => $request->course_id]);
    }

    public function edit(Lesson $lesson)
    {
        abort_unless(\Gate::allows('lesson_edit'), 403);

        $courses = Course::ofTeacher()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lesson->load('course');

        return view('admin.lessons.edit', compact('courses', 'lesson'));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        abort_unless(\Gate::allows('lesson_edit'), 403);

        $lesson->update($request->all());

        if ($request->input('lesson_image', false)) {
            if (!$lesson->lesson_image || $request->input('lesson_image') !== $lesson->lesson_image->file_name) {
                $lesson->addMedia(storage_path('tmp/uploads/' . $request->input('lesson_image')))->toMediaCollection('lesson_image');
            }
        } elseif ($lesson->lesson_image) {
            $lesson->lesson_image->delete();
        }

        if (count($lesson->downloadable_files) > 0) {
            foreach ($lesson->downloadable_files as $media) {
                if (!in_array($media->file_name, $request->input('downloadable_files', []))) {
                    $media->delete();
                }
            }
        }

        $media = $lesson->downloadable_files->pluck('file_name')->toArray();

        foreach ($request->input('downloadable_files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $lesson->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('downloadable_files');
            }
        }

        return redirect()->route('admin.lessons.index', ['course_id' => $request->course_id]);
    }

    public function show(Lesson $lesson)
    {
        abort_unless(\Gate::allows('lesson_show'), 403);

        $lesson->load('course');

        return view('admin.lessons.show', compact('lesson'));
    }

    public function destroy(Lesson $lesson)
    {
        abort_unless(\Gate::allows('lesson_delete'), 403);

        $lesson->delete();

        return back();
    }

    public function massDestroy(MassDestroyLessonRequest $request)
    {
        Lesson::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
