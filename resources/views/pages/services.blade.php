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
<style>
  .services-hero-intro {
    background: radial-gradient(circle at top left, rgba(243, 121, 32, 0.15), transparent 55%),
                radial-gradient(circle at 70% 20%, rgba(20, 24, 31, 0.5), transparent 50%),
                #101318;
    color: #f7f7f5;
    padding: 90px 0;
  }
  .services-hero-intro .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.6);
  }
  .services-hero-intro h2 {
    font-size: 42px;
    font-weight: 800;
    margin: 12px 0 18px;
    color: #ffffff;
  }
  .services-hero-intro p {
    color: rgba(255, 255, 255, 0.75);
    font-size: 16px;
    line-height: 1.8;
  }
  .services-cta-row {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 26px;
  }
  .services-metrics {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
  }
  .metric-card {
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 16px;
    padding: 24px;
    min-height: 130px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    backdrop-filter: blur(6px);
  }
  .metric-card span {
    color: rgba(255, 255, 255, 0.65);
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.2em;
  }
  .metric-card h4 {
    margin: 6px 0 0;
    font-size: 28px;
    color: #ffffff;
    font-weight: 700;
  }
  .services-ribbon {
    background: #f7f4ef;
    padding: 40px 0;
  }
  .services-ribbon .ribbon-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 24px 22px;
    height: 100%;
    box-shadow: 0 18px 40px rgba(18, 21, 28, 0.08);
  }
  .services-ribbon .ribbon-card i {
    font-size: 26px;
    color: #f37920;
    margin-bottom: 12px;
  }
  .services-ribbon .ribbon-card h5 {
    font-weight: 700;
    color: #222831;
  }
  .services-grid {
    padding: 80px 0 90px;
    background: #ffffff;
  }
  .services-grid .eyebrow,
  .signature-process .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.6);
  }
  .signature-process .eyebrow {
    color: rgba(255, 255, 255, 0.6);
  }
  .services-grid .section-head {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 40px;
  }
  .services-grid .section-head h2 {
    font-size: 36px;
    font-weight: 800;
    margin: 8px 0 0;
  }
  .services-grid .section-head p {
    max-width: 520px;
    margin: 0;
    color: #5c6570;
  }
  .services-card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 26px;
  }
  .service-card {
    border-radius: 20px;
    overflow: hidden;
    background: #f9f9f7;
    box-shadow: 0 18px 35px rgba(16, 19, 24, 0.08);
    display: flex;
    flex-direction: column;
    height: 100%;
  }
  .service-card-media {
    position: relative;
    height: 220px;
    overflow: hidden;
  }
  .service-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }
  .service-card:hover img {
    transform: scale(1.05);
  }
  .service-card-tag {
    position: absolute;
    top: 18px;
    left: 18px;
    background: rgba(0, 0, 0, 0.7);
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    padding: 6px 12px;
    border-radius: 999px;
    letter-spacing: 0.2em;
  }
  .service-card-body {
    padding: 24px 24px 28px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    flex: 1;
  }
  .service-card-body h3 {
    font-size: 20px;
    font-weight: 700;
    margin: 0;
  }
  .service-card-body p {
    color: #5c6570;
    line-height: 1.7;
    margin: 0;
    flex: 1;
  }
  .service-link {
    color: #f37920;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }
  .signature-process {
    padding: 90px 0;
    background: #101318;
    color: #ffffff;
    position: relative;
  }
  .signature-process::before {
    content: "";
    position: absolute;
    top: 60px;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, rgba(243, 121, 32, 0.4), rgba(255, 255, 255, 0.15), rgba(243, 121, 32, 0.4));
  }
  .signature-process h2 {
    font-size: 34px;
    font-weight: 800;
    color: #ffffff;
  }
  .signature-process p {
    color: rgba(255, 255, 255, 0.7);
  }
  .process-step {
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 18px;
    padding: 24px;
    height: 100%;
  }
  .process-step span {
    color: rgba(255, 255, 255, 0.6);
    text-transform: uppercase;
    letter-spacing: 0.2em;
    font-size: 12px;
  }
  .process-step h5 {
    margin-top: 10px;
    font-weight: 700;
    color: #ffffff;
  }
  .process-step p {
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 0;
  }
  .services-cta {
    padding: 70px 0;
    background: linear-gradient(135deg, rgba(243, 121, 32, 0.9), rgba(16, 19, 24, 0.92)),
                url('{{ asset('uploads/kitchen.jpg') }}') center/cover no-repeat;
    color: #ffffff;
    border-radius: 26px;
  }
  .services-cta h3 {
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 10px;
  }
  .services-cta p {
    color: rgba(255, 255, 255, 0.85);
    margin-bottom: 0;
  }
  @media (max-width: 991px) {
    .services-hero-intro {
      padding: 70px 0;
    }
    .services-hero-intro h2 {
      font-size: 34px;
    }
    .services-grid .section-head {
      flex-direction: column;
      align-items: flex-start;
    }
  }
  @media (max-width: 575px) {
    .services-metrics {
      grid-template-columns: 1fr;
    }
    .services-cta {
      padding: 50px 24px;
    }
  }
