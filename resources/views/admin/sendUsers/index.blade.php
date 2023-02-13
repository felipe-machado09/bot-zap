@extends('layouts.admin')
@section('content')
@can('send_user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.send-users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sendUser.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sendUser.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SendUser">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sendUser.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.sendUser.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.sendUser.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.sendUser.fields.active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sendUsers as $key => $sendUser)
                        <tr data-entry-id="{{ $sendUser->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sendUser->id ?? '' }}
                            </td>
                            <td>
                                {{ $sendUser->name ?? '' }}
                            </td>
                            <td>
                                {{ $sendUser->phone ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $sendUser->active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $sendUser->active ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('send_user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.send-users.show', $sendUser->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('send_user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.send-users.edit', $sendUser->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('send_user_delete')
                                    <form action="{{ route('admin.send-users.destroy', $sendUser->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('send_user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.send-users.massDestroy') }}",
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
  let table = $('.datatable-SendUser:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection