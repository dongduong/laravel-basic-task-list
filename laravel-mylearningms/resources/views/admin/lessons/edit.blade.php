@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.lesson.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.lessons.update", [$lesson->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('course_id') ? 'has-error' : '' }}">
                <label for="course">{{ trans('cruds.lesson.fields.course') }}</label>
                <select name="course_id" id="course" class="form-control select2">
                    @foreach($courses as $id => $course)
                        <option value="{{ $id }}" {{ (isset($lesson) && $lesson->course ? $lesson->course->id : old('course_id')) == $id ? 'selected' : '' }}>{{ $course }}</option>
                    @endforeach
                </select>
                @if($errors->has('course_id'))
                    <p class="help-block">
                        {{ $errors->first('course_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.lesson.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($lesson) ? $lesson->title : '') }}" required>
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lesson.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="slug">{{ trans('cruds.lesson.fields.slug') }}</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', isset($lesson) ? $lesson->slug : '') }}">
                @if($errors->has('slug'))
                    <p class="help-block">
                        {{ $errors->first('slug') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lesson.fields.slug_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('lesson_image') ? 'has-error' : '' }}">
                <label for="lesson_image">{{ trans('cruds.lesson.fields.lesson_image') }}</label>
                <div class="needsclick dropzone" id="lesson_image-dropzone">

                </div>
                @if($errors->has('lesson_image'))
                    <p class="help-block">
                        {{ $errors->first('lesson_image') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lesson.fields.lesson_image_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('short_text') ? 'has-error' : '' }}">
                <label for="short_text">{{ trans('cruds.lesson.fields.short_text') }}</label>
                <textarea id="short_text" name="short_text" class="form-control ">{{ old('short_text', isset($lesson) ? $lesson->short_text : '') }}</textarea>
                @if($errors->has('short_text'))
                    <p class="help-block">
                        {{ $errors->first('short_text') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lesson.fields.short_text_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('full_text') ? 'has-error' : '' }}">
                <label for="full_text">{{ trans('cruds.lesson.fields.full_text') }}</label>
                <textarea id="full_text" name="full_text" class="form-control ckeditor">{{ old('full_text', isset($lesson) ? $lesson->full_text : '') }}</textarea>
                @if($errors->has('full_text'))
                    <p class="help-block">
                        {{ $errors->first('full_text') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lesson.fields.full_text_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('downloadable_files') ? 'has-error' : '' }}">
                <label for="downloadable_files">{{ trans('cruds.lesson.fields.downloadable_files') }}</label>
                <div class="needsclick dropzone" id="downloadable_files-dropzone">

                </div>
                @if($errors->has('downloadable_files'))
                    <p class="help-block">
                        {{ $errors->first('downloadable_files') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lesson.fields.downloadable_files_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('free_lesson') ? 'has-error' : '' }}">
                <label for="free_lesson">{{ trans('cruds.lesson.fields.free_lesson') }}</label>
                <input name="free_lesson" type="hidden" value="0">
                <input value="1" type="checkbox" id="free_lesson" name="free_lesson" {{ (isset($lesson) && $lesson->free_lesson) || old('free_lesson', 0) === 1 ? 'checked' : '' }}>
                @if($errors->has('free_lesson'))
                    <p class="help-block">
                        {{ $errors->first('free_lesson') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lesson.fields.free_lesson_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">
                <label for="published">{{ trans('cruds.lesson.fields.published') }}</label>
                <input name="published" type="hidden" value="0">
                <input value="1" type="checkbox" id="published" name="published" {{ (isset($lesson) && $lesson->published) || old('published', 0) === 1 ? 'checked' : '' }}>
                @if($errors->has('published'))
                    <p class="help-block">
                        {{ $errors->first('published') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lesson.fields.published_helper') }}
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
    Dropzone.options.lessonImageDropzone = {
    url: '{{ route('admin.lessons.storeMedia') }}',
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
      $('form').find('input[name="lesson_image"]').remove()
      $('form').append('<input type="hidden" name="lesson_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="lesson_image"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($lesson) && $lesson->lesson_image)
      var file = {!! json_encode($lesson->lesson_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="lesson_image" value="' + file.file_name + '">')
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
<script>
    var uploadedDownloadableFilesMap = {}
Dropzone.options.downloadableFilesDropzone = {
    url: '{{ route('admin.lessons.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="downloadable_files[]" value="' + response.name + '">')
      uploadedDownloadableFilesMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDownloadableFilesMap[file.name]
      }
      $('form').find('input[name="downloadable_files[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($lesson) && $lesson->downloadable_files)
          var files =
            {!! json_encode($lesson->downloadable_files) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="downloadable_files[]" value="' + file.file_name + '">')
            }
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