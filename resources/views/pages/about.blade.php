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
    .zoom-scroll-section:nth-child(4) { transition-delay: 0.4s; }
    .zoom-scroll-section:nth-child(5) { transition-delay: 0.5s; }
    .zoom-scroll-section:nth-child(6) { transition-delay: 0.6s; }
</style>

<!-- START: Responsive About Us Hero Section -->
<section class="about-hero position-relative zoom-scroll-section">
  <!-- Background Image -->
  <div class="about-hero-bg" style=" background-image: url('{{ asset('uploads/Renders-interiores-scaled.webp') }}');"></div>

  <!-- Overlay -->
  <div class="about-hero-overlay"></div>

  <!-- Text Content -->
  <div class="container position-relative about-hero-content">
    <h1 class="about-title">
      About Us
      <span class="about-underline"></span>
    </h1>
  </div>
</section>

<section class="intro-section zoom-scroll-section">
  <div class="intro-container">
    <div class="intro-text">
      <h2>About Us</h2>
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
      <a href="#services" class="intro-btn">
        Explore Services &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<!-- Award -->
<section class="award pq-bg-grey zoom-scroll-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="pq-sticky-top">
                    <div class="pq-section-title pq-style-1 pq-mb-45">
                        <span class="pq-section-sub-title">our Priniciples</span>
                        <h5 class="pq-section-main-title" style="font-weight:800;">What does Meglink stand for?</h5>
                        <p>
                            These three words represent who we are today, they are aspirational of who we want to be
                            in the future and drive us to all make better decisions in how we work, what we build and
                            how we engage with our clients.
                        </p>
                    </div>
                    <a class="pq-button pq-button-flat" href="{{route('services')}}">
                        <div class="pq-button-block">
                            <span class="pq-button-text">view More </span>
                            <span class="pq-button-line-right"></span>
                            <i class="ion ion-ios-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-8 mt-4 mt-xl-0">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="pq-service-box pq-style-2 text-left">
                            <div class="pq-service-info">
                                <div class="pq-service-content">
                                    <div class="pq-service-number">
                                        01 </div>
                                    <h5 class="pq-service-title" style="font-weight:700;">INNOVATION.</h5>
                                </div>
                                <div class="pq-service-description">
                                    <p>
                                        We use innovative technology
                                        to help us solve the ever
                                        evolving construction
                                        problems.
                                        This means we: Improve efficiency & We are aspirational
                                    </p>
                                </div>
                                <div class="pq-btn-container">
                                    <a class="pq-button pq-button-link" href="about-us.html">
                                        <div class="pq-button-block">
                                            <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52"
                                                    viewBox="0 0 64.356 36.52">
                                                    <g transform="translate(-6.444 -1.74)">
                                                        <g data-name="Group 2">
                                                            <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1"
                                                                opacity="0.5"></circle>
                                                            <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1">
                                                            </circle>
                                                        </g>
                                                        <path data-name="Path 1"
                                                            d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                            fill="#30373f"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="pq-service-box pq-style-2 text-left">
                            <div class="pq-service-info">
                                <div class="pq-service-content">
                                    <div class="pq-service-number">
                                        02 </div>
                                    <h5 class="pq-service-title" style="font-weight:700;">QUALITY.</h5>
                                </div>
                                <div class="pq-service-description">
                                    <p>
                                    We emphasize great
                                    craftsmanship right from
                                    the early stages of design
                                    to completion of a
                                    project.
                                    </p>
                                </div>
                                <div class="pq-btn-container">
                                    <a class="pq-button pq-button-link" href="about-us.html">
                                        <div class="pq-button-block">
                                            <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52"
                                                    viewBox="0 0 64.356 36.52">
                                                    <g transform="translate(-6.444 -1.74)">
                                                        <g data-name="Group 2">
                                                            <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1"
                                                                opacity="0.5"></circle>
                                                            <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1">
                                                            </circle>
                                                        </g>
                                                        <path data-name="Path 1"
                                                            d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                            fill="#30373f"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="pq-service-box pq-style-2 text-left">
                            <div class="pq-service-info">
                                <div class="pq-service-content">
                                    <div class="pq-service-number">
                                        03 </div>
                                    <h5 class="pq-service-title" style="font-weight:700;">COLLABORATION.</h5>
                                </div>
                                <div class="pq-service-description">
                                    <p>
                                        It's in everything we do.
                                        We collaborate within
                                        our team, with our
                                        clients, and with all of
                                        our and suppliers.
                                        Everybody's ideas
                                        count. Everybody has a
                                        voice.
                                    </p>
                                </div>
                                <div class="pq-btn-container">
                                    <a class="pq-button pq-button-link" href="about-us.html">
                                        <div class="pq-button-block">
                                            <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52"
                                                    viewBox="0 0 64.356 36.52">
                                                    <g transform="translate(-6.444 -1.74)">
                                                        <g data-name="Group 2">
                                                            <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1"
                                                                opacity="0.5"></circle>
                                                            <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1">
                                                            </circle>
                                                        </g>
                                                        <path data-name="Path 1"
                                                            d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                            fill="#30373f"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<!-- Award -->

<!-- START: About Content Section -->
<section class="about-content-section py-5 zoom-scroll-section">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left: Image -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="about-image">
          <img src="{{ asset('uploads/Renders-interiores-scaled.webp') }}" alt="About Image" class="img-fluid rounded shadow">
        </div>
      </div>

      <!-- Right: Writeups -->
      <div class="col-lg-6">
        <div class="about-text">
          <h2 class="fw-bold mb-3">Building Timeless Spaces That Inspire</h2>
          <div class="orange-divider mb-4"></div>
          <p class="text-black intro-text mb-4">
           {{--  --}}
                Our creative work is more than aesthetics; it is a narrative. We approach each space with a
                singular vision, where interior design, architecture, and creative direction converge to create
                environments that speak. Rooted in timeless elegance and modern sensibility, we craft spaces
                that not only inspire but also embody the essence of those who inhabit them.
           {{--  --}}
          </p>
          <p class="text-black intro-text mb-4">
            Innovation defines who we are. Through the fusion of advanced technology and collaborations
            with world-class artisans, we reimagine interior spaces with unparalleled creativity. Harnessing
            the power of ever evolving technology infused with industry-leading partnerships, we craft
            environments that elevate everyday life, shaping a future where design and functionality meets
            in perfect harmony.
          </p>
          <a href="{{ url('/services') }}" class="btn btn-lg btn-orange">
            Meet Our Team
             <span class="pq-button-line-right"></span>
            <i class="ion ion-ios-arrow-right"></i>
          </a>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- END: Final Statement Section -->
<section class="statement-section zoom-scroll-section" style="background-image: url('{{ asset('uploads/joint-ventures.jpg') }}');">
  <div class="statement-overlay">
    <div class="statement-content">
      <h2>Joint Ventures Vault</h2>
      <a href="{{url('/')}}/land-for-sale" class="statement-btn">
        Explore Land Portfolio &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

  <!-- Team -->
    <section class="team zoom-scroll-section" id="team">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8">
                    <div class="pq-section-title pq-style-1">
                        <span class="pq-section-sub-title">Our Team</span>
                        <h5 class="pq-section-main-title">Our Best Team Expert</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="button-align">
                        <a class="pq-button pq-button-flat" href="{{url('/')}}/our-work">
                            <div class="pq-button-block">
                                <span class="pq-button-text">Our Portfolio </span>
                                <span class="pq-button-line-right"></span>
                                <i class="ion ion-ios-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="divider pq-left-border2 pq-right-border pq-45"></div>
                </div>
               @foreach($teams as $team)
                    <div class="col-lg-4 col-md-6">
                        <div class="pq-team pq-team-style-1">
                            <div class="pq-team-box">
                                <div class="pq-team-img">
                                    <img src="{{ asset('storage/'.$team->image) }}" alt="{{ $team->name }}">
                                    <div class="pq-team-social">
                                        <ul>
                                            @if($team->instagram)
                                                <li><a href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                            @endif
                                            @if($team->twitter)
                                                <li><a href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                            @endif
                                            @if($team->linkedin)
                                                <li><a href="{{ $team->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="pq-team-info">
                                    <h5 class="pq-member-name">{{ $team->name }}</h5>
                                    <span class="pq-team-designation">{{ $team->designation }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Team -->

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
