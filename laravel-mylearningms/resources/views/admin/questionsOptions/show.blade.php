@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.questionsOption.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.questionsOption.fields.question') }}
                        </th>
                        <td>
                            {{ $questionsOption->question->question ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionsOption.fields.option_text') }}
                        </th>
                        <td>
                            {!! $questionsOption->option_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionsOption.fields.correct') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $questionsOption->correct ? "checked" : "" }}>
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