</style>

<section class="services-hero-intro">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6">
        <span class="eyebrow">Meglink Signature</span>
        <h2>Unique interiors shaped by craft, precision, and character.</h2>
        <p>
          Our service offering is curated to move seamlessly from inspiration to execution.
          We merge technical expertise with artisan partnerships to create environments that
          feel bespoke, elevated, and unmistakably yours.
        </p>
        <div class="services-cta-row">
          <a href="{{ url('our-work') }}" class="btn btn-orange">Explore Portfolio</a>
          <a href="{{ url('/contact-us') }}" class="btn btn-outline-light">Start a Project</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="services-metrics">
          <div class="metric-card">
            <span>Experience</span>
            <h4>15+ Years</h4>
          </div>
          <div class="metric-card">
            <span>Execution</span>
            <h4>360° Delivery</h4>
          </div>
          <div class="metric-card">
            <span>Specialties</span>
            <h4>Residential + Commercial</h4>
          </div>
          <div class="metric-card">
            <span>Outcome</span>
            <h4>Tailored Spaces</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="services-ribbon">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="ribbon-card">
          <i class="fas fa-layer-group"></i>
          <h5>Concept-Ready Planning</h5>
          <p>We translate vision into clear deliverables, balancing spatial flow, function, and aesthetic harmony.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="ribbon-card">
          <i class="fas fa-tools"></i>
          <h5>Craft-Forward Build</h5>
          <p>Our finish work blends precision fabrication, bespoke joinery, and curated material selections.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="ribbon-card">
          <i class="fas fa-swatchbook"></i>
          <h5>Signature Styling</h5>
          <p>We refine textures, lighting, and styling to deliver interiors that feel composed and complete.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="services-grid">
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">Our Services</span>
        <h2>Every detail designed for impact.</h2>
      </div>
      <p>From custom cabinetry to full fit-outs, each service is delivered with disciplined craft and modern execution.</p>
    </div>

    <?php $Services = \App\Models\Service::all(); ?>
    <div class="services-card-grid">
      @foreach ($Services as $service)
        @php
          $serviceSummary = $service->content ? strip_tags($service->content) : '';
          $serviceSummary = \Illuminate\Support\Str::length($serviceSummary) > 40
            ? $serviceSummary
            : 'Purpose-built interiors tailored to how you live and work, with craftsmanship you can feel.';
        @endphp
        <article class="service-card">
          <div class="service-card-media">
            <img src="{{ $service->image ? asset('storage/'.$service->image) : asset('uploads/kitchen.jpg') }}" alt="{{ $service->title }}">
            <span class="service-card-tag">{{ sprintf('%02d', $loop->iteration) }}</span>
          </div>
          <div class="service-card-body">
            <h3>{{ $service->title }}</h3>
            <p>
              {{ \Illuminate\Support\Str::limit($serviceSummary, 140) }}
            </p>
            <a class="service-link" href="{{ route('services') }}/{{ $service->slung }}">
              Learn more <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>

<section class="signature-process">
  <div class="container">
    <div class="row align-items-end mb-4">
      <div class="col-lg-7">
        <span class="eyebrow">Signature Process</span>
        <h2>From discovery to delivery.</h2>
      </div>
      <div class="col-lg-5">
        <p>Each step is designed to maintain clarity, momentum, and a consistent standard of finish.</p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="process-step">
          <span>Step 01</span>
          <h5>Vision & Strategy</h5>
          <p>We define intent, objectives, and spatial priorities for every project scope.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="process-step">
          <span>Step 02</span>
          <h5>Design & Visualization</h5>
          <p>Layouts, selections, and 3D previews bring decisions to life before build.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="process-step">
          <span>Step 03</span>
          <h5>Fabrication & Install</h5>
          <p>Our team manages production and on-site coordination with precision.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="process-step">
          <span>Step 04</span>
          <h5>Final Styling</h5>
          <p>We perfect the lighting, textures, and finishing touches that elevate the space.</p>
        </div>
      </div>
    </div>
    <div class="services-cta mt-5">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h3>Ready to shape a space that feels unmistakably yours?</h3>
          <p>Book a consultation and we will map the quickest path to your ideal interior.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="{{ url('/contact-us') }}" class="btn btn-light btn-lg">Schedule a Consultation</a>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
