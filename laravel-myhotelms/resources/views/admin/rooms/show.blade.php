@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" id="room-tabs" >
        <li class="nav-item">
          <a class="nav-link active" href="#info" role="tab" aria-controls="info" aria-selected="true">{{ trans('global.show') }} {{ trans('cruds.room.title') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#history" role="tab" aria-controls="history" aria-selected="false">{{ trans('cruds.roomHistory.title') }}</a>
        </li>
      </ul>
    </div>

    <div class="card-body">
        <div class="tab-content mt-3">
            <div class="tab-pane active" id="info" role="tabpanel">
                @include('admin.rooms.tabs.info')
            </div>
            <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
                @include('admin.rooms.tabs.history')
            </div>
        </div>
            
        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
            {{ trans('global.back_to_list') }}
        </a>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$('#room-tabs a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
@endsection