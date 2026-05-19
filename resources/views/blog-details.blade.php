@extends('layouts.app')

@section('title', $blog->name . ' – Visaway Blog')

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
    <div class="shape">
        <img src="{{ asset('assets/img/inner-page/shape.png') }}" alt="img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="breadcrumb-title">Blog Details</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>{{ $blog->name }}</li>
            </ul>
        </div>
    </div>
</section>

<!-- Blog Details Section Start -->
<section class="blog-details-section section-padding fix">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="blog-details-wrapper">
                    <div class="details-image">
                        @php 
                            $imageName = $blog->image2 ?? $blog->image1;
                            $imagePath = 'uploads/blogs/' . $imageName;
                            if (empty($imageName) || !file_exists(public_path($imagePath))) {
                                $imagePath = 'assets/img/home-3/news/01.jpg';
                            }
                        @endphp
                        <img src="{{ asset($imagePath) }}" alt="{{ $blog->name }}" style="width: 100%; height: 450px; object-fit: cover; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    </div>
                    <div class="details-content mt-5">
                        <div class="meta d-flex align-items-center mb-4 pb-3 border-bottom">
                            <span class="me-4"><i class="fa-solid fa-user-tie me-2 text-primary"></i> By {{ $blog->writtenby ?? 'Admin' }}</span>
                            <span class="me-4"><i class="fa-solid fa-calendar-days me-2 text-primary"></i> {{ ($blog->last_updated ?? $blog->created_at)->format('d M, Y') }}</span>
                            <span><i class="fa-solid fa-layer-group me-2 text-primary"></i> {{ $blog->category }}</span>
                        </div>
                        <h2 class="mb-4" style="font-weight: 700; color: #151515;">{{ $blog->name }}</h2>
                        <div class="description mt-4" style="line-height: 1.8; color: #444; font-size: 17px;">
                            {!! $blog->description !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="main-sidebar">
                    <div class="single-sidebar-widget">
                        <div class="wid-title">
                            <h3>Recent Posts</h3>
                        </div>
                        <div class="recent-post-area">
                            @foreach($recentBlogs as $recent)
                                <div class="recent-items d-flex align-items-center mb-4 transition-all hover-translate-x">
                                    <div class="recent-thumb">
                                        @php 
                                            $recentImage = 'uploads/blogs/' . $recent->image1;
                                            if (empty($recent->image1) || !file_exists(public_path($recentImage))) {
                                                $recentImage = 'assets/img/home-3/news/01.jpg';
                                            }
                                        @endphp
                                        <a href="{{ route('blog.details', $recent->blogurl) }}">
                                            <img src="{{ asset($recentImage) }}" alt="img" style="width: 85px; height: 85px; object-fit: cover; border-radius: 8px;">
                                        </a>
                                    </div>
                                    <div class="recent-content ms-3">
                                        <h4 style="font-size: 16px; font-weight: 600; line-height: 1.4; margin-bottom: 5px;">
                                            <a href="{{ route('blog.details', $recent->blogurl) }}" style="color: #151515;">{{ Str::limit($recent->name, 45) }}</a>
                                        </h4>
                                        <span style="font-size: 13px; color: #777;"><i class="fa-solid fa-calendar-day me-1"></i> {{ ($recent->last_updated ?? $recent->created_at)->format('d M, Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
    @include('partials.footer-home3')
@endsection
