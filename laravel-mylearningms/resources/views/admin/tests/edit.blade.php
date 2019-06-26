@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.test.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tests.update", [$test->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('course_id') ? 'has-error' : '' }}">
                <label for="course">{{ trans('cruds.test.fields.course') }}</label>
                <select name="course_id" id="course" class="form-control select2">
                    @foreach($courses as $id => $course)
                        <option value="{{ $id }}" {{ (isset($test) && $test->course ? $test->course->id : old('course_id')) == $id ? 'selected' : '' }}>{{ $course }}</option>
                    @endforeach
                </select>
                @if($errors->has('course_id'))
                    <p class="help-block">
                        {{ $errors->first('course_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('lesson_id') ? 'has-error' : '' }}">
                <label for="lesson">{{ trans('cruds.test.fields.lesson') }}</label>
                <select name="lesson_id" id="lesson" class="form-control select2">
                    @foreach($lessons as $id => $lesson)
                        <option value="{{ $id }}" {{ (isset($test) && $test->lesson ? $test->lesson->id : old('lesson_id')) == $id ? 'selected' : '' }}>{{ $lesson }}</option>
                    @endforeach
                </select>
                @if($errors->has('lesson_id'))
                    <p class="help-block">
                        {{ $errors->first('lesson_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.test.fields.title') }}</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($test) ? $test->title : '') }}">
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.test.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.test.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ckeditor">{{ old('description', isset($test) ? $test->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.test.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('questions') ? 'has-error' : '' }}">
                <label for="questions">{{ trans('cruds.test.fields.questions') }}
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="questions[]" id="questions" class="form-control select2" multiple="multiple">
                    @foreach($questions as $id => $questions)
                        <option value="{{ $id }}" {{ (in_array($id, old('questions', [])) || isset($test) && $test->questions->contains($id)) ? 'selected' : '' }}>{{ $questions }}</option>
                    @endforeach
                </select>
                @if($errors->has('questions'))
                    <p class="help-block">
                        {{ $errors->first('questions') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.test.fields.questions_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">
                <label for="published">{{ trans('cruds.test.fields.published') }}</label>
                <input name="published" type="hidden" value="0">
                <input value="1" type="checkbox" id="published" name="published" {{ (isset($test) && $test->published) || old('published', 0) === 1 ? 'checked' : '' }}>
                @if($errors->has('published'))
                    <p class="help-block">
                        {{ $errors->first('published') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.test.fields.published_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection