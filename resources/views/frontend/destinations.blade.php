@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Destination</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/') }}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Destination</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Our Top Destination</h1>
            </div>
            <div class="row">
                @foreach ($destinations as $destination)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="{{ $destination->image->url }}" alt="{{ $destination->name }}"
                                height="250px">
                            <a class="destination-overlay text-white text-decoration-none"
                                href="{{ route('frontend.packages') }}?destination_id={{ $destination->id }}">
                                <h5 class="text-white">{{ $destination->name }}</h5>
                                <span>{{ $destination->total_places }} Places</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $destinations->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Destination Start -->
@endsection
