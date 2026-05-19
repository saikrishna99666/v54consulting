@extends('layouts.app')

@section('title', 'FAQs & Answers – Immigration & Visa Consulting')

@push('styles')
<style>
    /* Premium FAQ styling */
    .faq-page-wrapper {
        background-color: #F8F8F9;
        padding: 90px 0;
    }
    
    /* Search Box Section */
    .faq-search-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.03);
        border: 1px solid #eaeaea;
        margin-bottom: 50px;
        position: relative;
        overflow: hidden;
    }
    .faq-search-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background-color: var(--theme);
    }
    .faq-search-wrapper {
        position: relative;
        max-width: 600px;
        margin: 0 auto;
    }
    .faq-search-wrapper input {
        width: 100%;
        padding: 16px 25px 16px 60px;
        border-radius: 50px;
        border: 2px solid #eaeaea;
        font-size: 16px;
        color: var(--header);
        background: #ffffff;
        transition: all 0.3s ease;
        font-family: inherit;
    }
    .faq-search-wrapper input:focus {
        border-color: var(--theme-2);
        box-shadow: 0 0 15px rgba(0, 72, 180, 0.1);
        outline: none;
    }
    .faq-search-wrapper i {
        position: absolute;
        left: 25px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--theme);
        font-size: 18px;
    }
    
    /* Sidebar Tabs Navigation */
    .faq-sidebar {
        position: sticky;
        top: 110px;
    }
    .faq-category-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.03);
        border: 1px solid #eaeaea;
    }
    .faq-category-card h4 {
        font-weight: 700;
        color: var(--header);
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #f5f5f5;
        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .faq-category-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .faq-category-item {
        margin-bottom: 12px;
    }
    .faq-category-btn {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 12px 20px;
        border-radius: 50px;
        border: 1px solid #eee;
        background: #ffffff;
        color: var(--header);
        font-weight: 600;
        text-align: left;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .faq-category-btn i {
        margin-right: 12px;
        color: var(--theme);
        font-size: 14px;
        transition: all 0.3s ease;
    }
    .faq-category-btn.active {
        background: var(--theme) !important;
        border-color: var(--theme) !important;
        color: #ffffff !important;
        box-shadow: 0 8px 20px rgba(225, 56, 51, 0.2);
    }
    .faq-category-btn.active i {
        color: #ffffff !important;
    }
    .faq-category-btn:hover:not(.active) {
        background: #fafafa;
        transform: translateX(5px);
        border-color: var(--theme-2);
    }

    /* FAQ Item Card */
    .faq-item-card {
        background: #ffffff;
        border-radius: 16px;
        margin-bottom: 15px;
        border: 1px solid #eaeaea;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.01);
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .faq-item-card:hover {
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
        border-color: #ddd;
    }
    .faq-item-header {
        padding: 20px 25px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        user-select: none;
        transition: background-color 0.3s ease;
    }
    .faq-item-header:hover {
        background-color: #fafbfc;
    }
    .faq-item-question {
        font-size: 17px;
        font-weight: 700;
        color: var(--header);
        margin: 0;
        padding-right: 20px;
        line-height: 1.4;
    }
    .faq-item-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: #f5f6f8;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: var(--theme);
        font-size: 14px;
        transition: all 0.3s ease;
    }
    .faq-item-card.is-open {
        border-color: var(--theme-2);
        box-shadow: 0 10px 30px rgba(0, 72, 180, 0.06);
    }
    .faq-item-card.is-open .faq-item-icon {
        background-color: var(--theme-2);
        color: #ffffff;
        transform: rotate(180deg);
    }
    .faq-item-body {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .faq-item-content {
        padding: 0 25px 20px 25px;
        font-size: 15px;
        line-height: 1.8;
        color: var(--text);
        border-top: 1px dashed #f0f0f0;
        padding-top: 15px;
    }
    .faq-item-content p {
        margin-bottom: 0;
    }
    .faq-category-badge {
        display: inline-block;
        padding: 4px 10px;
        background-color: #EBF2FF;
        color: var(--theme-2);
        font-size: 12px;
        font-weight: 700;
        border-radius: 50px;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Search Not Found State */
    .faq-not-found {
        text-align: center;
        padding: 50px 20px;
        background: #ffffff;
        border-radius: 20px;
        border: 1px dashed #ccc;
    }
    .faq-not-found i {
        font-size: 50px;
        color: #ccc;
        margin-bottom: 15px;
    }
    .faq-not-found h5 {
        font-weight: 700;
        color: var(--header);
        margin-bottom: 5px;
    }
    
    .breadcrumb-wrapper {
        padding: 100px 0;
        position: relative;
    }
</style>
@endpush

@section('content')
<!-- Breadcrumb Section -->
@php
    $breadcrumbImg = ($siteSettings && $siteSettings->breadcrumb_image) 
        ? asset('uploads/settings/' . $siteSettings->breadcrumb_image) 
        : asset('assets/img/inner-page/breadcrumb.jpg');
@endphp
<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ $breadcrumbImg }});">
    <div class="shape">
        <img src="{{ asset('assets/img/inner-page/shape.png') }}" alt="img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="breadcrumb-title">Frequently Asked Questions</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>FAQs</li>
            </ul>
        </div>
    </div>
</section>

<!-- FAQ Interactive Page -->
<div class="faq-page-wrapper">
    <div class="container">
        <!-- Search Card -->
        <div class="faq-search-card">
            <div class="text-center mb-4">
                <span style="background: #EBF2FF; color: var(--theme-2); border: none; padding: 6px 18px; border-radius: 50px; font-size: 14px; margin-bottom: 15px; display: inline-block; font-weight: 700;">Have a Specific Question?</span>
                <h2 style="font-weight: 800; color: var(--header); font-size: 36px; text-transform: uppercase;">Search Our Knowledge Base</h2>
                <p style="color: var(--text); font-size: 15px; max-width: 600px; margin: 10px auto 0;">Find instant answers to questions regarding student visas, university applications, admissions, and global opportunities.</p>
            </div>
            <div class="faq-search-wrapper">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="faqSearchInput" placeholder="Type keywords to filter questions... (e.g. visa, scholarship)">
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Sidebar for Categories -->
            <div class="col-lg-4">
                <div class="faq-sidebar">
                    <div class="faq-category-card">
                        <h4>FAQ Categories</h4>
                        <ul class="faq-category-list">
                            <li class="faq-category-item">
                                <button class="faq-category-btn active" data-category="all">
                                    <i class="fa-solid fa-layer-group"></i>
                                    All FAQs
                                </button>
                            </li>
                            @foreach($categories as $cat)
                            <li class="faq-category-item">
                                <button class="faq-category-btn" data-category="cat-{{ $cat->id }}">
                                    <i class="fa-solid fa-circle-question"></i>
                                    {{ $cat->name }}
                                </button>
                            </li>
                            @endforeach
                            <!-- Fallback for uncategorized FAQs if present -->
                            @if($faqs->contains('category_id', null))
                            <li class="faq-category-item">
                                <button class="faq-category-btn" data-category="cat-general">
                                    <i class="fa-solid fa-circle-info"></i>
                                    General Questions
                                </button>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Area for Accordions -->
            <div class="col-lg-8">
                <div class="faq-list-container">
                    @forelse($faqs as $faq)
                        @php
                            $catClass = $faq->category_id ? 'cat-' . $faq->category_id : 'cat-general';
                            $catName = $faq->category ? $faq->category->name : 'General';
                        @endphp
                        <div class="faq-item-card" data-category="{{ $catClass }}">
                            <div class="faq-item-header">
                                <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                    <span class="faq-category-badge">{{ $catName }}</span>
                                    <h5 class="faq-item-question">{{ $faq->question }}</h5>
                                </div>
                                <div class="faq-item-icon">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="faq-item-body">
                                <div class="faq-item-content">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="faq-not-found">
                            <i class="fa-solid fa-face-frown"></i>
                            <h5>No FAQs Available</h5>
                            <p>Please check back later or contact our team directly for help.</p>
                        </div>
                    @endforelse
                    
                    <!-- Search/Filter Not Found Message -->
                    <div id="faqNoResults" class="faq-not-found" style="display: none;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <h5>No matches found</h5>
                        <p>We couldn't find any questions matching your keywords. Please try different terms.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('faqSearchInput');
        const categoryButtons = document.querySelectorAll('.faq-category-btn');
        const faqCards = document.querySelectorAll('.faq-item-card');
        const noResultsDiv = document.getElementById('faqNoResults');
        let activeCategory = 'all';
        let searchQuery = '';

        // FAQ accordion open/close handler
        faqCards.forEach(card => {
            const header = card.querySelector('.faq-item-header');
            const body = card.querySelector('.faq-item-body');
            
            header.addEventListener('click', () => {
                const isOpen = card.classList.contains('is-open');
                
                // Close other open cards for clean single accordion mode
                faqCards.forEach(c => {
                    if (c !== card && c.classList.contains('is-open')) {
                        c.classList.remove('is-open');
                        c.querySelector('.faq-item-body').style.maxHeight = '0';
                    }
                });

                if (isOpen) {
                    card.classList.remove('is-open');
                    body.style.maxHeight = '0';
                } else {
                    card.classList.add('is-open');
                    body.style.maxHeight = body.scrollHeight + 'px';
                }
            });
        });

        // Filter FAQs based on active category and search query
        function filterFaqs() {
            let visibleCount = 0;
            
            faqCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                const questionText = card.querySelector('.faq-item-question').textContent.toLowerCase();
                const answerText = card.querySelector('.faq-item-content').textContent.toLowerCase();
                
                const matchesCategory = (activeCategory === 'all' || cardCategory === activeCategory);
                const matchesSearch = (searchQuery === '' || questionText.includes(searchQuery) || answerText.includes(searchQuery));
                
                if (matchesCategory && matchesSearch) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                    // Auto-collapse if hidden
                    card.classList.remove('is-open');
                    card.querySelector('.faq-item-body').style.maxHeight = '0';
                }
            });

            // Toggle no results container
            if (visibleCount === 0 && faqCards.length > 0) {
                noResultsDiv.style.display = 'block';
            } else {
                noResultsDiv.style.display = 'none';
            }
        }

        // Live Search Input Listener
        searchInput.addEventListener('input', function(e) {
            searchQuery = e.target.value.toLowerCase().trim();
            filterFaqs();
        });

        // Category Tab Switch Listener
        categoryButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                // Toggle active category classes
                categoryButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                activeCategory = btn.getAttribute('data-category');
                filterFaqs();
            });
        });
    });
</script>
@endpush
@endsection

@section('footer')
    @include('partials.footer-home3')
@endsection
