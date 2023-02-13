@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.newsMirror.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-NewsMirror">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.newsMirror.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsMirror.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsMirror.fields.link') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsMirror.fields.guid') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsMirror.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsMirror.fields.author') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsMirror.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsMirror.fields.pub_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newsMirrors as $key => $newsMirror)
                        <tr data-entry-id="{{ $newsMirror->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $newsMirror->id ?? '' }}
                            </td>
                            <td>
                                {{ $newsMirror->title ?? '' }}
                            </td>
                            <td>
                                {{ $newsMirror->link ?? '' }}
                            </td>
                            <td>
                                {{ $newsMirror->guid ?? '' }}
                            </td>
                            <td>
                                {{ $newsMirror->description ?? '' }}
                            </td>
                            <td>
                                {{ $newsMirror->author ?? '' }}
                            </td>
                            <td>
                                {{ $newsMirror->category ?? '' }}
                            </td>
                            <td>
                                {{ $newsMirror->pub_date ?? '' }}
                            </td>
                            <td>
                                @can('news_mirror_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.news-mirrors.show', $newsMirror->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan


                                @can('news_mirror_delete')
                                    <form action="{{ route('admin.news-mirrors.destroy', $newsMirror->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('news_mirror_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.news-mirrors.massDestroy') }}",
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
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-NewsMirror:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection