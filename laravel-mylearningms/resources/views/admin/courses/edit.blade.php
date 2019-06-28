@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.course.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.courses.update", [$course->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(Auth::user()->isAdmin())
            <div class="form-group {{ $errors->has('teachers') ? 'has-error' : '' }}">
                <label for="teachers">{{ trans('cruds.course.fields.teachers') }}
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="teachers[]" id="teachers" class="form-control select2" multiple="multiple">
                    @foreach($teachers as $id => $teachers)
                        <option value="{{ $id }}" {{ (in_array($id, old('teachers', [])) || isset($course) && $course->teachers->contains($id)) ? 'selected' : '' }}>{{ $teachers }}</option>
                    @endforeach
                </select>
                @if($errors->has('teachers'))
                    <p class="help-block">
                        {{ $errors->first('teachers') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.course.fields.teachers_helper') }}
                </p>
            </div>
            @endif
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.course.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($course) ? $course->title : '') }}" required>
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.course.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="slug">{{ trans('cruds.course.fields.slug') }}</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', isset($course) ? $course->slug : '') }}">
                @if($errors->has('slug'))
                    <p class="help-block">
                        {{ $errors->first('slug') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.course.fields.slug_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.course.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ckeditor">{{ old('description', isset($course) ? $course->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.course.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('cruds.course.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($course) ? $course->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <p class="help-block">
                        {{ $errors->first('price') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.course.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('course_image') ? 'has-error' : '' }}">
                <label for="course_image">{{ trans('cruds.course.fields.course_image') }}</label>
                <div class="needsclick dropzone" id="course_image-dropzone">

                </div>
                @if($errors->has('course_image'))
                    <p class="help-block">
                        {{ $errors->first('course_image') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.course.fields.course_image_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                <label for="start_date">{{ trans('cruds.course.fields.start_date') }}</label>
                <input type="text" id="start_date" name="start_date" class="form-control date" value="{{ old('start_date', isset($course) ? $course->start_date : '') }}">
                @if($errors->has('start_date'))
                    <p class="help-block">
                        {{ $errors->first('start_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.course.fields.start_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">
                <label for="published">{{ trans('cruds.course.fields.published') }}</label>
                <input name="published" type="hidden" value="0">
                <input value="1" type="checkbox" id="published" name="published" {{ (isset($course) && $course->published) || old('published', 0) === 1 ? 'checked' : '' }}>
                @if($errors->has('published'))
                    <p class="help-block">
                        {{ $errors->first('published') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.course.fields.published_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.courseImageDropzone = {
    url: '{{ route('admin.courses.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="course_image"]').remove()
      $('form').append('<input type="hidden" name="course_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="course_image"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($course) && $course->course_image)
      var file = {!! json_encode($course->course_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="course_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop