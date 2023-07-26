@can('help_desk_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.help-desks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.helpDesk.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.helpDesk.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userHelpDesks">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.ticket') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.subject') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.helpDesk.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($helpDesks as $key => $helpDesk)
                        <tr data-entry-id="{{ $helpDesk->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $helpDesk->id ?? '' }}
                            </td>
                            <td>
                                {{ $helpDesk->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $helpDesk->ticket ?? '' }}
                            </td>
                            <td>
                                {{ $helpDesk->subject ?? '' }}
                            </td>
                            <td>
                                {{ $helpDesk->description ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\HelpDesk::STATUS_SELECT[$helpDesk->status] ?? '' }}
                            </td>
                            <td>
                                @can('help_desk_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.help-desks.show', $helpDesk->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('help_desk_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.help-desks.edit', $helpDesk->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('help_desk_delete')
                                    <form action="{{ route('admin.help-desks.destroy', $helpDesk->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('help_desk_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.help-desks.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-userHelpDesks:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection