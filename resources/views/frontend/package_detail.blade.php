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


                    <div class="itenary-lists">
                        <h3>Tour Plan</h3>
                        @foreach ($package->plans as $plan)
                            <div class="card my-3">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <span>
                                        {{ $plan->plan_title }}
                                    </span>

                                </div>
                                <div class="card-body plan-expand">
                                    {!! $plan->description !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
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

            <div class="row mt-3">
                <div class="col-md-8">
                    <h3>Comments</h3>
                    <div class="card mb-3">
                        <div class="card-header">Post your comment</div>
                        <div class="card-body">
                            <form action="{{ route('frontend.comment', $package->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                    @if ($errors->has('email'))
                                        <p class="text-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">{{ __('Phone') }}</label>
                                    <input type="text" class="form-control" placeholder="Phone" name="phone">
                                    @if ($errors->has('phone'))
                                        <p class="text-danger">
                                            {{ $errors->first('phone') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="comment">{{ __('Comment') }}</label>
                                    <textarea name="comment" id="comment" rows="4" placeholder="Enter a Comment" class="form-control"></textarea>
                                    @if ($errors->has('phone'))
                                        <p class="text-danger">
                                            {{ $errors->first('phone') }}
                                        </p>
                                    @endif
                                </div>
                                <button class="btn btn-success btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Comments
                        </div>

                        <div class="card-body">
                            @if (count($package->comments) > 0)
                                @foreach ($package->comments as $comment)
                                    <div class="single-comment border p-3 my-3">
                                        <div class="user-details d-flex align-items-center">
                                            <img src="https://icon-library.com/images/default-user-icon/default-user-icon-13.jpg"
                                                alt="Default Image" width="50" height="50">
                                            <span class="text-primary ml-3">{{ $comment->name }}</span>
                                        </div>
                                        <div class="comment my-3">
                                            <p>
                                                {!! $comment->comment !!}
                                            </p>
                                        </div>
                                        @if (auth()->check())
                                            <div class="actions">
                                                <form action="{{ route('frontend.comment.delete', $comment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        @endif

                                    </div>
                                @endforeach
                            @else
                                <span class="text-center">No Comments for this package</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @vite(['resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endsection
