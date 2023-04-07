@extends('layouts.admin')
@section('content')
@can('package_plan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.package-plans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.packagePlan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.packagePlan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PackagePlan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.packagePlan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.packagePlan.fields.package') }}
                        </th>
                        <th>
                            {{ trans('cruds.package.fields.total_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.packagePlan.fields.plan_title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packagePlans as $key => $packagePlan)
                        <tr data-entry-id="{{ $packagePlan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $packagePlan->id ?? '' }}
                            </td>
                            <td>
                                {{ $packagePlan->package->package_title ?? '' }}
                            </td>
                            <td>
                                {{ $packagePlan->package->total_price ?? '' }}
                            </td>
                            <td>
                                {{ $packagePlan->plan_title ?? '' }}
                            </td>
                            <td>
                                @can('package_plan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.package-plans.show', $packagePlan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('package_plan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.package-plans.edit', $packagePlan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('package_plan_delete')
                                    <form action="{{ route('admin.package-plans.destroy', $packagePlan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('package_plan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.package-plans.massDestroy') }}",
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
  let table = $('.datatable-PackagePlan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection