@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.roomType.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.roomType.fields.id') }}
                        </th>
                        <td>
                            {{ $roomType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomType.fields.name') }}
                        </th>
                        <td>
                            {{ $roomType->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection