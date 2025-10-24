@extends('layouts.master')

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

    /* Land card animations */
    .land-premium-card {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .zoom-visible .land-premium-card {
        opacity: 1;
        transform: translateY(0);
    }

    /* Stagger land cards */
    .zoom-visible .land-premium-card:nth-child(1) { transition-delay: 0.1s; }
    .zoom-visible .land-premium-card:nth-child(2) { transition-delay: 0.2s; }
    .zoom-visible .land-premium-card:nth-child(3) { transition-delay: 0.3s; }
    .zoom-visible .land-premium-card:nth-child(4) { transition-delay: 0.4s; }
    .zoom-visible .land-premium-card:nth-child(5) { transition-delay: 0.5s; }
    .zoom-visible .land-premium-card:nth-child(6) { transition-delay: 0.6s; }
</style>

<section class="about-hero position-relative zoom-scroll-section">
  <!-- Background Image -->
   <div class="about-hero-bg" style=" background-image: url('{{ asset('uploads/joint-ventures.jpg') }}');"></div>

  <!-- Overlay -->
  <div class="about-hero-overlay"></div>

  <!-- Text Content -->
  <div class="container position-relative about-hero-content">
    <h1 class="about-title">
      Land for Sale
      <span class="about-underline"></span>
    </h1>
  </div>
</section>
    {{--  --}}

<!-- Land for Sale Section -->
<section class="land-sale-section zoom-scroll-section">
  <div class="container">
    <!-- Section Title -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-8 col-md-8">
        <div class="pq-section-title pq-style-1">
          <span class="pq-section-sub-title">Featured Listings</span>
          <h5 class="pq-section-main-title">Land for Sale</h5>
        </div>
        <h3>
            Beyond Design: Your Partner in Property & Prosperity
        </h3>
        <p style="color:#000000">
            While Meglink Ventures is celebrated for crafting timeless, elegant, and functional interior spaces, our expertise extends into the real estate sector.
            We offer prime investment opportunities through both the direct sale of land and strategic Joint Ventures (JVs).
            A Joint Venture is a strategic business arrangement where Meglink pools resources with landowners or developers to execute a specific project—like subdivision or development—sharing the risks, costs, and ultimately, the profits. Whether you're looking for a straight purchase or a partnership to maximize land potential, we provide secure, high-potential property solutions that complement your beautiful, newly designed lifestyle.
      </p>
      </div>
    </div>

    <!-- Listings -->
    <div class="row g-4">
      @forelse($landsForSale as $land)
      <div class="col-lg-6 col-md-6">
        <div class="land-premium-card">
          <div class="land-premium-image">
            <img decoding="async"
                 src="{{ asset('storage/' . ($land->images[0] ?? 'html/images/placeholder.jpg')) }}"
                 alt="{{ $land->title }}">
            <div class="land-gradient-overlay"></div>
            <div class="land-info">
              <h5 class="land-title">{{ $land->title }}</h5>
              <p class="land-desc">{{ Str::limit($land->description, 80) }}</p>
              <span class="land-price">Ksh {{ number_format($land->price) }}</span>
            </div>
          </div>
        </div>
      </div>
      @empty
        <p class="text-center">No land for sale available at the moment.</p>
      @endforelse
    </div>
  </div>
</section>
<!-- End Land for Sale Section -->


<!-- Joint Ventures Section -->
<section class="land-sale-section zoom-scroll-section">
  <div class="container">
    <!-- Section Title -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-8 col-md-8">
        <div class="pq-section-title pq-style-1">
          <span class="pq-section-sub-title">Joint Venture Opportunities</span>
          <h5 class="pq-section-main-title">Joint Ventures</h5>
        </div>
      </div>
    </div>

    <!-- Listings -->
    <div class="row g-4">
      @forelse($jointVentures as $land)
      <div class="col-lg-6 col-md-6">
        <div class="land-premium-card">
          <div class="land-premium-image">
            <img decoding="async"
                 src="{{ asset('storage/' . ($land->images[0] ?? 'html/images/placeholder.jpg')) }}"
                 alt="{{ $land->title }}">
            <div class="land-gradient-overlay"></div>
            <div class="land-info">
              <h5 class="land-title">{{ $land->title }}</h5>
              <p class="land-desc">{{ Str::limit($land->description, 80) }}</p>
              <span class="land-price">Ksh {{ number_format($land->price) }}</span>
            </div>
          </div>
        </div>
      </div>
      @empty
        <p class="text-center">No joint venture listings available at the moment.</p>
      @endforelse
    </div>
  </div>
</section>
<!-- End Joint Ventures Section -->

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
