@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">{{ $blog->title }}</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/') }}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">{{ $blog->title }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Blog Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <!-- Blog Detail Start -->
                <div class="pb-3">
                    <div class="blog-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                            <div class="blog-date">
                                <h6 class="font-weight-bold mb-n1">
                                    {{ Carbon\Carbon::parse($blog->published_at)->format('d') }}</h6>
                                <small
                                    class="text-white text-uppercase">{{ Carbon\Carbon::parse($blog->published_at)->format('M') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white mb-3" style="padding: 30px;">
                        <div class="d-flex mb-3">
                            <span class="text-primary px-2">|</span>
                            <a class="text-primary text-uppercase text-decoration-none"
                                href="#">{{ $blog->post_category->name }}</a>
                        </div>
                        <p>{!! $blog->body !!}</p>
                    </div>
                </div>
                <!-- Blog Detail End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
