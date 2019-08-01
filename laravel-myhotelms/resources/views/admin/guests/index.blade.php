@extends('layouts.admin')
@section('content')
@can('guest_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.guests.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.guest.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.guest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.guest.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.guest.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.guest.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.guest.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.guest.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.guest.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.guest.fields.country') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guests as $key => $guest)
                        <tr data-entry-id="{{ $guest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $guest->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $guest->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $guest->address ?? '' }}
                            </td>
                            <td>
                                {{ $guest->email ?? '' }}
                            </td>
                            <td>
                                {{ $guest->phone ?? '' }}
                            </td>
                            <td>
                                {{ $guest->city ?? '' }}
                            </td>
                            <td>
                                {{ $guest->country ?? '' }}
                            </td>
                            <td>
                                @can('guest_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.guests.show', $guest->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('guest_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.guests.edit', $guest->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('guest_delete')
                                    <form action="{{ route('admin.guests.destroy', $guest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.guests.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
@can('guest_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection