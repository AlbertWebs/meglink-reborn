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

    /* Contact info item animations */
    .pq-icon-box {
        opacity: 0;
        transform: translateX(-20px);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .zoom-visible .pq-icon-box {
        opacity: 1;
        transform: translateX(0);
    }

    /* Stagger contact info items */
    .zoom-visible .pq-icon-box:nth-child(1) { transition-delay: 0.1s; }
    .zoom-visible .pq-icon-box:nth-child(2) { transition-delay: 0.2s; }
    .zoom-visible .pq-icon-box:nth-child(3) { transition-delay: 0.3s; }
    .zoom-visible .pq-icon-box:nth-child(4) { transition-delay: 0.4s; }

    /* Map animation */
    .pq-map {
        opacity: 0;
        transform: translateX(20px);
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .zoom-visible .pq-map {
        opacity: 1;
        transform: translateX(0);
    }
</style>

<section class="about-hero position-relative zoom-scroll-section">
  <!-- Background Image -->
   <div class="about-hero-bg" style=" background-image: url('{{ asset('uploads/IMG-20250609-WA0018.jpg') }}');"></div>

  <!-- Overlay -->
  <div class="about-hero-overlay"></div>

  <!-- Text Content -->
  <div class="container position-relative about-hero-content">
    <h1 class="about-title">
      Contact Us
      <span class="about-underline"></span>
    </h1>
  </div>
</section>

      <!-- Contact Us -->
    <section class="contact-us pq-pb-80 zoom-scroll-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <div class="pq-section-title pq-style-1 pq-mb-30">
                        <span class="pq-section-sub-title">our contact</span>
                        <h5 class="pq-section-main-title">Get in touch</h5>
                        <div class="orange-divider mb-4"></div>
                        {{-- <p class="pq-section-description">Lorem Ipsum is simply dummy text of the printing &amp; typesetting industry. Contrary to popular belief, Lorem Ipsum is not simply random text.</p> --}}
                    </div>
                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-home"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Visit A Office</h6>
                            <p class="mb-0">Mayfox House, Riverside Garden,
                                Off Riverside Drive, Chiromo Area,
                                Nairobi.

                            </p>
                        </div>
                    </div>
                    <div class="divider pq-my-15"></div>
                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-telephone"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Contact-Us</h6>
                            <p class="mb-0">+ (254) 0737 211 206<br>+ (254) 0705 211 206</p>
                        </div>
                    </div>
                    <div class="divider pq-my-15"></div>
                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-email"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Email-Us</h6>
                            <p class="mb-0">info@meglinkventures.co.ke<br>hello@meglinkventures.co.ke</p>
                        </div>
                    </div>
                    <div class="divider pq-my-15"></div>

                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-time"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Working Hours</h6>
                            <p class="mb-0">Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 2:00 PM</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 mt-4 mt-lg-0 p-xl-0">
                    <div class="pq-map pq-me-330">
                        <iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.836488961483!2d36.7980905!3d-1.2711255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f171550f35839%3A0xf75d6f20df03463e!2sMeglink%20Ventures%20Limited!5e0!3m2!1sen!2ske!4v1758621913663!5m2!1sen!2ske" title="London Eye, London, United Kingdom" aria-label="London Eye, London, United Kingdom"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row mt-4 text-center zoom-scroll-section">
        <div class="col-lg-12">
            <strong>
            <a href="">Privacy Policy</a> |
            <a href="">Terms and Conditions</a> |
            <a href="">Copyright</a>
            </strong>
        </div>
    </div>
    <!-- Contact Us -->
    <br><br>

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
