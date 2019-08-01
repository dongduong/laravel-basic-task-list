@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.room.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.id') }}
                        </th>
                        <td>
                            {{ $room->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.room_number') }}
                        </th>
                        <td>
                            {{ $room->room_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.floor') }}
                        </th>
                        <td>
                            {{ $room->floor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.slug') }}
                        </th>
                        <td>
                            {{ $room->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.room_type') }}
                        </th>
                        <td>
                            {{ $room->room_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.room_status') }}
                        </th>
                        <td>
                            {{ $room->room_status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.room.fields.description') }}
                        </th>
                        <td>
                            {!! $room->description !!}
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