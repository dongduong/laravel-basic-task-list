@extends('layouts.admin')
@section('content')
@can('lesson_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.lessons.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.lesson.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.lesson.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.course') }}
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.lesson_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.short_text') }}
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.position') }}
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.downloadable_files') }}
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.free_lesson') }}
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.published') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lessons as $key => $lesson)
                        <tr data-entry-id="{{ $lesson->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $lesson->course->title ?? '' }}
                            </td>
                            <td>
                                {{ $lesson->title ?? '' }}
                            </td>
                            <td>
                                {{ $lesson->slug ?? '' }}
                            </td>
                            <td>
                                @if($lesson->lesson_image)
                                    <a href="{{ $lesson->lesson_image->getUrl() }}" target="_blank">
                                        <img src="{{ $lesson->lesson_image->getUrl() }}" width="150px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $lesson->short_text ?? '' }}
                            </td>
                            <td>
                                {{ $lesson->position ?? '' }}
                            </td>
                            <td>
                                @if($lesson->downloadable_files)
                                    @foreach($lesson->downloadable_files as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{ $lesson->free_lesson ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                {{ $lesson->published ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                @can('lesson_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.lessons.show', $lesson->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lesson_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.lessons.edit', $lesson->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lesson_delete')
                                    <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.lessons.massDestroy') }}",
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
@can('lesson_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection