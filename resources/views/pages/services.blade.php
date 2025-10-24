@extends('layouts.master')

@section('content')

<section class="about-hero position-relative">
  <!-- Background Image -->
   <div class="about-hero-bg" style=" background-image: url('{{ asset('uploads/kitchen.jpg') }}');"></div>

  <!-- Overlay -->
  <div class="about-hero-overlay"></div>

  <!-- Text Content -->
  <div class="container position-relative about-hero-content">
    <h1 class="about-title">
      Our Services
      <span class="about-underline"></span>
    </h1>
  </div>
</section>
    {{--  --}}

<section class="intro-section wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.3s">
  <div class="intro-container">
    <div class="intro-text">
      <h2 class="wow fadeInDown" data-wow-delay="0.4s">Our Services</h2>
      <h4 class="wow fadeInUp" data-wow-delay="0.6s" style="color:#f37920">Experience Design At Its Majesty.</h4>

      <p class="wow fadeIn" data-wow-delay="0.8s" >
        Our Services highlight our expertise in creating functional
                        and stylish spaces. From residential to commercial projects,
                        we deliver bespoke interiors that blend aesthetics with
                        purpose, crafting environments that inspire and endure.
      </p>
      <a href="{{url('our-work')}}" class="intro-btn wow zoomIn" data-wow-delay="1s">
        Explore Portfolio &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>



     <!-- About Us -->
    <section class="about-us .pq-about-bg-color pq-bg-grey">

        <div class="container-fluid">
            <?php
                $Services = \App\Models\Service::all();
                $Count = 1;
            ?>
            @foreach ($Services as $service )
            @if ($Count % 2 !== 0)
            <div class="row">
                <div class="col-xl-6 padding-reset">
                    <div class="about-us-img">
                        <img src="{{ asset('storage/'.$service->image) }}" class="service-images pq-image1 wow animated fadeInLeft" alt="">
                    </div>
                </div>
                <div class="col-xl-6 pq-about-us-padding d-flex flex-column justify-content-center wow animated fadeInRight pq-about-bg-colors">
                    <div class="pq-section-title pq-style-1 pq-mb-35">
                         <h5  style="text-transform: capitalize; color:#f37920; font-weight:800;">{{$service->title}}</h5>

                        <p class="pq-section-description about-us-text text-black">
                            Our creative work is more than aesthetics; it is a narrative. We approach each space with a
                            singular vision, where interior design, architecture, and creative direction converge to create
                            environments that speak. Rooted in timeless elegance and modern sensibility, we craft spaces
                            that not only inspire but also embody the essence of those who inhabit them.
                        </p>
                        <p class="pq-section-description about-us-text text-black">
                            Innovation defines who we are. Through the fusion of advanced technology and collaborations
                            with world-class artisans, we reimagine interior spaces with unparalleled creativity. Harnessing
                            the power of ever evolving technology infused with industry-leading partnerships, we craft
                            environments that elevate everyday life, shaping a future where design and functionality meets
                            in perfect harmony.
                        </p>
                    </div>

                   <div class="d-flex justify-content-centers">
                        <a class="pq-button pq-button-flat pq-btn-white pq-mb-35" href="{{route('services')}}/{{$service->slung}}">
                            <div class="pq-button-block">
                                <span class="pq-button-text">Learn More </span>
                                <span class="pq-button-line-right"></span>
                                <i class="ion ion-ios-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @else
            {{--  --}}
            <div class="row">
                <div class="col-xl-6 pq-about-us-padding d-flex flex-column justify-content-center wow animated fadeInLeft pq-about-bg-colors">
                    <div class="pq-section-title pq-style-1 pq-mb-35">
                        <h5  style="text-transform: capitalize; color:#f37920; font-weight:800;">{{$service->title}}</h5>

                        <p class="pq-section-description about-us-text text-black service-text">
                            Our creative work is more than aesthetics; it is a narrative. We approach each space with a
                            singular vision, where interior design, architecture, and creative direction converge to create
                            environments that speak. Rooted in timeless elegance and modern sensibility, we craft spaces
                            that not only inspire but also embody the essence of those who inhabit them.
                        </p>
                        <p class="pq-section-description about-us-text text-black">
                            Innovation defines who we are. Through the fusion of advanced technology and collaborations
                            with world-class artisans, we reimagine interior spaces with unparalleled creativity. Harnessing
                            the power of ever evolving technology infused with industry-leading partnerships, we craft
                            environments that elevate everyday life, shaping a future where design and functionality meets
                            in perfect harmony.
                        </p>
                    </div>

                    <div class="d-flex justify-content-centers">
                        <a class="pq-button pq-button-flat pq-btn-white pq-mb-35" href="{{route('services')}}/{{$service->slung}}">
                            <div class="pq-button-block">
                                <span class="pq-button-text">Learn More </span>
                                <span class="pq-button-line-right"></span>
                                <i class="ion ion-ios-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 padding-reset">
                    <div class="about-us-img">
                        <img src="{{ asset('storage/'.$service->image) }}" class="service-images pq-image1 wow animated fadeInRight" alt="">
                    </div>
                </div>
            </div>
            @endif
            <?php $Count++; ?>
            @endforeach
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


@endsection
