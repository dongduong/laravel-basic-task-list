@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.reservation.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.reservations.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('guest_id') ? 'has-error' : '' }}">
                <label for="guest">{{ trans('cruds.reservation.fields.guest') }}*</label>
                <select name="guest_id" id="guest" class="form-control select2" required>
                    @foreach($guests as $id => $guest)
                        <option value="{{ $id }}" {{ (isset($reservation) && $reservation->guest ? $reservation->guest->id : old('guest_id')) == $id ? 'selected' : '' }}>{{ $guest }}</option>
                    @endforeach
                </select>
                @if($errors->has('guest_id'))
                    <p class="help-block">
                        {{ $errors->first('guest_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('room_id') ? 'has-error' : '' }}">
                <label for="room">{{ trans('cruds.reservation.fields.room') }}*</label>
                <select name="room_id" id="room" class="form-control select2" required>
                    @foreach($rooms as $id => $room)
                        <option value="{{ $id }}" {{ (isset($reservation) && $reservation->room ? $reservation->room->id : old('room_id')) == $id ? 'selected' : '' }}>{{ $room }}</option>
                    @endforeach
                </select>
                @if($errors->has('room_id'))
                    <p class="help-block">
                        {{ $errors->first('room_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('check_in_date') ? 'has-error' : '' }}">
                <label for="check_in_date">{{ trans('cruds.reservation.fields.check_in_date') }}*</label>
                <input type="text" id="check_in_date" name="check_in_date" class="form-control date" value="{{ old('check_in_date', isset($reservation) ? $reservation->check_in_date : '') }}" required>
                @if($errors->has('check_in_date'))
                    <p class="help-block">
                        {{ $errors->first('check_in_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.reservation.fields.check_in_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('check_out_date') ? 'has-error' : '' }}">
                <label for="check_out_date">{{ trans('cruds.reservation.fields.check_out_date') }}*</label>
                <input type="text" id="check_out_date" name="check_out_date" class="form-control date" value="{{ old('check_out_date', isset($reservation) ? $reservation->check_out_date : '') }}" required>
                @if($errors->has('check_out_date'))
                    <p class="help-block">
                        {{ $errors->first('check_out_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.reservation.fields.check_out_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('adults') ? 'has-error' : '' }}">
                <label for="adults">{{ trans('cruds.reservation.fields.adults') }}</label>
                <input type="number" id="adults" name="adults" class="form-control" value="{{ old('adults', isset($reservation) ? $reservation->adults : '') }}" step="1">
                @if($errors->has('adults'))
                    <p class="help-block">
                        {{ $errors->first('adults') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.reservation.fields.adults_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('children') ? 'has-error' : '' }}">
                <label for="children">{{ trans('cruds.reservation.fields.children') }}</label>
                <input type="number" id="children" name="children" class="form-control" value="{{ old('children', isset($reservation) ? $reservation->children : '') }}" step="1">
                @if($errors->has('children'))
                    <p class="help-block">
                        {{ $errors->first('children') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.reservation.fields.children_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('additional_information') ? 'has-error' : '' }}">
                <label for="additional_information">{{ trans('cruds.reservation.fields.additional_information') }}</label>
                <input type="text" id="additional_information" name="additional_information" class="form-control" value="{{ old('additional_information', isset($reservation) ? $reservation->additional_information : '') }}">
                @if($errors->has('additional_information'))
                    <p class="help-block">
                        {{ $errors->first('additional_information') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.reservation.fields.additional_information_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection