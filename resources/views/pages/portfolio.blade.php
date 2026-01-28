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
    .zoom-scroll-section:nth-child(3) { transition-delay: 0.3s; }

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

    .reveal-on-scroll {
        opacity: 0;
        transform: translateY(24px);
        transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .reveal-on-scroll.reveal-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .portfolio-filter-wrap {
        background: #0f1218;
        border-radius: 22px;
        padding: 22px;
        box-shadow: 0 20px 50px rgba(16, 19, 24, 0.18);
        border: 1px solid rgba(255, 255, 255, 0.08);
        position: sticky;
        top: 90px;
        z-index: 20;
    }
    .portfolio-filter-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 18px;
    }
    .portfolio-filter-title {
        font-weight: 700;
        color: #ffffff;
        letter-spacing: 0.24em;
        text-transform: uppercase;
        font-size: 11px;
        margin: 0;
    }
    .portfolio-filter-hint {
        color: rgba(255, 255, 255, 0.6);
        font-size: 13px;
        margin: 0;
    }
    .portfolio-filters {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 12px;
        margin: 0;
    }
    .portfolio-filter-link {
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 12px 14px;
        border-radius: 14px;
        border: 1px solid rgba(255, 255, 255, 0.14);
        color: rgba(255, 255, 255, 0.8);
        font-weight: 600;
        font-size: 13px;
        text-decoration: none;
        background: rgba(255, 255, 255, 0.04);
        transition: all 0.2s ease;
    }
    .portfolio-filter-link:hover {
        border-color: rgba(243, 121, 32, 0.7);
        color: #ffffff;
        background: rgba(243, 121, 32, 0.18);
    }
    .portfolio-filter-link.active {
        background: #f37920;
        border-color: #f37920;
        color: #101318;
        box-shadow: 0 10px 20px rgba(243, 121, 32, 0.25);
    }
    .portfolio-filter-count {
        font-size: 11px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.55);
    }
    .portfolio-filter-link.active .portfolio-filter-count {
        color: rgba(16, 19, 24, 0.7);
    }
    @media (max-width: 767px) {
        .portfolio-filters {
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .portfolio-filter-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .portfolio-filters {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        .portfolio-filter-link {
            padding: 10px 12px;
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
        <div class="about-hero-bg" style=" background-image: url('{{ asset('uploads/kitchen.jpg') }}');"></div>

        <!-- Overlay -->
        <div class="about-hero-overlay"></div>

        <!-- Text Content -->
        <div class="container position-relative about-hero-content">
            <h1 class="about-title">
                Our Portfolio
                <span class="about-underline"></span>
            </h1>
        </div>
    </section>

    

    <section>
        <div class="container">
            <div class="portfolio-filter-wrap">
                <div class="portfolio-filter-header">
                    <p class="portfolio-filter-title">Filter by category</p>
                    <p class="portfolio-filter-hint">Select a service to view its portfolio set.</p>
                </div>
                <div class="portfolio-filters">
                    <a class="portfolio-filter-link active" href="{{ route('our-work') }}">
                        All <span class="portfolio-filter-count">All</span>
                    </a>
                    @foreach($services as $service)
                        <a class="portfolio-filter-link" href="{{ route('portfolio-service', $service->slung) }}">
                            {{ $service->title }}
                            <span class="portfolio-filter-count">View</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- START: Renders Gallery Section -->
    <section class="renders-gallery py-5 bg-light zoom-scroll-section">
        <div class="container">
            <div class="row g-4 popup-gallery">
                @forelse($Portfolio as $render)
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item reveal-on-scroll position-relative overflow-hidden">
                            <a href="{{ asset('storage/' . $render->image) }}" title="{{ $render->title }}">
                                <img src="{{ asset('storage/' . $render->image) }}" alt="{{ $render->title }}"
                                    class="img-fluid rounded" style="height: 320px; object-fit: cover;">
                                <div class="gallery-overlay position-absolute bottom-0 start-0 w-100 p-3"
                                    style="background: rgba(0,0,0,0.6); color: #f37920;">
                                    <h5 class="m-0 fw-semibold text-white">{{ $render->title }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center reveal-on-scroll">
                        <p class="text-muted">No renders available at the moment. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- END: Renders Gallery Section -->

    <section class="intro-section zoom-scroll-section reveal-on-scroll">
        <div class="intro-container">
            <div class="intro-text">
                <h2>Our Work</h2>
                <h4 style="color:#f37920">Design excellence, crafted with intent.</h4>

                <p>
                    Since 2008, Meglink has grown from a focused interior studio into a regional design partner delivering
                    residential, hospitality, commercial, and retail experiences. Our portfolio reflects a disciplined craft
                    ethos, thoughtful material curation, and collaborations that elevate everyday spaces.
                </p>
                <a href="{{ url('/') }}/contact-us" class="intro-btn">
                    Contact Us &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
                </a>
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
            threshold: 0.1, // Trigger when 10% of the element is visible
            rootMargin: '0px 0px -50px 0px' // Adjust trigger point
        });

        // Observe each section
        zoomSections.forEach(section => {
            zoomObserver.observe(section);
        });

        const revealItems = document.querySelectorAll('.reveal-on-scroll');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -40px 0px'
        });

        revealItems.forEach(item => {
            revealObserver.observe(item);
        });

        // Fallback for older browsers
        if (!window.IntersectionObserver) {
            document.querySelectorAll('.zoom-scroll-section').forEach(section => {
                section.classList.add('zoom-visible');
            });
            document.querySelectorAll('.reveal-on-scroll').forEach(item => {
                item.classList.add('reveal-visible');
            });
        }
    });
</script>

@endsection
