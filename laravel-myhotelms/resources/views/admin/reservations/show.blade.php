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
            <a style="margin-top:20px;" class="btn btn-default" href="{{ route('admin.reservations.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
            @switch($reservation->reservation_status->id)
                @case(1)
                    <a style="margin-top:20px;" class="btn btn-info" href="#" data-toggle="modal" data-target="#confirmReservationModal"> Confirm Reservation </a>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmReservationModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                          <form action="{{ route('admin.reservations.confirm', [$reservation->id]) }}" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Reservation Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <p>Are you sure to <b>CONFIRM</b> this reservation?</p>
                                    <p><i> - <b>Confirmation Email</b> will be sent to Guest </i></p>
                                    <p><i> - This reservation status will be changed to </i><span class="badge badge-info">Confirmed</span></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Confirm Reservation">
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    
                    <a style="margin-top:20px;" class="btn btn-warning" href="{{ url()->previous() }}"> Cancel Reservation</a>
                    @break

                @case(2)
                    <form action="{{ route('admin.reservations.confirm', [$reservation->id]) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-primary" value="Check In">
                    </form>
                    <a style="margin-top:20px;" class="btn btn-warning" href="{{ url()->previous() }}"> Cancel </a>
                    @break

                @default
                    <span>Something went wrong, please try again</span>
            @endswitch
        </div>
    </div>
</div>
@endsection