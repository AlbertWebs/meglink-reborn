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

    /* Enhanced About Intro */
    .about-intro-section {
        padding: 100px 0 80px;
        background: #ffffff;
    }
    .about-intro-section .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(16, 19, 24, 0.6);
        margin-bottom: 16px;
        display: block;
    }
    .about-intro-section h2 {
        font-size: 42px;
        font-weight: 800;
        margin: 0 0 20px;
        color: #101318;
        line-height: 1.2;
    }
    .about-intro-section h4 {
        font-size: 24px;
        font-weight: 700;
        color: #f37920;
        margin-bottom: 24px;
    }
    .about-intro-section p {
        color: #5c6570;
        font-size: 18px;
        line-height: 1.8;
        margin-bottom: 32px;
    }

    /* Principles Section */
    .principles-section {
        padding: 80px 0;
        background: #f7f4ef;
    }
    .principles-header {
        margin-bottom: 60px;
    }
    .principles-header .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(16, 19, 24, 0.6);
        margin-bottom: 12px;
        display: block;
    }
    .principles-header h2 {
        font-size: 38px;
        font-weight: 800;
        margin: 0 0 16px;
        color: #101318;
    }
    .principles-header p {
        color: #5c6570;
        font-size: 16px;
        line-height: 1.7;
        max-width: 600px;
    }
    .principle-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px;
        height: 100%;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.08);
        border: 1px solid rgba(16, 19, 24, 0.08);
        transition: all 0.3s ease;
    }
    .principle-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(16, 19, 24, 0.12);
    }
    .principle-number {
        font-size: 64px;
        font-weight: 800;
        color: rgba(243, 121, 32, 0.15);
        line-height: 1;
        margin-bottom: 16px;
    }
    .principle-card h5 {
        font-size: 24px;
        font-weight: 800;
        margin: 0 0 16px;
        color: #101318;
    }
    .principle-card p {
        color: #5c6570;
        line-height: 1.7;
        margin: 0;
    }

    /* About Content Section */
    .about-content-section {
        padding: 80px 0;
        background: #ffffff;
    }
    .about-content-section h2 {
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 24px;
        color: #101318;
    }
    .about-content-section .about-image img {
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(16, 19, 24, 0.15);
    }
    .about-content-section .about-text p {
        color: #5c6570;
        line-height: 1.8;
        font-size: 16px;
        margin-bottom: 20px;
    }

    /* Team Section */
    .team-section {
        padding: 80px 0;
        background: #ffffff;
    }
    .team-section-header {
        margin-bottom: 60px;
    }
    .team-section-header .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(16, 19, 24, 0.6);
        margin-bottom: 12px;
        display: block;
    }
    .team-section-header h2 {
        font-size: 38px;
        font-weight: 800;
        margin: 0 0 16px;
        color: #101318;
    }
    .team-card {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.1);
        transition: all 0.4s ease;
        height: 100%;
    }
    .team-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(16, 19, 24, 0.2);
    }
    .team-card-image {
        position: relative;
        height: 320px;
        overflow: hidden;
    }
    .team-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .team-card:hover .team-card-image img {
        transform: scale(1.1);
    }
    .team-card-social {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(16, 19, 24, 0.9), transparent);
        padding: 20px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .team-card:hover .team-card-social {
        opacity: 1;
    }
    .team-card-social ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 12px;
        justify-content: center;
    }
    .team-card-social a {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    .team-card-social a:hover {
        background: #f37920;
        transform: scale(1.1);
    }
    .team-card-body {
        padding: 28px;
        text-align: center;
    }
    .team-card-body h5 {
        font-size: 20px;
        font-weight: 800;
        margin: 0 0 8px;
        color: #101318;
    }
    .team-card-body span {
        color: #5c6570;
        font-size: 14px;
    }

    @media (max-width: 991px) {
        .about-intro-section {
            padding: 70px 0 60px;
        }
        .about-intro-section h2 {
            font-size: 32px;
        }
        .principles-section,
        .about-content-section,
        .team-section {
            padding: 60px 0;
        }
    }
</style>

<!-- START: Responsive About Us Hero Section -->
<section class="about-hero position-relative zoom-scroll-section">
    <!-- Background Image -->
    <div class="about-hero-bg" style="background-image: url('{{ asset('uploads/Renders-interiores-scaled.webp') }}');"></div>

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

<section class="about-intro-section zoom-scroll-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="eyebrow">Our Story</span>
                <h2>About Us</h2>
                <h4>Experience Design At Its Majesty.</h4>
                <p>
                    Founded in 2008 as an interior design outlet studio, the Nairobi-based company has
                    evolved into an interdisciplinary regional lifestyle brand that is leading the
                    contemporary Interior design consulting and contracting conversation with experiential
                    residential, hospitality, commercial and retail industry with an expansive portfolio of home
                    product designs and brand collaborations.
                </p>
                <a href="{{ route('services') }}" class="btn btn-orange btn-lg">
                    Explore Services &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Principles Section -->
<section class="principles-section zoom-scroll-section">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-8">
                <div class="principles-header">
                    <span class="eyebrow">Our Principles</span>
                    <h2>What does Meglink stand for?</h2>
                    <p>
                        These three words represent who we are today, they are aspirational of who we want to be
                        in the future and drive us to all make better decisions in how we work, what we build and
                        how we engage with our clients.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('services') }}" class="btn btn-outline-dark btn-lg">
                    View More <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="principle-card">
                    <div class="principle-number">01</div>
                    <h5>INNOVATION.</h5>
                    <p>
                        We use innovative technology to help us solve the ever evolving construction
                        problems. This means we: Improve efficiency & We are aspirational
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="principle-card">
                    <div class="principle-number">02</div>
                    <h5>QUALITY.</h5>
                    <p>
                        We emphasize great craftsmanship right from the early stages of design
                        to completion of a project.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="principle-card">
                    <div class="principle-number">03</div>
                    <h5>COLLABORATION.</h5>
                    <p>
                        It's in everything we do. We collaborate within our team, with our
                        clients, and with all of our and suppliers. Everybody's ideas
                        count. Everybody has a voice.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- START: About Content Section -->
