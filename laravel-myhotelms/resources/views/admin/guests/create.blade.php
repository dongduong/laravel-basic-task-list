@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.guest.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.guests.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="first_name">{{ trans('cruds.guest.fields.first_name') }}*</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($guest) ? $guest->first_name : '') }}" required>
                @if($errors->has('first_name'))
                    <p class="help-block">
                        {{ $errors->first('first_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.guest.fields.first_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                <label for="last_name">{{ trans('cruds.guest.fields.last_name') }}*</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', isset($guest) ? $guest->last_name : '') }}" required>
                @if($errors->has('last_name'))
                    <p class="help-block">
                        {{ $errors->first('last_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.guest.fields.last_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.guest.fields.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($guest) ? $guest->address : '') }}" required>
                @if($errors->has('address'))
                    <p class="help-block">
                        {{ $errors->first('address') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.guest.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.guest.fields.email') }}</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($guest) ? $guest->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.guest.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.guest.fields.phone') }}</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($guest) ? $guest->phone : '') }}">
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.guest.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="city">{{ trans('cruds.guest.fields.city') }}</label>
                <input type="text" id="city" name="city" class="form-control" value="{{ old('city', isset($guest) ? $guest->city : '') }}">
                @if($errors->has('city'))
                    <p class="help-block">
                        {{ $errors->first('city') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.guest.fields.city_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                <label for="country">{{ trans('cruds.guest.fields.country') }}</label>
                <input type="text" id="country" name="country" class="form-control" value="{{ old('country', isset($guest) ? $guest->country : '') }}">
                @if($errors->has('country'))
                    <p class="help-block">
                        {{ $errors->first('country') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.guest.fields.country_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection