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
</style>

<section class="about-hero position-relative zoom-scroll-section">
  <!-- Background Image -->
   <div class="about-hero-bg" style=" background-image: url('{{ asset('storage/'.$service->image) }}');"></div>

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
    {{--  --}}

<section class="intro-section zoom-scroll-section">
  <div class="intro-container">
    <div class="intro-text">
      <h2>Our Services</h2>
      <h4 style="color:#f37920"> {{$service->title}}</h4>

      <p>
        {{$service->meta}}
      </p>
      <a href="{{url('our-work')}}" class="intro-btn">
        Explore {{$service->title}} Portfolio &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>



     <!-- About Us -->
    <section class="about-us .pq-about-bg-color pq-bg-grey zoom-scroll-section">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-6 padding-reset">
                    <div class="about-us-img">
                        <img src="{{ asset('storage/'.$service->image) }}" class="service-images pq-image1" alt="">
                    </div>
                </div>
                <div class="col-xl-6 pq-about-us-padding d-flex flex-column justify-content-center pq-about-bg-colors">
                    <div class="pq-section-title pq-style-1 pq-mb-35">
                         <h5  style="text-transform: capitalize; color:#f37920; font-weight:800;">{{$service->title}}</h5>

                        <p class="pq-section-description about-us-text text-black">
                          {!! $service->title !!}
                        </p>

                    </div>

                </div>
            </div>


        </div>
    </section>
    <!-- About Us -->
    <!-- START: Our Process Section - Interior Design Consultation -->
<section class="our-process-cards py-5 zoom-scroll-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-subtitle">Our Methodology</span>
            <h2 class="section-title">Interior Design Consultation Process</h2>
            <p class="section-description">A comprehensive journey from concept to completion, delivering exceptional interior spaces</p>
        </div>

        <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="process-card">
                    <div class="card-icon">
                        <div class="icon-wrapper">
                            <i class="fas fa-palette"></i>
                        </div>
                        <span class="step-badge">01</span>
                    </div>
                    <h5>Concept Mood Board</h5>
                    <p>Internet sourced images for inspiration and reference, creating a visual direction that captures your vision and project requirements.</p>
                    <div class="card-features">
                        <span>Visual Inspiration</span>
                        <span>Style Direction</span>
                        <span>Reference Images</span>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="process-card">
                    <div class="card-icon">
                        <div class="icon-wrapper">
                            <i class="fas fa-ruler-combined"></i>
                        </div>
                        <span class="step-badge">02</span>
                    </div>
                    <h5>Proposed Layout</h5>
                    <p>Detailed layout report with demolitions and furniture arrangement proposals discussed during our first site visit.</p>
                    <div class="card-features">
                        <span>Space Planning</span>
                        <span>Furniture Layout</span>
                        <span>Demolition Plans</span>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="process-card">
                    <div class="card-icon">
                        <div class="icon-wrapper">
                            <i class="fas fa-vr-cardboard"></i>
                        </div>
                        <span class="step-badge">03</span>
                    </div>
                    <h5>Virtual Tour</h5>
                    <p>An immersive 3D virtual presentation of interior spaces, bringing your design to life with realistic visualization.</p>
                    <div class="card-features">
                        <span>3D Visualization</span>
                        <span>Immersive Experience</span>
                        <span>2 Revisions Included</span>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="process-card">
                    <div class="card-icon">
                        <div class="icon-wrapper">
                            <i class="fas fa-camera"></i>
                        </div>
                        <span class="step-badge">04</span>
                    </div>
                    <h5>3D Renders</h5>
                    <p>High-quality still images compiled from the approved virtual tour, providing detailed visual references for implementation.</p>
                    <div class="card-features">
                        <span>Still Images</span>
                        <span>Detailed Views</span>
                        <span>Approved Designs</span>
                    </div>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="process-card">
                    <div class="card-icon">
                        <div class="icon-wrapper">
                            <i class="fas fa-drafting-compass"></i>
                        </div>
                        <span class="step-badge">05</span>
                    </div>
                    <h5>Working Drawings</h5>
                    <p>Technical layouts and elevations for installation purposes covering all critical aspects of the interior design.</p>
                    <div class="card-features">
                        <span>Ceiling Plans</span>
                        <span>Lighting Layouts</span>
                        <span>Plumbing & Tile Works</span>
                    </div>
                </div>
            </div>

            <!-- Step 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="process-card">
                    <div class="card-icon">
                        <div class="icon-wrapper">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <span class="step-badge">06</span>
                    </div>
                    <h5>Project Management</h5>
                    <p>Dedicated project manager stationed on-site to ensure quality standards and coordinate all installation processes.</p>
                    <div class="card-features">
                        <span>Quality Control</span>
                        <span>Team Coordination</span>
                        <span>Material Standards</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Process Summary -->
        <div class="process-summary mt-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h4 class="summary-title">Complete Interior Design Solution</h4>
                    <p class="summary-text">
                        Our comprehensive consultation package ensures every aspect of your interior design project is professionally managed,
                        from initial concept development to final installation, delivering spaces that exceed expectations.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ url('/contact-us') }}" class="btn btn-orange btn-lg">
                        Start Your Project <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
