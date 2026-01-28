@extends('layouts.master')

@section('title', $realtorPage->seo_title ?: $realtorPage->title)
@section('meta_title', $realtorPage->seo_title ?: $realtorPage->title)
@section('meta_description', $realtorPage->seo_description ?: '')

@section('content')
@php
  $serviceRows = collect(explode("\n", (string) $realtorPage->table_rows))
      ->map(fn ($row) => array_map('trim', explode('|', $row)))
      ->filter(fn ($row) => count($row) >= 2);
  $projectRows = collect(explode("\n", (string) $realtorPage->sample_projects))
      ->map(fn ($row) => array_map('trim', explode('|', $row)))
      ->filter(fn ($row) => count($row) >= 3);
  $resolveImage = function (?string $path) {
      if (!$path) {
          return null;
      }
      if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) {
          return $path;
      }
      if (\Illuminate\Support\Str::startsWith($path, 'uploads/')) {
          return asset($path);
      }
      return \Illuminate\Support\Facades\Storage::url($path);
  };
  $listingImages = collect(explode("\n", (string) $realtorPage->sample_listing_images))
      ->map(fn ($row) => trim($row))
      ->filter()
      ->values();
@endphp
<style>
  .realtors-hero {
    background: #101318;
    color: #ffffff;
    padding: 110px 0 90px;
    position: relative;
    overflow: hidden;
  }
  .realtors-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url('{{ asset('uploads/kitchen.jpg') }}') center/cover no-repeat;
    opacity: 0.25;
  }
  .realtors-hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(16, 19, 24, 0.75);
  }
  .realtors-hero .container {
    position: relative;
    z-index: 1;
  }
  .realtors-hero h1 {
    font-size: 46px;
    font-weight: 800;
    margin-bottom: 18px;
    color: #ffffff;
  }
  .realtors-hero p {
    color: rgba(255, 255, 255, 0.78);
    font-size: 17px;
    line-height: 1.9;
    max-width: 640px;
  }
  .realtors-hero .hero-card {
    background: #ffffff;
    color: #101318;
    border-radius: 20px;
    padding: 26px;
    box-shadow: 0 20px 36px rgba(16, 19, 24, 0.12);
  }
  .realtors-hero .hero-card h5 {
    color: #101318;
  }
  .realtors-hero .hero-card p {
    color: #5c6570;
  }
  .realtors-intro {
    padding: 70px 0;
    background: #ffffff;
  }
  .realtors-intro .intro-card {
    background: #ffffff;
    border-radius: 22px;
    padding: 32px;
    border: 1px solid rgba(16, 19, 24, 0.12);
    box-shadow: 0 18px 32px rgba(16, 19, 24, 0.08);
  }
  .realtors-images img {
    width: 100%;
    border-radius: 18px;
    object-fit: cover;
    min-height: 220px;
  }
  .realtors-services {
    padding: 90px 0;
    background: #ffffff;
  }
  .realtors-services .section-header {
    margin-bottom: 50px;
  }
  .realtors-services .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 12px;
    display: block;
  }
  .realtors-services h3 {
    font-size: 38px;
    font-weight: 800;
    color: #101318;
    margin-bottom: 16px;
  }
  .realtors-services .section-intro {
    font-size: 17px;
    color: #5c6570;
    line-height: 1.7;
  }
  .realtors-service-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
  }
  .realtors-service-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.12);
    border-radius: 20px;
    padding: 32px;
    box-shadow: 0 12px 28px rgba(16, 19, 24, 0.06);
    height: 100%;
    transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
    position: relative;
    overflow: hidden;
  }
  .realtors-service-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: #f37920;
    transform: scaleY(0);
    transition: transform 0.3s ease;
  }
  .realtors-service-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 45px rgba(16, 19, 24, 0.12);
    border-color: rgba(243, 121, 32, 0.2);
  }
  .realtors-service-card:hover::before {
    transform: scaleY(1);
  }
  .realtors-service-card .service-icon {
    width: 56px;
    height: 56px;
    background: #f7f4ef;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    transition: all 0.3s ease;
  }
  .realtors-service-card:hover .service-icon {
    background: #f37920;
    transform: scale(1.1);
  }
  .realtors-service-card .service-icon i {
    font-size: 24px;
    color: #f37920;
    transition: color 0.3s ease;
  }
  .realtors-service-card:hover .service-icon i {
    color: #ffffff;
  }
  .realtors-service-card .service-label {
    text-transform: uppercase;
    letter-spacing: 0.2em;
    font-size: 11px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 12px;
    display: block;
  }
  .realtors-service-card h5 {
    font-size: 22px;
    font-weight: 800;
    margin-bottom: 12px;
    color: #101318;
    line-height: 1.3;
  }
  .realtors-service-card p {
    color: #5c6570;
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 0;
  }
  .realtors-projects {
    padding: 90px 0;
    background: #f7f4ef;
  }
  .realtors-projects .section-header {
    margin-bottom: 50px;
  }
  .realtors-projects .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 12px;
    display: block;
  }
  .realtors-projects h3 {
    font-size: 38px;
    font-weight: 800;
    color: #101318;
    margin-bottom: 16px;
  }
  .realtors-projects .section-intro {
    font-size: 17px;
    color: #5c6570;
    line-height: 1.7;
  }
  .realtors-projects .project-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.12);
    border-radius: 20px;
    padding: 0;
    box-shadow: 0 12px 28px rgba(16, 19, 24, 0.08);
    height: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
    text-decoration: none;
    color: inherit;
  }
  .realtors-projects .project-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 50px rgba(16, 19, 24, 0.15);
    border-color: rgba(243, 121, 32, 0.3);
    text-decoration: none;
    color: inherit;
  }
  .realtors-projects .project-card img {
    width: 100%;
    height: 260px;
    border-radius: 0;
    object-fit: cover;
    transition: transform 0.5s ease;
  }
  .realtors-projects .project-card:hover img {
    transform: scale(1.05);
  }
  .realtors-projects .project-card .card-body {
    padding: 28px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .realtors-projects .project-card .listing-label {
    text-transform: uppercase;
    letter-spacing: 0.2em;
    font-size: 11px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 12px;
    display: block;
  }
  .realtors-projects .project-card h5 {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 16px;
    color: #101318;
    line-height: 1.3;
  }
  .realtors-projects .project-card .card-meta {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }
  .realtors-projects .project-card .card-meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #5c6570;
    font-weight: 500;
  }
  .realtors-projects .project-card .card-meta-item i {
    color: #f37920;
    font-size: 16px;
  }
  .realtors-projects .project-card .timeline-badge {
    background: #101318;
    color: #ffffff;
    padding: 8px 16px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: auto;
    align-self: flex-start;
  }
  .realtors-projects .project-card .timeline-badge i {
    font-size: 12px;
  }
  .realtors-cta {
    background: #101318;
    padding: 70px 0;
    color: #ffffff;
  }
  .realtors-cta h3 {
    font-weight: 800;
    color: #ffffff;
  }
  .realtors-cta .cta-card {
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 22px;
    padding: 28px;
    background: rgba(255, 255, 255, 0.02);
  }
  .realtors-cta .cta-text {
    color: rgba(255, 255, 255, 0.75);
  }
  .realtors-cta .cta-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.6);
  }
  .realtors-cta .btn-light {
    color: #101318;
    font-weight: 700;
  }
