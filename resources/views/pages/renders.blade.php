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

    /* Staggered animation delays for multiple sections */
    .zoom-scroll-section:nth-child(1) { transition-delay: 0.1s; }
    .zoom-scroll-section:nth-child(2) { transition-delay: 0.2s; }

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
    .zoom-visible .gallery-item:nth-child(7) { transition-delay: 0.7s; }
    .zoom-visible .gallery-item:nth-child(8) { transition-delay: 0.8s; }
    .zoom-visible .gallery-item:nth-child(9) { transition-delay: 0.9s; }

    /* Enhanced Renders Section */
    .renders-hero {
        padding: 100px 0 80px;
        background: linear-gradient(135deg, #101318 0%, #1a1f28 100%);
        color: #ffffff;
    }
    .renders-hero .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 16px;
        display: block;
    }
    .renders-hero h2 {
        font-size: 48px;
        font-weight: 800;
        margin: 0 0 20px;
        color: #ffffff;
        line-height: 1.2;
    }
    .renders-hero h4 {
        font-size: 24px;
        font-weight: 700;
        color: #f37920;
        margin-bottom: 24px;
    }
    .renders-hero p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 18px;
        line-height: 1.8;
        max-width: 700px;
    }
    .renders-gallery {
        padding: 80px 0;
        background: #ffffff;
    }
    .renders-gallery-header {
        text-align: center;
        margin-bottom: 60px;
    }
    .renders-gallery-header .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(16, 19, 24, 0.6);
        margin-bottom: 12px;
        display: block;
    }
    .renders-gallery-header h2 {
        font-size: 42px;
        font-weight: 800;
        margin: 0 0 16px;
        color: #101318;
    }
    .renders-gallery-header p {
        color: #5c6570;
        font-size: 16px;
        max-width: 600px;
        margin: 0 auto;
    }
    .render-card {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.1);
        transition: all 0.4s ease;
        height: 100%;
        min-height: 380px;
    }
    .render-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(16, 19, 24, 0.2);
    }
    .render-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .render-card:hover img {
        transform: scale(1.1);
    }
    .render-card-overlay {
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
    .render-card:hover .render-card-overlay {
        transform: translateY(0);
    }
    .render-card-overlay h5 {
        font-size: 20px;
        font-weight: 800;
        margin: 0 0 8px;
        color: #ffffff;
    }
    .render-card-overlay p {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
    }
    @media (max-width: 991px) {
        .renders-hero {
            padding: 70px 0 60px;
        }
        .renders-hero h2 {
            font-size: 36px;
        }
        .renders-gallery {
            padding: 60px 0;
        }
    }
</style>

<section class="renders-hero zoom-scroll-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="eyebrow">3D Visualization</span>
                <h2>Meglink Renders</h2>
                <h4>Leading Interior Designer in Kenya</h4>
                <p>
                    Meglink Ventures specializes in creating bespoke, high-end interiors that are a true reflection of your personality and lifestyle. We believe that exceptional design is functional, elegant, and enduring. From initial concept development to the final handover, our dedicated team manages every detail—ensuring a seamless, stress-free process and a stunning final result that elevates your living or working environment into a genuine masterpiece.
                </p>
                <a href="{{url('/')}}/our-work" class="btn btn-orange btn-lg mt-4">
                    Explore Portfolio &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- START: Renders Gallery Section -->
<section class="renders-gallery zoom-scroll-section">
    <div class="container">
        <div class="renders-gallery-header">
            <span class="eyebrow">Our Collection</span>
            <h2>Architectural Renders</h2>
            <p>Explore our collection of high-quality 3D renders that bring designs to life.</p>
        </div>

        <div class="row g-4 popup-gallery">
            @forelse($renders as $render)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="{{ asset('storage/' . $render->image) }}" title="{{ $render->title }}" class="render-card">
                            <img src="{{ asset('storage/' . $render->image) }}" alt="{{ $render->title }}">
                            <div class="render-card-overlay">
                                <h5>{{ $render->title }}</h5>
                                @if($render->description)
                                    <p>{{ \Illuminate\Support\Str::limit($render->description, 80) }}</p>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div style="padding: 80px 20px;">
                        <i class="fas fa-images" style="font-size: 64px; color: #e9ecef; margin-bottom: 20px;"></i>
                        <h4 style="color: #5c6570; margin-bottom: 12px;">No Renders Available</h4>
                        <p class="text-muted">Check back soon for our latest 3D visualizations!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- END: Renders Gallery Section -->

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
