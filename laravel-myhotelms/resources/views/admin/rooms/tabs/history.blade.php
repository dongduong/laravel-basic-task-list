@if (isset($room_histories) && !is_null($room_histories) && $room_histories->count() != 0)
<div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover datatable">
        <thead>
            <tr>
                <th>
                    {{ trans('cruds.roomHistory.fields.reservation') }}
                </th>
                <th>
                    {{ trans('cruds.roomHistory.fields.status') }}
                </th>
                <th>
                    {{ trans('cruds.roomHistory.fields.when') }}
                </th>
                <th>
                    {{ trans('cruds.roomHistory.fields.note') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($room_histories as $key => $history)
                <tr data-entry-id="{{ $history->id }}">
                    <td>
                        <a href="{{ route('admin.reservations.show', $history->reservation->id) }}" >{{ $history->reservation->code ?? '' }}
                    </td>
                    <td>
                        <span class="badge {{ $history->room_status->getClassSpanName() }}">{{ $history->room_status->name ?? '' }}</span>
                    </td>
                    <td>
                        {{ $history->created_at ?? '' }}
                    </td>
                    <td>
                        {{ $history->note ?? '' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif