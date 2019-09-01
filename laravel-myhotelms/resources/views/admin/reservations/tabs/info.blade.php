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
                <a href="{{ route('admin.guests.show', $reservation->guest_id) }}" >{{ $reservation->guest->fullName() ?? '' }}</a>
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
        <tr>
            <th>
                {{ trans('cruds.reservation.fields.editing_user') }}
            </th>
            <td>
                {{ $reservation->editing_user->name ?? '' }}
            </td>
        </tr>
    </tbody>
</table>