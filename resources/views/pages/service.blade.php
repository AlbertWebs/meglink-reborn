@extends('layouts.master')

@section('content')

<section class="about-hero position-relative">
  <!-- Background Image -->
   <div class="about-hero-bg" style=" background-image: url('{{ asset('storage/'.$service->image) }}');"></div>

  <!-- Overlay -->
  <div class="about-hero-overlay"></div>

  <!-- Text Content -->
  <div class="container position-relative about-hero-content">
    <h1 class="about-title">
      {{$service->title}}
      <span class="about-underline"></span>
    </h1>
  </div>
</section>
<style>
  .service-intro {
    padding: 80px 0 70px;
    background: #ffffff;
  }
  .service-intro .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.55);
  }
  .service-intro h2 {
    font-size: 38px;
    font-weight: 800;
    margin: 12px 0 16px;
  }
  .service-intro p {
    color: #5c6570;
    line-height: 1.8;
  }
  .service-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 24px;
  }
  .service-summary {
    background: #101318;
    color: #ffffff;
    padding: 36px;
    border-radius: 18px;
    box-shadow: 0 18px 35px rgba(16, 19, 24, 0.2);
  }
  .service-summary h5 {
    font-weight: 700;
    margin-bottom: 10px;
    color: #ffffff;
  }
  .service-summary p {
    color: rgba(255, 255, 255, 0.75);
    margin-bottom: 0;
  }
  .service-detail {
    padding: 70px 0;
    background: #f7f4ef;
  }
  .service-detail .image-frame {
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 24px 40px rgba(16, 19, 24, 0.12);
  }
  .service-detail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .service-content-card {
    background: #ffffff;
    border-radius: 22px;
    padding: 36px;
    box-shadow: 0 18px 35px rgba(16, 19, 24, 0.08);
  }
  .service-content-card h4 {
    font-weight: 800;
    margin-bottom: 12px;
  }
  .deliverables {
    padding: 80px 0;
    background: #ffffff;
  }
  .deliverable-card {
    background: #f9f9f7;
    border-radius: 18px;
    padding: 26px;
    height: 100%;
    border: 1px solid rgba(16, 19, 24, 0.08);
  }
  .deliverable-card h5 {
    font-weight: 700;
    margin-bottom: 10px;
  }
  .service-timeline {
    background: #101318;
    color: #ffffff;
    padding: 80px 0;
  }
  .service-timeline h2,
  .service-timeline h5,
  .service-timeline p {
    color: rgba(255, 255, 255, 0.88);
  }
  .service-timeline h2 {
    color: #ffffff;
  }
  .timeline-step {
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 18px;
    padding: 24px;
    height: 100%;
    background: rgba(255, 255, 255, 0.05);
  }
  .timeline-step span {
    font-size: 12px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.6);
  }
  .related-services {
    padding: 70px 0 90px;
    background: #ffffff;
  }
  .related-card {
    background: #f7f4ef;
    border-radius: 18px;
    padding: 22px;
    height: 100%;
  }
  @media (max-width: 991px) {
    .service-intro h2 {
      font-size: 32px;
    }
    .service-summary {
      margin-top: 24px;
    }
  }
</style>

@php
  $serviceSummary = $service->meta ? strip_tags($service->meta) : '';
  $serviceSummary = \Illuminate\Support\Str::length($serviceSummary) > 30
    ? $serviceSummary
    : 'We deliver tailored interior solutions with disciplined craft and modern execution.';
  $serviceBody = $service->content ? $service->content : '<p>Our team crafts custom solutions that balance aesthetics, durability, and function for every space.</p>';
  $relatedServices = \App\Models\Service::where('id', '!=', $service->id)->take(3)->get();
@endphp

<section class="service-intro">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="eyebrow">Service Detail</span>
        <h2>{{ $service->title }}</h2>
        <p>{{ $serviceSummary }}</p>
        <div class="service-actions">
          <a href="{{ url('/contact-us') }}" class="btn btn-orange">Book Consultation</a>
          <a href="{{ url('our-work') }}" class="btn btn-outline-dark">See Portfolio</a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="service-summary">
          <h5>What you get</h5>
          <p>Design guidance, curated materials, precise installation, and a finished space that fits your lifestyle.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="service-detail">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6">
        <div class="image-frame">
          <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="service-content-card">
          <h4>Designed for enduring quality.</h4>
          <div class="service-body">
            {!! $serviceBody !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="deliverables">
  <div class="container">
    <div class="row align-items-end mb-4">
      <div class="col-lg-6">
        <span class="eyebrow">Deliverables</span>
        <h2>Everything needed for a complete finish.</h2>
      </div>
      <div class="col-lg-6">
        <p>We align material selection, detailing, and on-site coordination to keep the delivery precise and consistent.</p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="deliverable-card">
          <h5>Material Guidance</h5>
          <p>Curated options and durability checks that match your lifestyle and budget.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="deliverable-card">
          <h5>Installation Precision</h5>
          <p>Skilled installation teams maintain clean edges, consistent finishes, and lasting performance.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="deliverable-card">
          <h5>On-Site Oversight</h5>
          <p>We coordinate trades, check quality, and ensure every detail aligns with the approved plan.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="service-timeline">
  <div class="container">
    <div class="row align-items-end mb-4">
      <div class="col-lg-7">
        <span class="eyebrow">How We Work</span>
        <h2>Clear steps, refined outcomes.</h2>
      </div>
      <div class="col-lg-5">
        <p>From early discovery to final installation, we guide the process with clarity and pace.</p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="timeline-step">
          <span>Step 01</span>
          <h5>Consult & Plan</h5>
          <p>We capture requirements, site conditions, and desired finish levels.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="timeline-step">
          <span>Step 02</span>
          <h5>Spec & Source</h5>
          <p>Materials and detailing are confirmed with transparent recommendations.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="timeline-step">
          <span>Step 03</span>
          <h5>Build & Install</h5>
          <p>Our team executes with quality checks at each milestone.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="timeline-step">
          <span>Step 04</span>
          <h5>Final Review</h5>
          <p>We walk the space with you to confirm every finish is complete.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="related-services">
  <div class="container">
    <div class="row align-items-end mb-4">
      <div class="col-lg-7">
        <span class="eyebrow">Explore More</span>
        <h2>Other services to consider.</h2>
      </div>
      <div class="col-lg-5">
        <p>Complementary offerings that pair well with {{ $service->title }} projects.</p>
      </div>
    </div>
    <div class="row g-4">
      @foreach ($relatedServices as $related)
        <div class="col-lg-4">
          <div class="related-card">
            <h5>{{ $related->title }}</h5>
            <p>{{ \Illuminate\Support\Str::limit(strip_tags($related->meta ?? ''), 110) }}</p>
            <a href="{{ route('service', $related->slung) }}" class="service-link">
              View Details <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