<section class="about-content-section zoom-scroll-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left: Image -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about-image">
                    <img src="{{ asset('uploads/Renders-interiores-scaled.webp') }}" alt="About Image" class="img-fluid">
                </div>
            </div>

            <!-- Right: Writeups -->
            <div class="col-lg-6">
                <div class="about-text">
                    <h2>Building Timeless Spaces That Inspire</h2>
                    <div class="orange-divider mb-4"></div>
                    <p>
                        Our creative work is more than aesthetics; it is a narrative. We approach each space with a
                        singular vision, where interior design, architecture, and creative direction converge to create
                        environments that speak. Rooted in timeless elegance and modern sensibility, we craft spaces
                        that not only inspire but also embody the essence of those who inhabit them.
                    </p>
                    <p>
                        Innovation defines who we are. Through the fusion of advanced technology and collaborations
                        with world-class artisans, we reimagine interior spaces with unparalleled creativity. Harnessing
                        the power of ever evolving technology infused with industry-leading partnerships, we craft
                        environments that elevate everyday life, shaping a future where design and functionality meets
                        in perfect harmony.
                    </p>
                    <a href="{{ url('/team') }}" class="btn btn-lg btn-orange">
                        Meet Our Team
                        <i class="fas fa-arrow-right ms-2"></i>
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
<section class="team-section zoom-scroll-section" id="team">
    <div class="container">
        <div class="team-section-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <span class="eyebrow">Our Team</span>
                    <h2>Our Best Team Expert</h2>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{url('/')}}/our-work" class="btn btn-outline-dark btn-lg">
                        Our Portfolio <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @foreach($teams as $team)
                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-card-image">
                            <img src="{{ asset('storage/'.$team->image) }}" alt="{{ $team->name }}">
                            <div class="team-card-social">
                                <ul>
                                    @if($team->instagram)
                                        <li><a href="{{ $team->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                    @if($team->twitter)
                                        <li><a href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if($team->linkedin)
                                        <li><a href="{{ $team->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="team-card-body">
                            <h5>{{ $team->name }}</h5>
                            <span>{{ $team->designation }}</span>
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
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
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
