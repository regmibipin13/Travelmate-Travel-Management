<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('site_title', 'Tripways Travels')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    @yield('css')
    @stack('after_styles')
    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>tripwaystnt@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+977 9856073733</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="viber://chat?number=9856038279">
                            <i class="fab fa-viber"></i>
                        </a>
                        <a class="text-primary px-3" href="https://wa.me/9802859900">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="text-primary px-3" href="tel:+977-9856038279">
                            <i class="fa fa-phone"></i>
                        </a>
                        <a class="text-primary px-3" href="https://www.instagram.com/tripways.travel/">
                            <i class="fab fa-instagram"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="{{ url('/') }}" class="navbar-brand">
                    {{-- <h1 class="m-0 text-primary"><span class="text-dark">TRIPWAYS </span>TRAVEL</h1> --}}
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" width="200px">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{ url('/') }}"
                            class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('frontend.about') }}"
                            class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                        {{-- <a href="{{ route('frontend.service') }}"
                            class="nav-item nav-link {{ request()->is('services') ? 'active' : '' }}">Services</a> --}}
                        <a href="{{ route('frontend.packages') }}"
                            class="nav-item nav-link {{ request()->is('packages') || request()->is('package/*') ? 'active' : '' }}">Tour
                            Packages</a>
                        <a href="{{ route('frontend.destinations') }}"
                            class="nav-item nav-link {{ request()->is('destinations') ? 'active' : '' }}">Destinations</a>
                        <a href="{{ route('frontend.contact') }}"
                            class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <main id="app">
        @yield('content')
    </main>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-6 mb-5">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white mr-2">TRIPWAYS</span>TRAVELS</h1>
                </a>
                <p>We offers a range of services to travelers in Nepal, Tibet, and Bhutan, including trekking, guided
                    tours, thrill activities, and bike hiring. We feel pride on providing excellent services and aims to
                    make the travel experience stress-free and enjoyable for OUR clients.</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="tel:+977-9856038279"><i
                            class="fa fa-phone"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="viber://chat?number=9856038279"><i
                            class="fab fa-viber"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="https://wa.me/9802859900">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a class="btn btn-outline-primary btn-square" href="https://www.instagram.com/tripways.travel/"><i
                            class="fab fa-instagram"></i></a>
                </div>

                <div class="d-flex justify-content-start mt-2">
                    <img src="https://i0.wp.com/xpressionbd.com/wp-content/uploads/2018/12/We-Accept.png?fit=1024%2C209&ssl=1"
                        alt="Payment Options" width="500px" height="100" class="mr-5">

                    <div>
                        <h5 style="color: #fff;">Affiliated with</h5>
                        <img src="{{ asset('img/affiliate.png') }}" alt="Affiliate" width="300px" height="200px">
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Quick Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="{{ url('/') }}"><i
                            class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white-50 mb-2" href="{{ url('/packages') }}"><i
                            class="fa fa-angle-right mr-2"></i>Tour Packages</a>
                    <a class="text-white-50 mb-2" href="{{ url('/contact') }}"><i
                            class="fa fa-angle-right mr-2"></i>Contact</a>
                    <a class="text-white-50 mb-2" href="{{ url('/destinations') }}"><i
                            class="fa fa-angle-right mr-2"></i>Destinations</a>
                    <a class="text-white-50 mb-2" href="{{ url('/about') }}"><i
                            class="fa fa-angle-right mr-2"></i>About</a>

                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <img src="{{ asset('img/footer_logo.jpeg') }}" alt="Footer Logo" width="80%" height="100"
                    class="mb-2">
                <h5 style="color: #fff;">Our service is your destination</h5>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Street No.7 Lakeside,Pokhara-Nepal</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+977 9856073733</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+977 9802859900</p>
                <p><i class="fa fa-envelope mr-2"></i>tripwaystnt@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">tripwaystravels.com</a>. All Rights
                    Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Developed by <a href="#">Bipin Regmi & Json KC</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a> --}}

    <a href="https://api.whatsapp.com/send?phone=9802859900&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202."
        class="float" target="_blank">
        <i class="fab fa-whatsapp my-float"></i>
    </a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/frontend.js') }}"></script>
    @yield('js')
    @stack('after_scripts')

    @include('partials.chatbot')

</body>

</html>
