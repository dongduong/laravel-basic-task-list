@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.room.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.rooms.update", [$room->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('room_number') ? 'has-error' : '' }}">
                <label for="room_number">{{ trans('cruds.room.fields.room_number') }}*</label>
                <input type="text" id="room_number" name="room_number" class="form-control" value="{{ old('room_number', isset($room) ? $room->room_number : '') }}" required>
                @if($errors->has('room_number'))
                    <p class="help-block">
                        {{ $errors->first('room_number') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.room.fields.room_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('floor') ? 'has-error' : '' }}">
                <label for="floor">{{ trans('cruds.room.fields.floor') }}</label>
                <input type="number" id="floor" name="floor" class="form-control" value="{{ old('floor', isset($room) ? $room->floor : '') }}" step="1">
                @if($errors->has('floor'))
                    <p class="help-block">
                        {{ $errors->first('floor') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.room.fields.floor_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="slug">{{ trans('cruds.room.fields.slug') }}*</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', isset($room) ? $room->slug : '') }}" required>
                @if($errors->has('slug'))
                    <p class="help-block">
                        {{ $errors->first('slug') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.room.fields.slug_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('room_type_id') ? 'has-error' : '' }}">
                <label for="room_type">{{ trans('cruds.room.fields.room_type') }}*</label>
                <select name="room_type_id" id="room_type" class="form-control select2" required>
                    @foreach($room_types as $id => $room_type)
                        <option value="{{ $id }}" {{ (isset($room) && $room->room_type ? $room->room_type->id : old('room_type_id')) == $id ? 'selected' : '' }}>{{ $room_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('room_type_id'))
                    <p class="help-block">
                        {{ $errors->first('room_type_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('room_status_id') ? 'has-error' : '' }}">
                <label for="room_status">{{ trans('cruds.room.fields.room_status') }}</label>
                <select name="room_status_id" id="room_status" class="form-control select2">
                    @foreach($room_statuses as $id => $room_status)
                        <option value="{{ $id }}" {{ (isset($room) && $room->room_status ? $room->room_status->id : old('room_status_id')) == $id ? 'selected' : '' }}>{{ $room_status }}</option>
                    @endforeach
                </select>
                @if($errors->has('room_status_id'))
                    <p class="help-block">
                        {{ $errors->first('room_status_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.room.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ckeditor">{{ old('description', isset($room) ? $room->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.room.fields.description_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection