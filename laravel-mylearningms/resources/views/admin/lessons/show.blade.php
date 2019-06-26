@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lesson.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.course') }}
                        </th>
                        <td>
                            {{ $lesson->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.title') }}
                        </th>
                        <td>
                            {{ $lesson->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.slug') }}
                        </th>
                        <td>
                            {{ $lesson->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.lesson_image') }}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.short_text') }}
                        </th>
                        <td>
                            {!! $lesson->short_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.full_text') }}
                        </th>
                        <td>
                            {!! $lesson->full_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.position') }}
                        </th>
                        <td>
                            {{ $lesson->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.downloadable_files') }}
                        </th>
                        <td>
                            {{ $lesson->downloadable_files }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.free_lesson') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $lesson->free_lesson ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $lesson->published ? "checked" : "" }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back
            </a>
        </div>
    </div>
</div>
@endsection