@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.packagePlan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.package-plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.packagePlan.fields.id') }}
                        </th>
                        <td>
                            {{ $packagePlan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packagePlan.fields.package') }}
                        </th>
                        <td>
                            {{ $packagePlan->package->package_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packagePlan.fields.plan_title') }}
                        </th>
                        <td>
                            {{ $packagePlan->plan_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.packagePlan.fields.description') }}
                        </th>
                        <td>
                            {!! $packagePlan->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.package-plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection