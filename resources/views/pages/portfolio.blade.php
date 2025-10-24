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

    <section class="intro-section zoom-scroll-section">
        <div class="intro-container">
            <div class="intro-text">
                <h2>Our Work</h2>
                <h4 style="color:#f37920">Experience Design At Its Majesty.</h4>

                <p>
                    Founded in 2008 as an interior design outlet
                    studio, the Nairobi-based company has
                    evolved into an interdisciplinary regional
                    lifestyle brand that is leading the
                    contemporary Interior design consulting and
                    contracting conversation with experiential
                    residential, hospitality, commercial and retail
                    industry with an expansive portfolio of home
                    product designs and brand collaborations.
                </p>
                <a href="{{ url('/') }}/contact-us" class="intro-btn">
                    Contact Us &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- START: Renders Gallery Section -->
    <section class="renders-gallery py-5 bg-light zoom-scroll-section">
        <div class="container">
            <div class="row g-4 popup-gallery">
                @forelse($Portfolio as $render)
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item position-relative overflow-hidden">
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
                    <div class="col-12 text-center">
                        <p class="text-muted">No renders available at the moment. Check back soon!</p>
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
            threshold: 0.1, // Trigger when 10% of the element is visible
            rootMargin: '0px 0px -50px 0px' // Adjust trigger point
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
