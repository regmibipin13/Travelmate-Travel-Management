@extends('layouts.app')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">About</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/') }}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">About</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container pt-4 pb-4">
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos quia delectus sed alias ex, deserunt ipsa hic
            perferendis eaque ipsum temporibus provident quod eligendi perspiciatis ipsam animi repudiandae aliquam.
            Voluptatibus?
        </p>
    </div>
@endsection
