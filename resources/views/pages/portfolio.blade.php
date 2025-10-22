@extends('layouts.master-renders')


@section('content')
    <section class="about-hero position-relative">
        <!-- Background Image -->
        <div class="about-hero-bg" style=" background-image: url('{{ asset('uploads/kitchen.jpg') }}');"></div>

        <!-- Overlay -->
        <div class="about-hero-overlay"></div>

        <!-- Text Content -->
        <div class="container position-relative about-hero-content">
            <h1 class="about-title">
                Our Portfolio
                <span class="about-underline"></span>
            </h1>
        </div>
    </section>

    <section class="intro-section wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.3s">
        <div class="intro-container">
            <div class="intro-text">
                <h2 class="wow fadeInDown" data-wow-delay="0.4s">Our Work</h2>
                <h4 class="wow fadeInUp" data-wow-delay="0.6s" style="color:#f37920">Experience Design At Its Majesty.</h4>

                <p class="wow fadeIn" data-wow-delay="0.8s">
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
                <a href="{{ url('/') }}/contact-us" class="intro-btn wow zoomIn" data-wow-delay="1s">
                    Contact Us &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- START: Renders Gallery Section -->
    <section class="renders-gallery py-5 bg-light">
        <div class="container">

            <div class="row g-4 popup-gallery">
                @forelse($Portfolio as $render)
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item position-relative overflow-hidden">
                            <a href="{{ asset('storage/' . $render->image) }}" title="{{ $render->title }}">
                                <img src="{{ asset('storage/' . $render->image) }}" alt="{{ $render->title }}"
                                    class="img-fluid rounded" style="height: 320px; object-fit: cover;">
                                <div class="gallery-overlay position-absolute bottom-0 start-0 w-100 p-3"
                                    style="background: rgba(0,0,0,0.6); color: #f37920;">
                                    <h5 class="m-0 fw-semibold text-white">{{ $render->title }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No renders available at the moment. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- END: Renders Gallery Section -->
@endsection
