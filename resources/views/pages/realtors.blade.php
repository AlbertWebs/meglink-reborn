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
    padding: 70px 0;
    background: #f6f7f8;
  }
  .realtors-service-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 18px;
  }
  .realtors-service-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.12);
    border-radius: 18px;
    padding: 22px;
    box-shadow: 0 14px 26px rgba(16, 19, 24, 0.06);
    height: 100%;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .realtors-service-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 18px 36px rgba(16, 19, 24, 0.08);
  }
  .realtors-service-card h5 {
    font-weight: 700;
    margin-bottom: 8px;
  }
  .realtors-service-card p {
    color: #5c6570;
  }
  .realtors-projects {
    padding: 70px 0;
    background: #ffffff;
  }
  .realtors-projects .project-card {
    border: 1px solid rgba(16, 19, 24, 0.12);
    border-radius: 18px;
    padding: 22px;
    box-shadow: 0 14px 26px rgba(16, 19, 24, 0.06);
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }
  .realtors-projects .project-card img {
    width: 100%;
    height: 180px;
    border-radius: 14px;
    object-fit: cover;
  }
  .realtors-projects .project-card .badge {
    background: #101318;
    color: #ffffff;
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
    <div class="row align-items-end mb-4">
      <div class="col-lg-7">
        <h3 class="mb-2">{{ $realtorPage->table_title }}</h3>
        <div class="text-muted mb-0">{!! $realtorPage->table_intro !!}</div>
      </div>
    </div>
    <div class="realtors-service-cards">
      @foreach($serviceRows as $row)
        <div class="realtors-service-card">
          <span class="eyebrow text-uppercase" style="letter-spacing: 0.3em; font-size: 11px; color: rgba(16, 19, 24, 0.5);">Service</span>
          <h5 class="mt-2">{{ $row[0] }}</h5>
          <p class="mb-0">{{ $row[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="realtors-projects">
  <div class="container">
    <div class="row align-items-end mb-4">
      <div class="col-lg-7">
        <h3 class="mb-2">{{ $realtorPage->sample_projects_title }}</h3>
        <div class="text-muted mb-0">{!! $realtorPage->sample_projects_intro !!}</div>
      </div>
    </div>
    <div class="row g-4">
      @if(isset($realtorListings) && $realtorListings->isNotEmpty())
        @foreach($realtorListings as $index => $listing)
          <div class="col-lg-4">
            <a class="project-card text-decoration-none text-dark" href="{{ route('realtors.listing', $listing->slug) }}">
              @php
                $image = $listing->image ?: ($listingImages[$index] ?? $realtorPage->image_one ?? 'uploads/kitchen.jpg');
              @endphp
              <img src="{{ $resolveImage($image) }}" alt="{{ $listing->title }} sample listing">
              <span class="eyebrow text-uppercase" style="letter-spacing: 0.3em; font-size: 11px; color: rgba(16, 19, 24, 0.6);">Sample Listing</span>
              <h5 class="mt-2 mb-1">{{ $listing->title }}</h5>
              <p class="mb-2 text-muted">{{ $listing->location }}</p>
              <span class="badge px-3 py-2 align-self-start">{{ $listing->timeline }}</span>
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
              <span class="eyebrow text-uppercase" style="letter-spacing: 0.3em; font-size: 11px; color: rgba(16, 19, 24, 0.6);">Sample Listing</span>
              <h5 class="mt-2 mb-1">{{ $row[0] }}</h5>
              <p class="mb-2 text-muted">{{ $row[1] }}</p>
              <span class="badge px-3 py-2 align-self-start">{{ $row[2] }}</span>
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
