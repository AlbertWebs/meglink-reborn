@extends('layouts.master')

@section('content')

    <!-- Banner -->
    @include('components.full-homepage-banner')
    <!-- Banner -->

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

<!-- START: Intro Section -->
<section class="intro-section zoom-scroll-section">
  <div class="intro-container">
    <div class="intro-text">
      <h2 style="color:#f37920; font-weight:900">Meglink Ventures</h2>
      <h4>Leading Interior Designer in Kenya</h4>

      <p>
        Meglink Ventures is a leading interior design company in Kenya. We specialize in creating timeless, functional, and elegant interior spaces that reflect your personality and lifestyle.
        From concept to completion, our team delivers bespoke designs that transform every room into a masterpiece.
      </p>
      <a href="#services" class="intro-btn">
        Explore Services &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<!-- START: Full Width Statement Section -->
<section class="statement-section zoom-scroll-section" style="background-image: url('{{ asset('uploads/palour.jpg') }}');">
  <div class="statement-overlay">
    <div class="statement-content">
      <h2>Creating Timeless Spaces That Inspire</h2>
      <a href="#collection" class="statement-btn">
        Explore Collection &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<!-- START: Image Grid Section -->
<section class="image-grid-section zoom-scroll-section" id="services">
  <div class="image-grid">
    <!-- Item 1 -->
    <div class="image-item" style="background-image: url('{{ asset('uploads/living.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Living Room Designs</h3>
        <a href="{{url('/')}}/our-work/floor-finish" class="btn-explore">Explore Collection</a>
      </div>
    </div>

    <!-- Item 2 -->
    <div class="image-item" style="background-image: url('{{ asset('uploads/kitchen.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Luxury Kitchens</h3>
        <a href="{{url('/')}}/our-work/kitchens-and-kitchenettes" class="btn-explore">Explore Collection</a>
      </div>
    </div>

    <!-- Item 3 -->
    <div class="image-item" style="background-image: url('{{ asset('uploads/bedroom.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Bedroom Spaces</h3>
        <a href="{{url('/')}}/our-work/wardrobes" class="btn-explore">Explore Collection</a>
      </div>
    </div>

    <!-- Item 4 -->
    <div class="image-item" style="background-image: url('{{ asset('uploads/outdoor.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Outdoor Inspirations</h3>
        <a href="#" class="btn-explore">Explore Collection</a>
      </div>
    </div>

      <!-- Item 5 -->
    <div class="image-item" style="background-image: url('{{ asset('uploads/staircases.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Premium Staircases</h3>
        <a href="{{url('/')}}/our-work/floor-finish" class="btn-explore">Explore Collection</a>
      </div>
    </div>

    <!-- Item 6 -->
    <div class="image-item" style="background-image: url('{{ asset('uploads/wardrobes.jpg') }}');">
      <div class="overlay"></div>
      <div class="content">
        <h3>Wardrobes</h3>
        <a href="{{url('/')}}/our-work/wardrobes" class="btn-explore">Explore Collection</a>
      </div>
    </div>
  </div>
</section>

<!-- START: Renders Section -->
<section class="statement-section-center zoom-scroll-section" style="background-image: url('{{ asset('uploads/Renders-interiores-scaled.webp') }}');">
  <div class="statement-overlay-center">
    <div class="statement-content-center">
      <h1 class="italized">Interior Design Consulting & Contracting</h1>
      <h2>Designing Experiences That Endure</h2>
      <a href="{{url('/')}}/renders" class="statement-btn">
        Explore Renders &nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
      </a>
      <a href="{{url('/')}}/contact-us" class="statement-btn">
        Request Consultation &nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>



<!-- Partners -->
 <section class="team zoom-scroll-section" id="team">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 wow animated fadeInRight">
                    <div class="pq-section-title pq-style-1">
                        <span class="pq-section-sub-title">Our Team</span>
                        <h5 class="pq-section-main-title">Behind The Scenes</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 wow animated fadeInRight">
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
                    <div class="col-lg-4 col-md-6 wow animated fadeInUp">
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
<!-- Partners -->


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



<!-- Award -->
<section class="award pq-bg-grey zoom-scroll-section">
    <div class="container">
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

        // Optional: Add scroll velocity-based zoom (more dramatic effect)
        let lastScrollY = window.scrollY;
        let ticking = false;

        function updateZoomOnScroll() {
            const currentScrollY = window.scrollY;
            const scrollDelta = currentScrollY - lastScrollY;

            zoomSections.forEach(section => {
                if (section.classList.contains('zoom-visible')) {
                    // Subtle scale effect based on scroll velocity
                    const scale = 1 + Math.min(Math.abs(scrollDelta) * 0.0005, 0.05);
                    section.style.transform = `scale(${scale})`;

                    // Reset after a short delay
                    setTimeout(() => {
                        if (section.classList.contains('zoom-visible')) {
                            section.style.transform = 'scale(1)';
                        }
                    }, 100);
                }
            });

            lastScrollY = currentScrollY;
            ticking = false;
        }

        function onScroll() {
            if (!ticking) {
                requestAnimationFrame(updateZoomOnScroll);
                ticking = true;
            }
        }

        // Uncomment for scroll velocity effect (more dramatic)
        // window.addEventListener('scroll', onScroll);
    });

    // Fallback for older browsers
    if (!window.IntersectionObserver) {
        document.querySelectorAll('.zoom-scroll-section').forEach(section => {
            section.classList.add('zoom-visible');
        });
    }
</script>

@endsection
