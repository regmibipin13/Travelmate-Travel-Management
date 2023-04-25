@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Services</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/') }}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Services</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


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
                        <p class="m-0">Embark on your trekking adventure with a well-planned itinerary, appropriate gear,
                            and a reliable guide to navigate through the challenges of the terrain, while embracing the
                            beauty of nature and enjoying the experience to the fullest.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Ticket Booking</h5>
                        <p class="m-0">Save time and effort by booking your plane or bus tickets online in advance, and
                            choose from a range of options to suit your budget and travel preferences, ensuring a smooth and
                            stress-free journey ahead.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Paragliding</h5>
                        <p class="m-0">Embark on an awe-inspiring adventure as you soar through the skies with the wind
                            in your face, taking in panoramic views of stunning landscapes below. Whether you're a seasoned
                            paraglider or a first-timer, our experienced pilots and top-of-the-line equipment ensure a safe
                            and exhilarating experience that you'll never forget</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                        <h5 class="mb-2">Bunjee Jump</h5>
                        <p class="m-0">Challenge yourself and conquer your fears with an adrenaline-pumping bungee jump,
                            as you take a leap of faith into the unknown and feel the rush of freefalling through the air.
                            Our expert team ensures your safety and provides the necessary equipment, so you can focus on
                            the thrill of the moment and make memories that will last a lifetime</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Rafting</h5>
                        <p class="m-0">Embark on an exhilarating adventure as you navigate through rushing rapids,
                            surrounded by breathtaking scenery and the power of nature. Our experienced guides ensure your
                            safety and provide the necessary equipment, so you can enjoy the thrill of the ride and the
                            beauty of your surroundings without worry. Whitewater rafting is a must-do experience for any
                            thrill-seeker, and we guarantee an unforgettable journey that will leave you feeling alive and
                            invigorated</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2">Cannoying</h5>
                        <p class="m-0">Explore the stunning natural beauty of canyons and waterfalls as you rappel down
                            towering cliffs, slide down chutes, and jump into crystal clear pools. Our expert guides ensure
                            your safety and provide the necessary equipment, so you can enjoy this thrilling adventure with
                            confidence. Canyoning is a unique and exciting way to experience the outdoors and create
                            unforgettable memories that will last a lifetime</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
