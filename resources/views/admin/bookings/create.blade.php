@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.booking.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bookings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="package_id">{{ trans('cruds.booking.fields.package') }}</label>
                <select class="form-control select2 {{ $errors->has('package') ? 'is-invalid' : '' }}" name="package_id" id="package_id" required>
                    @foreach($packages as $id => $entry)
                        <option value="{{ $id }}" {{ old('package_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('package'))
                    <div class="invalid-feedback">
                        {{ $errors->first('package') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.package_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_name">{{ trans('cruds.booking.fields.customer_name') }}</label>
                <input class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', '') }}" required>
                @if($errors->has('customer_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.customer_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_phone">{{ trans('cruds.booking.fields.customer_phone') }}</label>
                <input class="form-control {{ $errors->has('customer_phone') ? 'is-invalid' : '' }}" type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone', '') }}" required>
                @if($errors->has('customer_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.customer_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from_date">{{ trans('cruds.booking.fields.from_date') }}</label>
                <input class="form-control date {{ $errors->has('from_date') ? 'is-invalid' : '' }}" type="text" name="from_date" id="from_date" value="{{ old('from_date') }}" required>
                @if($errors->has('from_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.from_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_people">{{ trans('cruds.booking.fields.total_people') }}</label>
                <input class="form-control {{ $errors->has('total_people') ? 'is-invalid' : '' }}" type="number" name="total_people" id="total_people" value="{{ old('total_people', '') }}" step="1" required>
                @if($errors->has('total_people'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_people') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.total_people_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_price">{{ trans('cruds.booking.fields.total_price') }}</label>
                <input class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" type="number" name="total_price" id="total_price" value="{{ old('total_price', '') }}" step="0.01" required>
                @if($errors->has('total_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.total_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.booking.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Booking::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'pending') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection