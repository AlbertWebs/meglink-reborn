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
