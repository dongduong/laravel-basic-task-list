@extends('layouts.admin')
@section('content')
@can('course_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.courses.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.course.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.course.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.course.fields.teachers') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.course_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.published') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $key => $course)
                        <tr data-entry-id="{{ $course->id }}">
                            <td>

                            </td>
                            <td>
                                @foreach($course->teachers as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $course->title ?? '' }}
                            </td>
                            <td>
                                {{ $course->slug ?? '' }}
                            </td>
                            <td>
                                {{ $course->price ?? '' }}
                            </td>
                            <td>
                                @if($course->course_image)
                                    <a href="{{ $course->course_image->getUrl() }}" target="_blank">
                                        <img src="{{ $course->course_image->getUrl() }}" width="150px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $course->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $course->published ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                @can('course_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.courses.show', $course->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('course_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.courses.edit', $course->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('course_delete')
                                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.courses.massDestroy') }}",
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
@can('course_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection