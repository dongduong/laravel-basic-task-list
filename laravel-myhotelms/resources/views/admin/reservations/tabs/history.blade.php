@if (isset($reservation_histories) && !is_null($reservation_histories) && $reservation_histories->count() != 0)
<div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover datatable">
        <thead>
            <tr>
                <th>
                    {{ trans('cruds.reservationHistory.fields.action') }}
                </th>
                <th>
                    {{ trans('cruds.reservationHistory.fields.when') }}
                </th>
                <th>
                    {{ trans('cruds.reservationHistory.fields.who') }}
                </th>
                <th>
                    {{ trans('cruds.reservationHistory.fields.note') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservation_histories as $key => $history)
                <tr data-entry-id="{{ $history->id }}">
                    <td>
                        {{ $history->action ?? '' }}
                    </td>
                    <td>
                        {{ $history->changed_at ?? '' }}
                    </td>
                    <td>
                        {{ $history->edit_user->name ?? '' }}
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