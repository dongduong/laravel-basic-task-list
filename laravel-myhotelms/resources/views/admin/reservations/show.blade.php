@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reservation.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.id') }}
                        </th>
                        <td>
                            {{ $reservation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.guest') }}
                        </th>
                        <td>
                            {{ $reservation->guest->last_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.room') }}
                        </th>
                        <td>
                            {{ $reservation->room->room_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.check_in_date') }}
                        </th>
                        <td>
                            {{ $reservation->check_in_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.check_out_date') }}
                        </th>
                        <td>
                            {{ $reservation->check_out_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.adults') }}
                        </th>
                        <td>
                            {{ $reservation->adults }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.children') }}
                        </th>
                        <td>
                            {{ $reservation->children }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.additional_information') }}
                        </th>
                        <td>
                            {{ $reservation->additional_information }}
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