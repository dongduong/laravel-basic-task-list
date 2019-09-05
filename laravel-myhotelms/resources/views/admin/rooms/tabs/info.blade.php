<table class="table table-bordered table-striped">
    <tbody>
        <tr>
            <th>
                {{ trans('cruds.room.fields.id') }}
            </th>
            <td>
                {{ $room->id }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.room.fields.room_number') }}
            </th>
            <td>
                {{ $room->room_number }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.room.fields.floor') }}
            </th>
            <td>
                {{ $room->floor }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.room.fields.slug') }}
            </th>
            <td>
                {{ $room->slug }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.room.fields.room_type') }}
            </th>
            <td>
                {{ $room->room_type->name ?? '' }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.room.fields.room_status') }}
            </th>
            <td>
                <span class="badge {{ $room->room_status->getClassSpanName() }}">{{ $room->room_status->name ?? '' }}</span>
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.room.fields.description') }}
            </th>
            <td>
                {!! $room->description !!}
            </td>
        </tr>
    </tbody>
</table>