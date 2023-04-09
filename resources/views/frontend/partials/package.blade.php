<div class="col-lg-4 col-md-6 mb-4">
    <div class="package-item bg-white mb-2">
        <img class="img-fluid" src="{{ $package->display_image->url }}" alt="{{ $package->package_title }}">
        <div class="p-4">
            <div class="d-flex justify-content-between mb-3">
                <small class="m-0"><i
                        class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $package->destination->name }}</small>
                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $package->duration }}
                    days</small>
                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{ $package->max_people }}
                    Person</small>
            </div>
            <a class="h5 text-decoration-none"
                href="{{ route('frontend.packageDetail', $package->id) }}">{{ $package->package_title }}</a>
            <div class="border-top mt-4 pt-4">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('frontend.packageDetail', $package->id) }}" class="btn btn-success">Explore</a>
                    <h5 class="m-0">Rs. {{ $package->total_price }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
