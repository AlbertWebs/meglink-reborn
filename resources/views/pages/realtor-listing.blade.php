@extends('layouts.master')

@section('title', $listing->title)
@section('meta_title', $listing->title)
@section('meta_description', $listing->excerpt ?: '')

@section('content')
@php
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
  $heroImage = $resolveImage($listing->image);
@endphp
<style>
  .realtor-listing-hero {
    background: #101318;
    color: #ffffff;
    padding: 140px 0 110px;
    position: relative;
    overflow: hidden;
  }
  @if($heroImage)
  .realtor-listing-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url('{{ $heroImage }}') center/cover no-repeat;
    opacity: 0.15;
    transition: opacity 0.6s ease;
  }
  @endif
  .realtor-listing-hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(16, 19, 24, 0.92) 0%, rgba(16, 19, 24, 0.88) 100%);
  }
  .realtor-listing-hero .container {
    position: relative;
    z-index: 1;
  }
  .realtor-listing-hero .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.4em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 20px;
    display: block;
  }
  .realtor-listing-hero h1 {
    font-size: 56px;
    font-weight: 800;
    margin-bottom: 24px;
    color: #ffffff;
    line-height: 1.15;
    letter-spacing: -0.02em;
  }
  .realtor-listing-hero .hero-subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 20px;
    line-height: 1.8;
    max-width: 720px;
    margin-bottom: 32px;
    font-weight: 400;
  }
  .realtor-listing-hero .hero-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
  }
  .realtor-listing-hero .hero-meta span {
    padding: 12px 22px;
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.18);
    font-size: 15px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.95);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
  }
  .realtor-listing-hero .hero-meta span:hover {
    background: rgba(255, 255, 255, 0.18);
    transform: translateY(-2px);
  }
  .realtor-listing-hero .hero-meta span i {
    font-size: 14px;
    opacity: 0.8;
  }
  .realtor-listing-body {
    padding: 100px 0;
    background: #ffffff;
  }
  .realtor-listing-image-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.1);
    border-radius: 24px;
    padding: 0;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(16, 19, 24, 0.1);
    margin-bottom: 28px;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
  }
  .realtor-listing-image-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 28px 70px rgba(16, 19, 24, 0.15);
    border-color: rgba(243, 121, 32, 0.2);
  }
  .realtor-listing-image-card img {
    width: 100%;
    height: 520px;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease;
  }
  .realtor-listing-image-card:hover img {
    transform: scale(1.05);
  }
  .realtor-listing-info-card {
    background: linear-gradient(135deg, #f7f4ef 0%, #faf8f4 100%);
    border-radius: 24px;
    padding: 36px;
    border: 1px solid rgba(16, 19, 24, 0.08);
    box-shadow: 0 12px 30px rgba(16, 19, 24, 0.06);
  }
  .realtor-listing-info-card .info-item {
    padding: 24px 0;
    border-bottom: 1px solid rgba(16, 19, 24, 0.08);
    transition: padding-left 0.3s ease;
  }
  .realtor-listing-info-card .info-item:hover {
    padding-left: 8px;
  }
  .realtor-listing-info-card .info-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
  }
  .realtor-listing-info-card .info-label {
    text-transform: uppercase;
    letter-spacing: 0.2em;
    font-size: 11px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .realtor-listing-info-card .info-label i {
    color: #f37920;
    font-size: 14px;
  }
  .realtor-listing-info-card .info-value {
    font-size: 20px;
    font-weight: 800;
    color: #101318;
    line-height: 1.3;
  }
  .realtor-listing-content-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.1);
    border-radius: 24px;
    padding: 48px;
    box-shadow: 0 20px 50px rgba(16, 19, 24, 0.08);
    margin-bottom: 32px;
    transition: all 0.3s ease;
  }
  .realtor-listing-content-card:hover {
    box-shadow: 0 28px 70px rgba(16, 19, 24, 0.12);
    transform: translateY(-4px);
  }
  .realtor-listing-content-card h3 {
    font-size: 36px;
    font-weight: 800;
    margin-bottom: 24px;
    color: #101318;
    line-height: 1.2;
  }
  .realtor-listing-content-card .content-body {
    font-size: 18px;
    line-height: 1.9;
    color: #5c6570;
  }
  .realtor-listing-content-card .content-body p {
    margin-bottom: 20px;
  }
  .realtor-listing-content-card .content-body p:last-child {
    margin-bottom: 0;
  }
  .realtor-listing-media-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.1);
    border-radius: 24px;
    padding: 48px;
    box-shadow: 0 20px 50px rgba(16, 19, 24, 0.08);
    transition: all 0.3s ease;
  }
  .realtor-listing-media-card:hover {
    box-shadow: 0 28px 70px rgba(16, 19, 24, 0.12);
    transform: translateY(-4px);
  }
  .realtor-listing-media-card h4 {
    font-size: 30px;
    font-weight: 800;
    margin-bottom: 28px;
    color: #101318;
    line-height: 1.2;
  }
  .realtor-listing-media-card video,
  .realtor-listing-media-card iframe {
    width: 100%;
    border-radius: 20px;
    box-shadow: 0 16px 40px rgba(16, 19, 24, 0.15);
    transition: box-shadow 0.3s ease;
  }
  .realtor-listing-media-card:hover video,
  .realtor-listing-media-card:hover iframe {
    box-shadow: 0 20px 50px rgba(16, 19, 24, 0.2);
  }
  .realtor-listing-media-card video {
    height: auto;
    max-height: 600px;
  }
  .realtor-listing-media-card iframe {
    height: 520px;
  }
  .realtor-listing-closing {
    padding: 100px 0;
    background: #ffffff;
  }
  .realtor-listing-closing-content {
    max-width: 840px;
    margin: 0 auto;
  }
  .realtor-listing-closing-content h3 {
    font-size: 36px;
    font-weight: 800;
    margin-bottom: 32px;
    color: #101318;
    line-height: 1.2;
  }
  .realtor-listing-closing-content .closing-body {
    font-size: 19px;
    line-height: 1.9;
    color: #5c6570;
  }
  .realtor-listing-closing-content .closing-body p {
    margin-bottom: 24px;
  }
  .realtor-listing-closing-content .closing-body p:last-child {
    margin-bottom: 0;
  }
  .realtor-listing-closing-content .closing-body h4,
  .realtor-listing-closing-content .closing-body h5 {
    color: #101318;
    font-weight: 800;
    margin-top: 32px;
    margin-bottom: 16px;
  }
  .realtor-listing-closing-content .closing-body ul,
  .realtor-listing-closing-content .closing-body ol {
    margin: 20px 0;
    padding-left: 24px;
  }
  .realtor-listing-closing-content .closing-body li {
    margin-bottom: 12px;
    line-height: 1.8;
  }
  .related-listings {
    padding: 100px 0;
    background: #f7f4ef;
  }
  .related-listings .section-header {
    margin-bottom: 60px;
    text-align: center;
  }
  .related-listings .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 16px;
    display: block;
  }
  .related-listings h2 {
    font-size: 42px;
    font-weight: 800;
    color: #101318;
    margin-bottom: 20px;
    line-height: 1.2;
  }
  .related-listings .section-intro {
    font-size: 18px;
    color: #5c6570;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.7;
  }
  .related-listing-card {
    background: #ffffff;
    border-radius: 22px;
    overflow: hidden;
    border: 1px solid rgba(16, 19, 24, 0.1);
    box-shadow: 0 16px 40px rgba(16, 19, 24, 0.08);
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
    text-decoration: none;
    color: inherit;
  }
  .related-listing-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 60px rgba(16, 19, 24, 0.15);
    border-color: rgba(243, 121, 32, 0.3);
    text-decoration: none;
    color: inherit;
  }
  .related-listing-card img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  .related-listing-card:hover img {
    transform: scale(1.08);
  }
  .related-listing-card .card-body {
    padding: 32px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .related-listing-card h5 {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 16px;
    color: #101318;
    line-height: 1.3;
  }
  .related-listing-card .card-meta {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }
  .related-listing-card .card-meta span {
    font-size: 14px;
    color: #5c6570;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }
  .related-listing-card .card-meta span i {
    color: #f37920;
    font-size: 15px;
  }
  .related-listing-card .card-excerpt {
    font-size: 16px;
    color: #5c6570;
    line-height: 1.8;
    margin-bottom: 24px;
    flex: 1;
  }
  .related-listing-card .card-link {
    color: #f37920;
    font-weight: 700;
    text-decoration: none;
    font-size: 16px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
  }
  .related-listing-card .card-link:hover {
    gap: 14px;
    color: #d6681a;
  }
  @media (max-width: 991px) {
    .realtor-listing-hero {
      padding: 100px 0 80px;
    }
    .realtor-listing-hero h1 {
      font-size: 40px;
    }
    .realtor-listing-hero .hero-subtitle {
      font-size: 18px;
    }
    .realtor-listing-body {
      padding: 70px 0;
    }
    .realtor-listing-content-card,
    .realtor-listing-media-card {
      padding: 32px;
    }
    .realtor-listing-content-card h3,
    .realtor-listing-closing-content h3 {
      font-size: 28px;
    }
    .realtor-listing-media-card h4 {
      font-size: 24px;
    }
    .realtor-listing-image-card img {
      height: 400px;
    }
    .realtor-listing-media-card iframe {
      height: 400px;
    }
    .realtor-listing-closing {
      padding: 70px 0;
    }
    .related-listings {
      padding: 70px 0;
    }
    .related-listings h2 {
      font-size: 32px;
    }
  }
  @media (max-width: 767px) {
    .realtor-listing-hero h1 {
      font-size: 32px;
    }
    .realtor-listing-hero .hero-subtitle {
      font-size: 16px;
    }
    .realtor-listing-hero .hero-meta {
      flex-direction: column;
      gap: 10px;
    }
    .realtor-listing-hero .hero-meta span {
      width: 100%;
      justify-content: center;
    }
    .realtor-listing-image-card img {
      height: 320px;
    }
    .realtor-listing-content-card,
    .realtor-listing-media-card {
      padding: 24px;
    }
    .realtor-listing-info-card {
      padding: 28px;
    }
    .realtor-listing-media-card iframe {
      height: 300px;
    }
    .related-listing-card .card-body {
      padding: 24px;
    }
  }
</style>

<section class="realtor-listing-hero">
  <div class="container">
    <span class="eyebrow">Sample Listing</span>
    <h1>{{ $listing->title }}</h1>
    @if($listing->excerpt)
      <p class="hero-subtitle">{{ $listing->excerpt }}</p>
    @endif
    <div class="hero-meta">
      @if($listing->location)
        <span><i class="fas fa-map-marker-alt"></i>{{ $listing->location }}</span>
      @endif
      @if($listing->timeline)
        <span><i class="fas fa-clock"></i>{{ $listing->timeline }}</span>
      @endif
    </div>
  </div>
</section>

<section class="realtor-listing-body">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5">
        @if($listing->image)
          <div class="realtor-listing-image-card">
            <img src="{{ $resolveImage($listing->image) }}" alt="{{ $listing->title }}">
          </div>
        @endif
        <div class="realtor-listing-info-card">
          @if($listing->location)
            <div class="info-item">
              <div class="info-label">
                <i class="fas fa-map-marker-alt"></i>
                Location
              </div>
              <div class="info-value">{{ $listing->location }}</div>
            </div>
          @endif
          @if($listing->timeline)
            <div class="info-item">
              <div class="info-label">
                <i class="fas fa-clock"></i>
                Timeline
              </div>
              <div class="info-value">{{ $listing->timeline }}</div>
            </div>
          @endif
        </div>
      </div>
      <div class="col-lg-7">
        @if($listing->excerpt)
          <div class="realtor-listing-content-card">
            <h3>Listing Overview</h3>
            <div class="content-body">
              <p>{{ $listing->excerpt }}</p>
            </div>
          </div>
        @endif
        @if($listing->video_mp4 || $listing->video_youtube)
          <div class="realtor-listing-media-card">
            <h4>Video Tour</h4>
            @if($listing->video_mp4)
              <video controls style="width: 100%; border-radius: 20px;">
                <source src="{{ $resolveImage($listing->video_mp4) }}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            @endif
            @if($listing->video_youtube)
              @php
                $youtubeId = null;
                if (preg_match('~(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})~', $listing->video_youtube, $matches)) {
                    $youtubeId = $matches[1];
                }
              @endphp
              @if($youtubeId)
                <div class="@if($listing->video_mp4) mt-4 @endif">
                  <iframe
                    height="520"
                    src="https://www.youtube.com/embed/{{ $youtubeId }}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="width: 100%; border-radius: 20px;"
                  ></iframe>
                </div>
              @endif
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

@if($listing->body)
<section class="realtor-listing-closing">
  <div class="container">
    <div class="realtor-listing-closing-content">
      <h3>Full Description</h3>
      <div class="closing-body">
        {!! $listing->body !!}
      </div>
    </div>
  </div>
</section>
@endif

@if($listing->closing_content)
<section class="realtor-listing-closing">
  <div class="container">
    <div class="realtor-listing-closing-content">
      <div class="closing-body">
        {!! $listing->closing_content !!}
      </div>
    </div>
  </div>
</section>
@endif

@if(isset($relatedListings) && $relatedListings->count() > 0)
<section class="related-listings">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Explore More</span>
      <h2>Other Sample Listings</h2>
      <p class="section-intro">Discover more showcase-ready transformations completed with speed and care.</p>
    </div>
    <div class="row g-4">
      @foreach($relatedListings as $related)
        <div class="col-lg-4 col-md-6">
          <a href="{{ route('realtors.listing', $related->slug) }}" class="related-listing-card">
            @if($related->image)
              <img src="{{ $resolveImage($related->image) }}" alt="{{ $related->title }}">
            @endif
            <div class="card-body">
              <h5>{{ $related->title }}</h5>
              <div class="card-meta">
                @if($related->location)
                  <span><i class="fas fa-map-marker-alt"></i>{{ $related->location }}</span>
                @endif
                @if($related->timeline)
                  <span><i class="fas fa-clock"></i>{{ $related->timeline }}</span>
                @endif
              </div>
              @if($related->excerpt)
                <p class="card-excerpt">{{ $related->excerpt }}</p>
              @endif
              <span class="card-link">
                View Details <i class="fas fa-arrow-right"></i>
              </span>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection
