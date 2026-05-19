@extends('layouts.app')

@section('title', 'Our Blog – Immigration & Visa Consulting')

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
    <div class="shape">
        <img src="{{ asset('assets/img/inner-page/shape.png') }}" alt="img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="breadcrumb-title">Our BLOG</h1>
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <i class="fa-solid fa-chevron-right"></i>
                </li>
                <li>
                   Our Blog
                </li>
            </ul>
        </div>
    </div>
</section>

<!--News Section Start -->
<section class="news-section section-padding fix">
    <div class="container">
        <div class="row g-4">
            @forelse($blogs as $blog)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="news-card-item">
                        <div class="news-image">
                            <img src="{{ asset('uploads/blogs/' . $blog->image1) }}" alt="{{ $blog->name }}" style="height: 250px; object-fit: cover; width: 100%;">
                            <span>{{ $blog->category }}</span>
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image" style="background-image: url('{{ asset('uploads/blogs/' . $blog->image1) }}');"></div>
                                <div class="news-layer-image" style="background-image: url('{{ asset('uploads/blogs/' . $blog->image1) }}');"></div>
                                <div class="news-layer-image" style="background-image: url('{{ asset('uploads/blogs/' . $blog->image1) }}');"></div>
                                <div class="news-layer-image" style="background-image: url('{{ asset('uploads/blogs/' . $blog->image1) }}');"></div>
                            </div>
                        </div>
                        <div class="news-content">
                            <div class="list">
                                <span>Comment (0)</span>
                                <span>_ {{ $blog->last_updated ? $blog->last_updated->format('d F, Y') : '' }}</span>
                            </div>
                            <h3>
                                <a href="{{ route('blog.details', $blog->blogurl) }}">
                                    {{ $blog->name }}
                                </a>
                            </h3>
                            <div class="news-bottom">
                                <div class="info-item">
                                    <img src="{{ asset('assets/img/home-1/news/client.png') }}" alt="img">
                                    <span>By {{ $blog->writtenby ?? 'Admin' }}</span>
                                </div>
                                <a href="{{ route('blog.details', $blog->blogurl) }}" class="link-btn">View Articles<i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>No articles found.</h3>
                </div>
            @endforelse
        </div>

        <div class="pagination-area mt-50 text-center">
            {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>
@endsection

@section('footer')
    @include('partials.footer-home3')
@endsection
