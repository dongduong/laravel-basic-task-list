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
            <input type="text" id="time_from" name="time_from" class="form-control date datetimepicker" placeholder="" required>
            <p class="help-block"></p>
            @if($errors->has('time_from'))
                <p class="help-block">
                    {{ $errors->first('time_from') }}
                </p>
            @endif
        </div>
        <div class="form-group">
            <label for="time_to" class="control-label">{{ trans('cruds.findRoom.fields.time_to') }}*</label>
            <input type="text" id="time_to" name="time_to" class="form-control date datetimepicker" placeholder="" required>
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
        @if (isset($rooms) && is_null($rooms))
            <div class="form-group" style="text-align: center">
                <label>@lang('cruds.findRoom.no_rooms_found')</label>
            </div>
        @endif
        @if (!is_null($rooms))
          <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th/></th>
                    <th>@lang('cruds.findRoom.fields.room-number')</th>
                    <th>@lang('cruds.findRoom.fields.floor')</th>
                    <th>@lang('cruds.findRoom.fields.type')</th>
                    <th>@lang('cruds.findRoom.fields.description')</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr data-entry-id="{{ $room->id }}">
                            <td></td>
                            <td field-key='room_number'>{{ $room->room_number }}</td>
                            <td field-key='floor'>{{ $room->floor }}</td>
                            <td field-key='type'>{{ $room->room_type->name }}</td>
                            <td field-key='description'>{!! $room->description !!}</td>
                            <td>
                                @can('reservation_create')
                                    <button class="btn btn-danger">
                                        <a style="color: #ffffff;" href="{{ route('admin.reservations.create',
                                        ['room_id' => $room->id,'check_in_date' => $time_from, 'check_out_date' => $time_to]) }}">
                                            {!!trans('cruds.findRoom.book_room')!!}</a>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        @endif
      </form>
    </div>
  </div>
@endsection
@section('scripts')
@parent
    <script>
        $('.datetimepicker').datetimepicker({
            format: "DD-MM-YYYY"
        });
    </script>
@endsection