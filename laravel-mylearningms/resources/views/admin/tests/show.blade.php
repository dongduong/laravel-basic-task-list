@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.test.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.course') }}
                        </th>
                        <td>
                            {{ $test->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.lesson') }}
                        </th>
                        <td>
                            {{ $test->lesson->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.title') }}
                        </th>
                        <td>
                            {{ $test->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.description') }}
                        </th>
                        <td>
                            {!! $test->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Questions
                        </th>
                        <td>
                            @foreach($test->questions as $id => $questions)
                                <span class="label label-info label-many">{{ $questions->question }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.test.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $test->published ? "checked" : "" }}>
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