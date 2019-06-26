@extends('layouts.admin')
@section('content')
@can('test_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tests.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.test.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.test.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.test.fields.course') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.lesson') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.questions') }}
                        </th>
                        <th>
                            {{ trans('cruds.test.fields.published') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tests as $key => $test)
                        <tr data-entry-id="{{ $test->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $test->course->title ?? '' }}
                            </td>
                            <td>
                                {{ $test->lesson->title ?? '' }}
                            </td>
                            <td>
                                {{ $test->title ?? '' }}
                            </td>
                            <td>
                                @foreach($test->questions as $key => $item)
                                    <span class="badge badge-info">{{ $item->question }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $test->published ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                @can('test_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tests.show', $test->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('test_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tests.edit', $test->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('test_delete')
                                    <form action="{{ route('admin.tests.destroy', $test->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.tests.massDestroy') }}",
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
@can('test_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection