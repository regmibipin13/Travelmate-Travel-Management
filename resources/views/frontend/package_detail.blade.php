@extends('layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($package->slider_images as $key => $image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img class="w-100" src="{{ $image->url }}" alt="{{ $package->package_title }}">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="container">
            <div class="row align-items-center justify-content flex-wrap">
                <div class="col-md-3 border-right d-flex align-items-center package-details-section ">
                    <div class="icon">
                        <i class="fa fa-tag"></i>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="detail">
                        <h5>Price</h3>
                            <span>Rs.{{ $package->total_price }}</span>
                    </div>
                </div>
                <div class="col-md-3 border-right d-flex align-items-center package-details-section ">
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="detail">
                        <h5>Max People</h5>
                        <span>Max {{ $package->max_people }} people</span>
                    </div>
                </div>
                <div class="col-md-3 border-right d-flex align-items-center package-details-section ">
                    <div class="icon">
                        <i class="fa fa-clock"></i>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="detail">
                        <h5>Duration</h5>
                        <span>{{ $package->duration }} days</span>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-center package-details-section ">
                    <div class="icon">
                        <i class="fa fa-child"></i>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="detail">
                        <h5>Min Age</h5>
                        <span>{{ $package->min_age }}+ years</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid py-4 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8 border-right">
                    @foreach (App\Models\Package::$descriptions as $desc)
                        @if ($package->$desc !== null)
                            <div class="overview">
                                <h3>{{ str_replace('_', ' ', ucfirst($desc)) }}</h3>
                                <p>
                                    {!! $package->$desc !!}
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4 booking-panel">
                    <div class="card">
                        <div class="card-header">
                            Booking Panel
                        </div>
                        <div class="card-body">
                            <booking-panel :package="{{ $package }}">

                            </booking-panel>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @vite(['resources/js/app.js'])
@endsection
