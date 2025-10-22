@extends('layouts.master')

@section('content')

    <!-- Banner -->
    @include('components.full-homepage-banner')
    <!-- Banner -->
{{--  --}}
<!-- START: Intro Section -->
<section class="intro-section wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.3s">
  <div class="intro-container">
    <div class="intro-text">
      <h2 class="wow fadeInDown" data-wow-delay="0.4s">Meglink Ventures</h2>
      <h4 class="wow fadeInUp" data-wow-delay="0.6s">Leading Interior Designer in Kenya</h4>

      <p class="wow fadeIn" data-wow-delay="0.8s">
        Meglink Ventures is a leading interior design company in Kenya. We specialize in creating timeless, functional, and elegant interior spaces that reflect your personality and lifestyle.
        From concept to completion, our team delivers bespoke designs that transform every room into a masterpiece.
      </p>
      <a href="#services" class="intro-btn wow zoomIn" data-wow-delay="1s">
        Explore Services &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<!-- START: Full Width Statement Section -->
<section class="statement-section wow fadeInUp" data-wow-duration="1.2s" style="background-image: url('{{ asset('uploads/palour.jpg') }}');">
  <div class="statement-overlay">
    <div class="statement-content">
      <h2 class="wow fadeInDown" data-wow-delay="0.4s">Creating Timeless Spaces That Inspire</h2>
      <a href="#collection" class="statement-btn wow fadeInUp" data-wow-delay="0.8s">
        Explore Collection &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<!-- START: Image Grid Section -->
<section class="image-grid-section" id="services">
  <div class="image-grid">
    <!-- Item 1 -->
    <div class="image-item wow fadeInUp" data-wow-delay="0.2s" style="background-image: url('{{ asset('uploads/living.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Living Room Designs</h3>
        <a href="#" class="btn-explore">Explore Collection</a>
      </div>
    </div>

    <!-- Item 2 -->
    <div class="image-item wow fadeInUp" data-wow-delay="0.4s" style="background-image: url('{{ asset('uploads/kitchen.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Luxury Kitchens</h3>
        <a href="#" class="btn-explore">Explore Collection</a>
      </div>
    </div>

    <!-- Item 3 -->
    <div class="image-item wow fadeInUp" data-wow-delay="0.6s" style="background-image: url('{{ asset('uploads/bedroom.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Bedroom Spaces</h3>
        <a href="#" class="btn-explore">Explore Collection</a>
      </div>
    </div>

    <!-- Item 4 -->
    <div class="image-item wow fadeInUp" data-wow-delay="0.8s" style="background-image: url('{{ asset('uploads/outdoor.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Outdoor Inspirations</h3>
        <a href="#" class="btn-explore">Explore Collection</a>
      </div>
    </div>

      <!-- Item 5 -->
    <div class="image-item wow fadeInUp" data-wow-delay="0.6s" style="background-image: url('{{ asset('uploads/staircases.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Premium Staircases</h3>
        <a href="#" class="btn-explore">Explore Collection</a>
      </div>
    </div>

    <!-- Item 6 -->
    <div class="image-item wow fadeInUp" data-wow-delay="0.8s" style="background-image: url('{{ asset('uploads/wardrobes.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Wardrobes</h3>
        <a href="#" class="btn-explore">Explore Collection</a>
      </div>
    </div>
  </div>
</section>

<!-- START: Renders Section -->
<section class="statement-section-center wow fadeIn" data-wow-duration="1.2s" style="background-image: url('{{ asset('uploads/Renders-interiores-scaled.webp') }}');">
  <div class="statement-overlay-center">
    <div class="statement-content-center wow fadeInUp" data-wow-delay="0.4s">
      <h1 class="italized">Interior Design Consulting & Contracting</h1>
      <h2>Designing Experiences That Endure</h2>
      <a href="{{url('/')}}/renders" class="statement-btn wow fadeInLeft" data-wow-delay="0.8s">
        Explore Renders &nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
      </a>
      <a href="{{url('/')}}/contact-us" class="statement-btn wow fadeInRight" data-wow-delay="1s">
        Request Consultation &nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>



<!-- Partners -->
<section class="partners">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Title Section -->
            <div class="col-lg-12 col-md-12 wow animated fadeInRight" style="text-align: center">
                <div class="pq-section-title pq-style-1">
                    <span class="pq-section-sub-title">our partners</span>
                    <h5 class="pq-section-main-title" style="font-weight:900">backed by the best</h5>
                    <br><br>
                </div>
            </div>
            <!-- Right Button Section -->



            <!-- Partners Slider -->
            <div class="col-lg-12 wow animated fadeInLeft">
                <div class="pq-awardbox-1-slider pq-awardbox-1">
                    <div class="owl-carousel owl-loaded owl-drag"
                        data-dots="true"
                        data-nav="false"
                        data-desk_num="4"
                        data-lap_num="3"
                        data-tab_num="2"
                        data-mob_num="1"
                        data-mob_sm="1"
                        data-autoplay="true"
                        data-loop="true"
                        data-margin="30">

                        @foreach (['Edition 1-01.png','twyford.jpg','Noble-logo.png','Mothokinju.png','impala.png','cropped-logo.jpeg'] as $logo)
                        <div class="item">
                            <div class="pq-awardbox-1">
                                <a>
                                    <img decoding="async" src="{{asset('html/images/client/'.$logo)}}" alt="client logo">
                                    {{-- <span class="pq-award-title">trusted partner</span> --}}
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Partners -->


