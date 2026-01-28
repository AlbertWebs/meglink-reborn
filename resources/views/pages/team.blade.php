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

    /* Team Hero */
    .team-hero {
        padding: 100px 0 80px;
        background: linear-gradient(135deg, #101318 0%, #1a1f28 100%);
        color: #ffffff;
    }
    .team-hero .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 16px;
        display: block;
    }
    .team-hero h1 {
        font-size: 48px;
        font-weight: 800;
        margin: 0 0 20px;
        color: #ffffff;
        line-height: 1.2;
    }
    .team-hero p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 18px;
        max-width: 700px;
    }

    /* Team Section */
    .team-section {
        padding: 80px 0;
        background: #ffffff;
    }
    .team-section-header {
        margin-bottom: 60px;
        text-align: center;
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
        font-size: 42px;
        font-weight: 800;
        margin: 0 0 16px;
        color: #101318;
    }
    .team-section-header p {
        color: #5c6570;
        font-size: 16px;
        max-width: 600px;
        margin: 0 auto;
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
        height: 360px;
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
        background: linear-gradient(to top, rgba(16, 19, 24, 0.95), rgba(16, 19, 24, 0.7), transparent);
        padding: 24px;
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
        width: 44px;
        height: 44px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        font-size: 18px;
    }
    .team-card-social a:hover {
        background: #f37920;
        transform: scale(1.15);
    }
    .team-card-body {
        padding: 32px;
        text-align: center;
    }
    .team-card-body h5 {
        font-size: 22px;
        font-weight: 800;
        margin: 0 0 8px;
        color: #101318;
    }
    .team-card-body span {
        color: #5c6570;
        font-size: 15px;
        font-weight: 500;
    }

    @media (max-width: 991px) {
        .team-hero {
            padding: 70px 0 60px;
        }
        .team-hero h1 {
            font-size: 36px;
        }
        .team-section {
            padding: 60px 0;
        }
        .team-section-header h2 {
            font-size: 32px;
        }
    }
</style>

<section class="about-hero position-relative zoom-scroll-section">
    <!-- Background Image -->
    <div class="about-hero-bg" style="background-image: url('{{ asset('uploads/Renders-interiores-scaled.webp') }}');"></div>

    <!-- Overlay -->
    <div class="about-hero-overlay"></div>

    <!-- Text Content -->
    <div class="container position-relative about-hero-content">
        <h1 class="about-title">
            Our Team
            <span class="about-underline"></span>
        </h1>
    </div>
</section>

<section class="team-section zoom-scroll-section">
    <div class="container">
        <div class="team-section-header">
            <span class="eyebrow">Meet Our Experts</span>
            <h2>Our Best Team Expert</h2>
            <p>Talented professionals dedicated to creating exceptional interior spaces that reflect your vision and lifestyle.</p>
        </div>
        <div class="row g-4">
            @forelse($teams as $team)
                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-card-image">
                            <img src="{{ asset('storage/'.$team->image) }}" alt="{{ $team->name }}">
                            <div class="team-card-social">
                                <ul>
                                    @if($team->instagram)
                                        <li><a href="{{ $team->instagram }}" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                    @if($team->twitter)
                                        <li><a href="{{ $team->twitter }}" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if($team->linkedin)
                                        <li><a href="{{ $team->linkedin }}" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
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
            @empty
                <div class="col-12 text-center">
                    <div style="padding: 80px 20px;">
                        <i class="fas fa-users" style="font-size: 64px; color: #e9ecef; margin-bottom: 20px;"></i>
                        <h4 style="color: #5c6570; margin-bottom: 12px;">No Team Members Yet</h4>
                        <p class="text-muted">Check back soon to meet our team!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

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
