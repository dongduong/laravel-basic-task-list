@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3> {{ trans('cruds.findRoom.title') }} </h3>
    </div>

     <div class="card-body">
      <form action="{{ route("admin.find-rooms.index") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="time_from" class="control-label">{{ trans('cruds.findRoom.fields.time_from') }}*</label>
            <input type="text" id="time_from" name="time_from" class="form-control date" placeholder="" required>
            <p class="help-block"></p>
            @if($errors->has('time_from'))
                <p class="help-block">
                    {{ $errors->first('time_from') }}
                </p>
            @endif
        </div>
        <div class="form-group">
            <label for="time_to" class="control-label">{{ trans('cruds.findRoom.fields.time_to') }}*</label>
            <input type="text" id="time_to" name="time_to" class="form-control date" placeholder="" required>
            <p class="help-block"></p>
            @if($errors->has('time_to'))
                <p class="help-block">
                    {{ $errors->first('time_to') }}
                </p>
            @endif
        </div>
        <div>
            <input class="btn btn-info btn-block" type="submit" value="{{ trans('cruds.findRoom.fields.search') }}">
        </div>
      </form>
    </div>
  </div>
@endsection
@section('scripts')
@parent
    

@endsection