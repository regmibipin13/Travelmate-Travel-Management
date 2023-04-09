<div class="col-lg-4 col-md-6 mb-4 pb-2">
    <div class="blog-item">
        <div class="position-relative">
            <img class="img-fluid w-100" src="{{ $blog->display_image->url }}" alt="{{ $blog->title }}">
            <div class="blog-date">
                <h6 class="font-weight-bold mb-n1">
                    {{ Carbon\Carbon::parse($blog->published_at)->format('d') }}</h6>
                <small
                    class="text-white text-uppercase">{{ Carbon\Carbon::parse($blog->published_at)->format('M') }}</small>
            </div>
        </div>
        <div class="bg-white p-4">
            <div class="d-flex mb-2">
                <a class="text-primary text-uppercase text-decoration-none" href="">Admin</a>
                <span class="text-primary px-2">|</span>
                <a class="text-primary text-uppercase text-decoration-none"
                    href="">{{ $blog->post_category->name }}</a>
            </div>
            <a class="h5 m-0 text-decoration-none"
                href="{{ route('frontend.postDetail', $blog->slug) }}">{{ $blog->title }}</a>
        </div>
    </div>
</div>
