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
</style>

<section class="intro-section zoom-scroll-section">
  <div class="intro-container">
    <div class="intro-text">
      <h2>Meglink Renders</h2>

      <h4>Leading Interior Designer in Kenya</h4>

      <p>
        Meglink Ventures specializes in creating bespoke, high-end interiors that are a true reflection of your personality and lifestyle. We believe that exceptional design is functional, elegant, and enduring. From initial concept development to the final handover, our dedicated team manages every detail—ensuring a seamless, stress-free process and a stunning final result that elevates your living or working environment into a genuine masterpiece.
      </p>
      <a href="{{url('/')}}/our-work" class="intro-btn">
        Explore Portfolio &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<!-- START: Renders Gallery Section -->
<section class="renders-gallery py-5 bg-light zoom-scroll-section">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-6 fw-bold">Our Architectural Renders</h2>
      <p class="text-muted">Explore our collection of high-quality 3D renders that bring designs to life.</p>
    </div>

    <div class="row g-4 popup-gallery">
      @forelse($renders as $render)
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item position-relative overflow-hidden">
          <a href="{{ asset('storage/' . $render->image) }}" title="{{ $render->title }}">
            <img src="{{ asset('storage/' . $render->image) }}" alt="{{ $render->title }}" class="img-fluid rounded" style="height: 320px; object-fit: cover;">
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
