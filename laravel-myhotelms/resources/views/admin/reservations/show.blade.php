@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" id="reservation-tabs" >
        <li class="nav-item">
          <a class="nav-link active" href="#info" role="tab" aria-controls="info" aria-selected="true">{{ trans('global.show') }} {{ trans('cruds.reservation.title') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#history" role="tab" aria-controls="history" aria-selected="false">{{ trans('cruds.reservationHistory.title') }}</a>
        </li>
      </ul>
    </div>

    <div class="card-body">
        <div class="tab-content mt-3">
            <div class="tab-pane active" id="info" role="tabpanel">
                @include('admin.reservations.tabs.info')
            </div>
            <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
                @include('admin.reservations.tabs.history')
            </div>
        </div>

        <a style="margin-top:20px;" class="btn btn-default" href="{{ route('admin.reservations.index') }}">
            {{ trans('global.back_to_list') }}
        </a>
        @switch($reservation->reservation_status->id)
            @case(1)
                @include('admin.reservations.medals.confirm')
                
                @include('admin.reservations.medals.cancel')

                @break

            @case(2)
                @include('admin.reservations.medals.checkin')
                @include('admin.reservations.medals.cancel')
                @break

            @case(3)
                @include('admin.reservations.medals.checkout')
                @break

            @default
                <!-- <span>Something went wrong, please try again</span> -->
        @endswitch
    </div>
</div>

@endsection
@section('scripts')
@parent
<script>
$('#reservation-tabs a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
@endsection