@extends('layouts.app')
@section('css')
    <style>
        .a-color-white a {
            color: black;
        }
    </style>
@endsection
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Contact</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Contact</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contact</h6>
                <h1>Contact For Any Query</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate"
                            action="{{ route('frontend.mail') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" placeholder="Your Name"
                                        name="name" required="required"
                                        data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="phone" placeholder="Your Phone"
                                        required="required" name="phone"
                                        data-validation-required-message="Please enter your phone number" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="subject" placeholder="Subject"
                                    name="subject" required="required"
                                    data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message" required="required"
                                    data-validation-required-message="Please enter your message" name="message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6 py-3 border" style="color:black;">
                            <h3>Hi, We Are Social,</h3>
                            <p>Follow us for exclusive package details</p>
                            <div class="d-flex justify-content-start">
                                <a class="btn btn-outline-primary btn-square mr-2" href="tel:+977-9869352017"><i
                                        class="fa fa-phone"></i></a>
                                <a class="btn btn-outline-primary btn-square mr-2" href="viber://chat?number=9869352017"><i
                                        class="fab fa-viber"></i></a>
                                <a class="btn btn-outline-primary btn-square mr-2" href="https://wa.me/9869352017">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a class="btn btn-outline-primary btn-square"
                                    href="https://www.instagram.com/tripways.travel/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 py-3">
                            <h3>Contact Us</h3>
                            <div>
                                <p><i class="fa fa-map-marker-alt mr-2"></i>Street No.7 Lakeside,Pokhara-Nepal</p>
                                <p><i class="fa fa-phone-alt mr-2"></i>+977 9869352017</p>
                                <p><i class="fa fa-phone-alt mr-2"></i>+977 9869352017</p>
                                <p><i class="fa fa-envelope mr-2"></i>tripway@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-12 border p-3">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3516.0263437586377!2d83.9623711!3d28.2065122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995954e8451f873%3A0x1b1bb88ed2702f96!2sTripways%20Travel%20And%20Tours%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1682663141225!5m2!1sen!2snp"
                                width="100%" height="400" style="border:0;" allowfullscreen="true" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
