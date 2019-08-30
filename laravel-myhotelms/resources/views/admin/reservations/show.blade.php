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
                            {{ trans('cruds.reservation.fields.code') }}
                        </th>
                        <td>
                            {{ $reservation->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.status') }}
                        </th>
                        <td>
                            <span class="badge {{ $reservation->reservation_status->getClassSpanName() }}">{{ $reservation->reservation_status->name ?? '' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.guest') }}
                        </th>
                        <td>
                            {{ $reservation->guest->fullName() ?? '' }}
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
            @switch($reservation->reservation_status->id)
                @case(1)
                    <form action="{{ route('admin.reservations.confirm', [$reservation->id]) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-info" value="Confirm">
                    </form>
                    <a style="margin-top:20px;" class="btn btn-warning" href="{{ url()->previous() }}"> Cancel Reservation</a>
                    @break

                @case(2)
                    <form action="{{ route('admin.reservations.confirm', [$reservation->id]) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-primary" value="Check In">
                    </form>
                    <a style="margin-top:20px;" class="btn btn-warning" href="{{ url()->previous() }}"> Cancel Reservation </a>
                    @break

                @default
                    <span>Something went wrong, please try again</span>
            @endswitch
        </div>
    </div>
</div>
@endsection