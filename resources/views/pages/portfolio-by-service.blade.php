@extends('layouts.master-renders')

@section('content')

<style>
    /* Zoom Scroll Animation Styles */
    .zoom-scroll-section {
        opacity: 0;
        transform: scale(0.95);
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .zoom-scroll-section.zoom-visible {
        opacity: 1;
        transform: scale(1);
    }

    /* Gallery item animations */
    .gallery-item {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .zoom-visible .gallery-item {
        opacity: 1;
        transform: translateY(0);
    }

    /* Stagger gallery items */
    .zoom-visible .gallery-item:nth-child(1) { transition-delay: 0.1s; }
    .zoom-visible .gallery-item:nth-child(2) { transition-delay: 0.2s; }
    .zoom-visible .gallery-item:nth-child(3) { transition-delay: 0.3s; }
    .zoom-visible .gallery-item:nth-child(4) { transition-delay: 0.4s; }
    .zoom-visible .gallery-item:nth-child(5) { transition-delay: 0.5s; }
    .zoom-visible .gallery-item:nth-child(6) { transition-delay: 0.6s; }

    /* Enhanced Portfolio Filter */
    .portfolio-filter-wrap {
        background: linear-gradient(135deg, #101318 0%, #1a1f28 100%);
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 20px 60px rgba(16, 19, 24, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.1);
        position: sticky;
        top: 90px;
        z-index: 20;
        margin-bottom: 60px;
    }
    .portfolio-filter-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 24px;
    }
    .portfolio-filter-title {
        font-weight: 800;
        color: #ffffff;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        font-size: 12px;
        margin: 0;
    }
    .portfolio-filter-hint {
        color: rgba(255, 255, 255, 0.6);
        font-size: 14px;
        margin: 0;
    }
    .portfolio-filters {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 14px;
        margin: 0;
    }
    .portfolio-filter-link {
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 14px 18px;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: rgba(255, 255, 255, 0.85);
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        background: rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }
    .portfolio-filter-link:hover {
        border-color: rgba(243, 121, 32, 0.8);
        color: #ffffff;
        background: rgba(243, 121, 32, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(243, 121, 32, 0.2);
    }
    .portfolio-filter-link.active {
        background: linear-gradient(135deg, #f37920 0%, #d6681a 100%);
        border-color: #f37920;
        color: #ffffff;
        box-shadow: 0 10px 25px rgba(243, 121, 32, 0.35);
    }
    .portfolio-filter-count {
        font-size: 11px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.6);
        font-weight: 600;
    }
    .portfolio-filter-link.active .portfolio-filter-count {
        color: rgba(255, 255, 255, 0.9);
    }

    /* Enhanced Gallery */
    .portfolio-gallery-section {
        padding: 80px 0;
        background: #ffffff;
    }
    .portfolio-gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.1);
        transition: all 0.4s ease;
        height: 100%;
        min-height: 380px;
    }
    .portfolio-gallery-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(16, 19, 24, 0.2);
    }
    .portfolio-gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .portfolio-gallery-item:hover img {
        transform: scale(1.1);
    }
    .portfolio-gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(16, 19, 24, 0.95), rgba(16, 19, 24, 0.7), transparent);
        padding: 32px 24px 24px;
        color: #ffffff;
        transform: translateY(20px);
        transition: all 0.4s ease;
    }
    .portfolio-gallery-item:hover .portfolio-gallery-overlay {
        transform: translateY(0);
    }
    .portfolio-gallery-overlay h5 {
        font-size: 20px;
        font-weight: 800;
        margin: 0 0 8px;
        color: #ffffff;
    }
    .portfolio-gallery-overlay p {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
    }

    @media (max-width: 767px) {
        .portfolio-filter-wrap {
            padding: 24px;
            margin-bottom: 40px;
        }
        .portfolio-filter-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .portfolio-filters {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        .portfolio-filter-link {
            padding: 12px 14px;
            font-size: 13px;
        }
        .portfolio-gallery-section {
            padding: 50px 0;
        }
    }
    @media (max-width: 480px) {
        .portfolio-filters {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="about-hero position-relative zoom-scroll-section">
    <!-- Background Image -->
    <div class="about-hero-bg" style="background-image: url('{{ asset('uploads/kitchen.jpg') }}');"></div>

    <!-- Overlay -->
    <div class="about-hero-overlay"></div>

    <!-- Text Content -->
    <div class="container position-relative about-hero-content">
        <h1 class="about-title">
            {{$service->title}}
            <span class="about-underline"></span>
        </h1>
    </div>
</section>

<section class="zoom-scroll-section">
    <div class="container">
        <div class="portfolio-filter-wrap">
            <div class="portfolio-filter-header">
                <p class="portfolio-filter-title">Filter by category</p>
                <p class="portfolio-filter-hint">Currently viewing {{ $service->title }}.</p>
            </div>
            <div class="portfolio-filters">
                <a class="portfolio-filter-link" href="{{ route('our-work') }}">
                    All <span class="portfolio-filter-count">All</span>
                </a>
                @foreach($services as $filterService)
                    <a class="portfolio-filter-link {{ $filterService->id === $service->id ? 'active' : '' }}"
                       href="{{ route('portfolio-service', $filterService->slung) }}">
                        {{ $filterService->title }}
                        <span class="portfolio-filter-count">View</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="portfolio-gallery-section zoom-scroll-section">
    <div class="container">
        <div class="row g-4 popup-gallery">
            @forelse($portfolios as $render)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="{{ asset('storage/' . $render->image) }}" title="{{ $render->title }}" class="portfolio-gallery-item">
                            <img src="{{ asset('storage/' . $render->image) }}" alt="{{ $render->title }}">
                            <div class="portfolio-gallery-overlay">
                                <h5>{{ $render->title }}</h5>
                                @if($render->service)
                                    <p>{{ $render->service->title }}</p>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div style="padding: 80px 20px;">
                        <i class="fas fa-images" style="font-size: 64px; color: #e9ecef; margin-bottom: 20px;"></i>
                        <h4 style="color: #5c6570; margin-bottom: 12px;">No Portfolio Items for {{ $service->title }}</h4>
                        <p class="text-muted">Check back soon for portfolio items in this category!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    // Zoom Scroll Animation JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        const zoomSections = document.querySelectorAll('.zoom-scroll-section');

        // Create Intersection Observer
        const zoomObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('zoom-visible');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Observe each section
        zoomSections.forEach(section => {
            zoomObserver.observe(section);
        });

        // Fallback for older browsers
        if (!window.IntersectionObserver) {
            document.querySelectorAll('.zoom-scroll-section').forEach(section => {
                section.classList.add('zoom-visible');
            });
        }
    });
</script>

@endsection
