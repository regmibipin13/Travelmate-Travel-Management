@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Packages</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Packages</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center mb-3 pb-3">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
                        <h1>Pefect Tour and Trek Packages</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('frontend.packages') }}" method="GET">
                        <div class="form-group">
                            <label for="destination">Select Destination</label>
                            <select name="destination_id" id="destination_id" class="form-control">
                                <option value="all">All</option>
                                @foreach (App\Models\Destination::all() as $destination)
                                    <option
                                        value="{{ $destination->id }}"{{ request()->destination_id == $destination->id ? 'selected' : '' }}>
                                        {{ $destination->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">

            <div class="row">
                @if (count($packages))
                    @foreach ($packages as $package)
                        @include('frontend.partials.package')
                    @endforeach
                @else
                    <div class="col-md-12">
                        <h5>No Packages Available</h5>
                    </div>
                @endif
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    {{ $packages->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Packages End -->
@endsection
