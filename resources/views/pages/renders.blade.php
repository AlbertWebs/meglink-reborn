@extends('layouts.master-renders')

@section('content')
<section class="intro-section wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.3s">
  <div class="intro-container">
    <div class="intro-text">
      <h2 class="wow fadeInDown" data-wow-delay="0.4s">Meglink Renders</h2>
      <h4 class="wow fadeInUp" data-wow-delay="0.6s">Leading Interior Designer in Kenya</h4>

      <p class="wow fadeIn" data-wow-delay="0.8s">
        {{--  --}}
Meglink Ventures specializes in creating bespoke, high-end interiors that are a true reflection of your personality and lifestyle. We believe that exceptional design is functional, elegant, and enduring. From initial concept development to the final handover, our dedicated team manages every detail—ensuring a seamless, stress-free process and a stunning final result that elevates your living or working environment into a genuine masterpiece.
        {{--  --}}
      </p>
      <a href="#services" class="intro-btn wow zoomIn" data-wow-delay="1s">
        Explore Portfolio &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>



<!-- START: Renders Gallery Section -->
<section class="renders-gallery py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-6 fw-bold">Our Architectural Renders</h2>
      <p class="text-muted">Explore our collection of high-quality 3D renders that bring designs to life.</p>
    </div>

    <div class="row g-4 popup-gallery">
      @forelse($renders as $render)
      <div class="col-lg-4 col-md-6">
        <div class="gallery-item position-relative overflow-hidden">
          <a href="{{ asset('storage/' . $render->image) }}" title="{{ $render->title }}">
            <img src="{{ asset('storage/' . $render->image) }}" alt="{{ $render->title }}" class="img-fluid rounded" style="height: 320px; object-fit: cover;">
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


<!-- END: Renders Gallery Section -->



@endsection
