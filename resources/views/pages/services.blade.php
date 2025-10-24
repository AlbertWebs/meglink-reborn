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

<style>
    .our-process-cards {
        background: #ffffff;
    }

    .section-subtitle {
        color: #f37920;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        margin-bottom: 10px;
        display: block;
    }

    .section-title {
        color: #2c3e50;
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .section-description {
        color: #6c757d;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    .process-card {
        background: white;
        padding: 40px 30px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid #f0f0f0;
        transition: all 0.3s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .process-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #f37920, #e56a10);
    }

    .process-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card-icon {
        position: relative;
        margin-bottom: 25px;
    }

    .icon-wrapper {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #f37920, #e56a10);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        color: white;
        font-size: 2.5rem;
        box-shadow: 0 10px 20px rgba(243, 121, 32, 0.3);
    }

    .step-badge {
        position: absolute;
        top: -10px;
        right: -10px;
        background: #2c3e50;
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        border: 3px solid white;
    }

    .process-card h5 {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 1.3rem;
        min-height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .process-card p {
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 20px;
        min-height: 120px;
    }

    .card-features {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .card-features span {
        background: #f8f9fa;
        padding: 8px 15px;
        border-radius: 25px;
        color: #495057;
        font-size: 0.85rem;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .process-card:hover .card-features span {
        background: #f37920;
        color: white;
        border-color: #f37920;
    }

    /* Process Summary */
    .process-summary {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 40px;
        border-radius: 15px;
        border-left: 4px solid #f37920;
    }

    .summary-title {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .summary-text {
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 0;
    }

    .btn-orange {
        background: linear-gradient(135deg, #f37920, #e56a10);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-orange:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(243, 121, 32, 0.3);
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .process-card {
            margin-bottom: 30px;
        }

        .process-card h5 {
            min-height: auto;
        }

        .process-card p {
            min-height: auto;
        }

        .process-summary {
            text-align: center;
            padding: 30px 20px;
        }

        .process-summary .col-lg-4 {
            margin-top: 20px;
        }
    }

    @media (max-width: 576px) {
        .section-title {
            font-size: 2rem;
        }

        .process-card {
            padding: 30px 20px;
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }
    }
</style>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


@endsection