<!-- END: Final Statement Section -->
<section class="statement-section wow fadeInUp" data-wow-delay="0.3s" style="background-image: url('{{ asset('uploads/joint-ventures.jpg') }}');">
  <div class="statement-overlay">
    <div class="statement-content wow fadeIn" data-wow-delay="0.6s">
      <h2>Joint Ventures Vault</h2>
      <a href="{{url('/')}}/land-for-sale" class="statement-btn wow fadeInUp" data-wow-delay="0.9s">
        Explore Land Portfolio &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>




    <!-- Discover -->
    <section class="discover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 wow animated fadeInRight">
                    <div class="pq-section-title pq-style-1">
                        <span class="pq-section-sub-title">FAQ</span>
                        <h5 class="pq-section-main-title">Frequently Asked Questions</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 wow animated fadeInRight">
                    <div class="button-align">
                        <a class="pq-button pq-button-flat" href="portfolio.html">
                            <div class="pq-button-block">
                                <span class="pq-button-text">View More</span>
                                <span class="pq-button-line-right"></span>
                                <i class="ion ion-ios-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="divider pq-left-border pq-45"></div>
                </div>
                <div class="col-lg-12 wow fadeInUp">
                    <div class="pq-accordion-block pq-style-3">

                        <div class="pq-accordion-block">
                            <div class="pq-accordion-box pq-active 1">
                                <div class="pq-ad-title">
                                    <h4 class="ad-title-text">
                                        What services does Meglink Ventures provide?
                                        <i aria-hidden="true" class="ion ion-plus-round active"></i>
                                        <i aria-hidden="true" class="ion ion-minus-round inactive"></i>
                                    </h4>
                                </div>
                                <div class="pq-accordion-details">
                                    <p class="pq-detail-text">
                                        Meglink Ventures offers a wide range of digital solutions including web design, branding, hosting, content management, and SEO strategies to help businesses build strong online visibility.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pq-accordion-block">
                            <div class="pq-accordion-box 2">
                                <div class="pq-ad-title">
                                    <h4 class="ad-title-text">
                                        Can Meglink Ventures support startups as well as established companies?
                                        <i aria-hidden="true" class="ion ion-plus-round active"></i>
                                        <i aria-hidden="true" class="ion ion-minus-round inactive"></i>
                                    </h4>
                                </div>
                                <div class="pq-accordion-details">
                                    <p class="pq-detail-text">
                                        Absolutely. We provide tailored digital solutions for startups, SMEs, and established enterprises. Our goal is to meet each client at their point of need and scale solutions as they grow.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pq-accordion-block">
                            <div class="pq-accordion-box 3">
                                <div class="pq-ad-title">
                                    <h4 class="ad-title-text">
                                        Do you offer ongoing website maintenance?
                                        <i aria-hidden="true" class="ion ion-plus-round active"></i>
                                        <i aria-hidden="true" class="ion ion-minus-round inactive"></i>
                                    </h4>
                                </div>
                                <div class="pq-accordion-details">
                                    <p class="pq-detail-text">
                                        Yes, Meglink Ventures provides continuous website maintenance, updates, and security monitoring to ensure our clients’ platforms remain secure, functional, and optimized for performance.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pq-accordion-block">
                            <div class="pq-accordion-box 4">
                                <div class="pq-ad-title">
                                    <h4 class="ad-title-text">
                                        What makes Meglink Ventures different from other agencies?
                                        <i aria-hidden="true" class="ion ion-plus-round active"></i>
                                        <i aria-hidden="true" class="ion ion-minus-round inactive"></i>
                                    </h4>
                                </div>
                                <div class="pq-accordion-details">
                                    <p class="pq-detail-text">
                                        Our client-first approach, commitment to quality, and ability to provide custom-made solutions set us apart. We combine creativity with technology to deliver results-driven projects.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pq-accordion-block">
                            <div class="pq-accordion-box 5">
                                <div class="pq-ad-title">
                                    <h4 class="ad-title-text">
                                        How long does it take to complete a project?
                                        <i aria-hidden="true" class="ion ion-plus-round active"></i>
                                        <i aria-hidden="true" class="ion ion-minus-round inactive"></i>
                                    </h4>
                                </div>
                                <div class="pq-accordion-details">
                                    <p class="pq-detail-text">
                                        Project timelines vary depending on complexity. A typical web design project can take 3–6 weeks, while branding and smaller tasks may be completed faster. We always agree on timelines before starting.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pq-accordion-block">
                            <div class="pq-accordion-box 6">
                                <div class="pq-ad-title">
                                    <h4 class="ad-title-text">
                                        Do you help with SEO and online visibility?
                                        <i aria-hidden="true" class="ion ion-plus-round active"></i>
                                        <i aria-hidden="true" class="ion ion-minus-round inactive"></i>
                                    </h4>
                                </div>
                                <div class="pq-accordion-details">
                                    <p class="pq-detail-text">
                                        Yes, SEO and digital visibility are at the core of what we do. Meglink Ventures ensures that websites are optimized for search engines, helping businesses attract and retain the right audience online.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Discover -->
@endsection
