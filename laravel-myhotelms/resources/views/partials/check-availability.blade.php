<form action="{{ route("find-rooms.find") }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
      <label for="time_from">Check In</label>
      <div class="field-icon-wrap">
        <div class="icon"><span class="icon-calendar"></span></div>
        <input type="text" id="checkin_date" name="checkin_date" class="form-control" value="{{ (isset($time_from) && !is_null($time_from)) ? $time_from : '' }}" placeholder="" required>
      </div>
    </div>
    <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
      <label for="time_to">Check Out</label>
      <div class="field-icon-wrap">
        <div class="icon"><span class="icon-calendar"></span></div>
        <input type="text" id="checkout_date" name="checkout_date" class="form-control" value="{{ (isset($time_to) && !is_null($time_to)) ? $time_to : '' }}" placeholder="" required>
      </div>
    </div>
    <!-- <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
      <div class="row">
        <div class="col-md-6 mb-3 mb-md-0">
          <label for="checkin">Adults</label>
          <div class="field-icon-wrap">
            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
            <select name="" id="" class="form-control">
              <option value="">1</option>
              <option value="">2</option>
              <option value="">3</option>
              <option value="">4+</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-3 mb-md-0">
          <label for="checkin">Children</label>
          <div class="field-icon-wrap">
            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
            <select name="" id="" class="form-control">
              <option value="">1</option>
              <option value="">2</option>
              <option value="">3</option>
              <option value="">4+</option>
            </select>
          </div>
        </div>
      </div>
    </div> -->
    <div class="col-md-6 col-lg-3 align-self-end">
      <button class="btn btn-primary  " type="submit" value="{{ trans('cruds.findRoom.fields.search') }}">Check Availabilty</button>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  @if (isset($rooms) && (is_null($rooms) || $rooms->count() == 0 ))
    <div class="alert alert-info">
        <label>@lang('cruds.findRoom.no_rooms_found')</label>
    </div>
  @endif
  @if (isset($rooms) && !is_null($rooms) && $rooms->count() != 0)
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
                            <a href="{{ route('book-rooms.index',
                            ['room_id' => $room->id,'check_in_date' => $time_from, 'check_out_date' => $time_to]) }}">
                                {!!trans('cruds.findRoom.book_room')!!}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
  @endif
</form>
@section('scripts')
@parent
@endsection
