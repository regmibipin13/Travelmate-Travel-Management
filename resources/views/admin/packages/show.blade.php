@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.package.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.packages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.id') }}
                        </th>
                        <td>
                            {{ $package->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.package_type') }}
                        </th>
                        <td>
                            {{ $package->package_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.destination') }}
                        </th>
                        <td>
                            {{ $package->destination->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.duration') }}
                        </th>
                        <td>
                            {{ $package->duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.max_people') }}
                        </th>
                        <td>
                            {{ $package->max_people }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.total_price') }}
                        </th>
                        <td>
                            {{ $package->total_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.min_age') }}
                        </th>
                        <td>
                            {{ $package->min_age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.package_title') }}
                        </th>
                        <td>
                            {{ $package->package_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.display_image') }}
                        </th>
                        <td>
                            @if($package->display_image)
                                <a href="{{ $package->display_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $package->display_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.slider_images') }}
                        </th>
                        <td>
                            @foreach($package->slider_images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.overview') }}
                        </th>
                        <td>
                            {!! $package->overview !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.trip_highlights') }}
                        </th>
                        <td>
                            {!! $package->trip_highlights !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.trip_difficulties') }}
                        </th>
                        <td>
                            {!! $package->trip_difficulties !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.best_season') }}
                        </th>
                        <td>
                            {!! $package->best_season !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.accommodation') }}
                        </th>
                        <td>
                            {!! $package->accommodation !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.included') }}
                        </th>
                        <td>
                            {!! $package->included !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.package.fields.excluded') }}
                        </th>
                        <td>
                            {!! $package->excluded !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.packages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection