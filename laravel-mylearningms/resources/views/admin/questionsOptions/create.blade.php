@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.questionsOption.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.questions-options.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('question_id') ? 'has-error' : '' }}">
                <label for="question">{{ trans('cruds.questionsOption.fields.question') }}</label>
                <select name="question_id" id="question" class="form-control select2">
                    @foreach($questions as $id => $question)
                        <option value="{{ $id }}" {{ (isset($questionsOption) && $questionsOption->question ? $questionsOption->question->id : old('question_id')) == $id ? 'selected' : '' }}>{{ $question }}</option>
                    @endforeach
                </select>
                @if($errors->has('question_id'))
                    <p class="help-block">
                        {{ $errors->first('question_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('option_text') ? 'has-error' : '' }}">
                <label for="option_text">{{ trans('cruds.questionsOption.fields.option_text') }}*</label>
                <textarea id="option_text" name="option_text" class="form-control " required>{{ old('option_text', isset($questionsOption) ? $questionsOption->option_text : '') }}</textarea>
                @if($errors->has('option_text'))
                    <p class="help-block">
                        {{ $errors->first('option_text') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.questionsOption.fields.option_text_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('correct') ? 'has-error' : '' }}">
                <label for="correct">{{ trans('cruds.questionsOption.fields.correct') }}</label>
                <input name="correct" type="hidden" value="0">
                <input value="1" type="checkbox" id="correct" name="correct" {{ old('correct', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('correct'))
                    <p class="help-block">
                        {{ $errors->first('correct') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.questionsOption.fields.correct_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection