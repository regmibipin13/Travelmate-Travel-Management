@extends('layouts.app')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img class="w-100" src="{{ $slider->image->url }}" alt="{{ $slider->header }}"
                            style="height: 700px;object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-white text-uppercase mb-md-3">{{ $slider->header }}</h4>
                                <h1 class="display-3 text-white mb-md-4">{{ $slider->text }}</h1>
                                <a href="{{ $slider->button_link }}"
                                    class="btn btn-primary py-md-3 px-md-5 mt-2">{{ $slider->button_text }}</a>
                            </div>
                        </div>
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
    <!-- Carousel End -->


    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h2 class="text-primary text-uppercase" style="letter-spacing:5px;">Destination</h2>
                <h1>Our Top Destination</h1>
            </div>
            <div class="row">
                @foreach ($destinations as $destination)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="{{ $destination->image->url }}" alt="{{ $destination->name }}"
                                style="height: 250px;">
                            <a class="destination-overlay text-white text-decoration-none"
                                href="{{ route('frontend.packages') }}?destination_id={{ $destination->id }}">
                                <h5 class="text-white">{{ $destination->name }}</h5>
                                <span>{{ $destination->total_places }} Places</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Destination Start -->


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h2 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h2>
                <h1>Tours & Travel Services</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Trekking</h5>
                        <p class="m-0">Embark on your trekking adventure with a well-planned itinerary,
                            appropriate gear, and a reliable guide to navigate through the challenges of the terrain,
                            while embracing the beauty of nature and enjoying the experience to the fullest</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Ticket Booking</h5>
                        <p class="m-0">Save time and effort by booking your plane or bus tickets online in advance
                            and choose from a range of options to suit your budget and travel preferences, ensuring a smooth
                            and stress-free journey ahead."</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Thrill-seeking Adventures Booking</h5>
                        <p class="m-0">Get ready to push your limits and test your courage with adrenaline-pumping
                            activities like
                            bungee jumping, and rafting, as you soar through the skies, dive into the depths,
                            and ride the rapids of nature's most stunning landscapes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h2 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h2>
                <h1>Tripways Tour and Trek Packages</h1>
            </div>
            <div class="row">
                @foreach ($packages as $package)
                    @include('frontend.partials.package')
                @endforeach

            </div>
        </div>
    </div>
    <!-- Packages End -->


    {{-- <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Blog</h6>
                <h1>Latest From Our Blog</h1>
            </div>
            <div class="row pb-3">
                @foreach ($blogs as $blog)
                    @include('frontend.partials.blog')
                @endforeach

            </div>
        </div>
    </div>
    <!-- Blog End --> --}}
@endsection