</style>

<section class="realtors-hero">
  <div class="container">
    <div class="row g-4 align-items-end">
      <div class="col-lg-7">
        <span class="eyebrow text-uppercase" style="letter-spacing: 0.3em; font-size: 12px;">Realtors</span>
        <h1>{{ $realtorPage->hero_title }}</h1>
    @if($realtorPage->hero_subtitle)
      <div>{!! $realtorPage->hero_subtitle !!}</div>
        @endif
      </div>
      <div class="col-lg-5">
        <div class="hero-card">
          <h5 class="mb-2">Partner Ready</h5>
          <p class="mb-0">Fast turnarounds, curated staging, and value-driven upgrades that elevate each listing.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="realtors-intro">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6">
        <div class="intro-card">
          <h3 class="mb-3">{{ $realtorPage->title }}</h3>
          <div class="mb-0">{!! $realtorPage->intro !!}</div>
        </div>
      </div>
      <div class="col-lg-6 realtors-images">
        <div class="row g-3">
          <div class="col-6">
            <img src="{{ $resolveImage($realtorPage->image_one ?: 'uploads/kitchen.jpg') }}" alt="Realtor listing preparation">
          </div>
          <div class="col-6">
            <img src="{{ $resolveImage($realtorPage->image_two ?: 'uploads/vanity.jpg') }}" alt="Property styling detail">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="realtors-services">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Our Services</span>
      <h3>{{ $realtorPage->table_title }}</h3>
      <div class="section-intro">{!! $realtorPage->table_intro !!}</div>
    </div>
    <div class="realtors-service-cards">
      @php
        $serviceIcons = [
          'fas fa-paint-brush',
          'fas fa-tools',
          'fas fa-home',
          'fas fa-phone-alt',
          'fas fa-lightbulb',
          'fas fa-couch'
        ];
      @endphp
      @foreach($serviceRows as $index => $row)
        <div class="realtors-service-card">
          <div class="service-icon">
            <i class="{{ $serviceIcons[$index % count($serviceIcons)] }}"></i>
          </div>
          <span class="service-label">Service</span>
          <h5>{{ $row[0] }}</h5>
          <p>{{ $row[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="realtors-projects">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Portfolio</span>
      <h3>{{ $realtorPage->sample_projects_title }}</h3>
      <div class="section-intro">{!! $realtorPage->sample_projects_intro !!}</div>
    </div>
    <div class="row g-4">
      @if(isset($realtorListings) && $realtorListings->isNotEmpty())
        @foreach($realtorListings as $index => $listing)
          <div class="col-lg-4">
            <a class="project-card" href="{{ route('realtors.listing', $listing->slug) }}">
              @php
                $image = $listing->image ?: ($listingImages[$index] ?? $realtorPage->image_one ?? 'uploads/kitchen.jpg');
              @endphp
              <img src="{{ $resolveImage($image) }}" alt="{{ $listing->title }} sample listing">
              <div class="card-body">
                <span class="listing-label">Sample Listing</span>
                <h5>{{ $listing->title }}</h5>
                <div class="card-meta">
                  @if($listing->location)
                    <div class="card-meta-item">
                      <i class="fas fa-map-marker-alt"></i>
                      <span>{{ $listing->location }}</span>
                    </div>
                  @endif
                </div>
                @if($listing->timeline)
                  <span class="timeline-badge">
                    <i class="fas fa-clock"></i>
                    {{ $listing->timeline }}
                  </span>
                @endif
              </div>
            </a>
          </div>
        @endforeach
      @else
        @foreach($projectRows as $index => $row)
          <div class="col-lg-4">
            <div class="project-card">
              @php
                $image = $listingImages[$index] ?? $realtorPage->image_one ?? 'uploads/kitchen.jpg';
              @endphp
              <img src="{{ $resolveImage($image) }}" alt="{{ $row[0] }} sample listing">
              <div class="card-body">
                <span class="listing-label">Sample Listing</span>
                <h5>{{ $row[0] }}</h5>
                <div class="card-meta">
                  <div class="card-meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $row[1] }}</span>
                  </div>
                </div>
                <span class="timeline-badge">
                  <i class="fas fa-clock"></i>
                  {{ $row[2] }}
                </span>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>

<section class="realtors-cta">
  <div class="container">
    <div class="cta-card">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <span class="cta-badge">Realtor Advantage</span>
          <h3 class="mt-3">{{ $realtorPage->cta_title }}</h3>
          <div class="mb-0 cta-text">{!! $realtorPage->cta_body !!}</div>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="{{ $realtorPage->cta_button_link ?? url('/contact-us?subject=Walkthrough%20Inquiry') }}" class="btn btn-light btn-lg">
            {{ $realtorPage->cta_button_text ?? 'Schedule a Walkthrough' }}
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
