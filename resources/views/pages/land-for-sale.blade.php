@extends('layouts.master')

@section('title', 'Land for Sale & Joint Ventures | Meglink Ventures')
@section('meta_title', 'Land for Sale & Joint Ventures | Meglink Ventures')
@section('meta_description', 'Prime investment opportunities through direct land sales and strategic Joint Ventures. Secure, high-potential property solutions in Kenya.')

@section('content')
@php
  $resolveImage = function ($imagePath) {
      if (!$imagePath) {
          return asset('html/images/placeholder.jpg');
      }
      if (\Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])) {
          return $imagePath;
      }
      return asset('storage/' . $imagePath);
  };
  $resolveRealtorImage = function (?string $path) {
      if (!$path) {
          return asset('html/images/placeholder.jpg');
      }
      if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) {
          return $path;
      }
      if (\Illuminate\Support\Str::startsWith($path, 'uploads/')) {
          return asset($path);
      }
      return \Illuminate\Support\Facades\Storage::url($path);
  };
@endphp
<style>
  .land-hero {
    background: linear-gradient(135deg, #101318 0%, #1a1f26 100%);
    color: #ffffff;
    padding: 140px 0 100px;
    position: relative;
    overflow: hidden;
  }
  .land-hero::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(243, 121, 32, 0.1) 0%, transparent 70%);
    border-radius: 50%;
  }
  .land-hero .container {
    position: relative;
    z-index: 1;
  }
  .land-hero .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.4em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 20px;
    display: block;
  }
  .land-hero h1 {
    font-size: 56px;
    font-weight: 800;
    margin-bottom: 24px;
    color: #ffffff;
    line-height: 1.15;
    letter-spacing: -0.02em;
  }
  .land-hero .hero-subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 20px;
    line-height: 1.8;
    max-width: 720px;
    margin-bottom: 0;
    font-weight: 400;
  }
  .land-hero .btn {
    background: #f37920;
    color: #ffffff;
    padding: 14px 32px;
    border-radius: 12px;
    font-weight: 700;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
    border: none;
  }
  .land-hero .btn:hover {
    background: #ffffff;
    color: #f37920;
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(255, 255, 255, 0.2);
  }
  .land-intro {
    padding: 100px 0;
    background: #ffffff;
  }
  .land-intro-content {
    max-width: 800px;
    margin: 0 auto;
  }
  .land-intro-content h2 {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 24px;
    color: #101318;
    line-height: 1.2;
  }
  .land-intro-content p {
    font-size: 18px;
    line-height: 1.9;
    color: #5c6570;
    margin-bottom: 20px;
  }
  .land-intro-content p:last-child {
    margin-bottom: 0;
  }
  .land-section {
    padding: 100px 0;
  }
  .land-section-header {
    margin-bottom: 60px;
    text-align: center;
  }
  .land-section-header .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 16px;
    display: block;
  }
  .land-section-header h2 {
    font-size: 42px;
    font-weight: 800;
    color: #101318;
    margin-bottom: 20px;
    line-height: 1.2;
  }
  .land-section-header .section-intro {
    font-size: 18px;
    color: #5c6570;
    line-height: 1.7;
    max-width: 700px;
    margin: 0 auto;
  }
  .land-card {
    background: #ffffff;
    border-radius: 24px;
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
  .land-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 28px 70px rgba(16, 19, 24, 0.15);
    border-color: rgba(243, 121, 32, 0.3);
    text-decoration: none;
    color: inherit;
  }
  .land-card-image {
    position: relative;
    width: 100%;
    height: 320px;
    overflow: hidden;
  }
  .land-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  .land-card:hover .land-card-image img {
    transform: scale(1.1);
  }
  .land-card-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(16, 19, 24, 0.9);
    color: #ffffff;
    padding: 8px 16px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    z-index: 2;
  }
  .land-card-badge.sale {
    background: #f37920;
  }
  .land-card-badge.joint-venture {
    background: #101318;
  }
  .land-card-body {
    padding: 32px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .land-card-title {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 12px;
    color: #101318;
    line-height: 1.3;
  }
  .land-card-location {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #5c6570;
    font-size: 15px;
    margin-bottom: 16px;
    font-weight: 500;
  }
  .land-card-location i {
    color: #f37920;
    font-size: 16px;
  }
  .land-card-description {
    font-size: 16px;
    line-height: 1.7;
    color: #5c6570;
    margin-bottom: 24px;
    flex: 1;
  }
  .land-card-price {
    font-size: 28px;
    font-weight: 800;
    color: #f37920;
    margin-top: auto;
    padding-top: 20px;
    border-top: 1px solid rgba(16, 19, 24, 0.1);
  }
  .land-card-price-label {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: rgba(16, 19, 24, 0.5);
    font-weight: 700;
    margin-bottom: 4px;
  }
  .land-empty {
    text-align: center;
    padding: 80px 20px;
    background: #f7f4ef;
    border-radius: 24px;
  }
  .land-empty p {
    font-size: 18px;
    color: #5c6570;
    margin-bottom: 0;
  }
  .land-cta {
    padding: 100px 0;
    background: linear-gradient(135deg, #101318 0%, #1a1f26 100%);
    color: #ffffff;
    position: relative;
    overflow: hidden;
  }
  .land-cta::before {
    content: "";
    position: absolute;
    bottom: 0;
    right: 0;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(243, 121, 32, 0.08) 0%, transparent 70%);
    border-radius: 50%;
  }
  .land-cta-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 1;
  }
  .land-cta h2 {
    font-size: 42px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 24px;
    line-height: 1.2;
  }
  .land-cta p {
    font-size: 18px;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.85);
    margin-bottom: 32px;
  }
  .land-cta .btn {
    background: #ffffff;
    color: #101318;
    font-weight: 700;
    padding: 16px 40px;
    border-radius: 12px;
    font-size: 16px;
    transition: all 0.3s ease;
    border: none;
    text-decoration: none;
    display: inline-block;
  }
  .land-cta .btn:hover {
    background: #f37920;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(243, 121, 32, 0.3);
  }
  .related-properties {
    padding: 100px 0;
    background: #f7f4ef;
  }
  .realtor-listings-section {
    padding: 100px 0;
    background: #ffffff;
  }
  .realtor-listing-card {
    background: #ffffff;
    border-radius: 24px;
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
  .realtor-listing-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 28px 70px rgba(16, 19, 24, 0.15);
    border-color: rgba(243, 121, 32, 0.3);
    text-decoration: none;
    color: inherit;
  }
  .realtor-listing-card-image {
    position: relative;
    width: 100%;
    height: 300px;
    overflow: hidden;
  }
  .realtor-listing-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  .realtor-listing-card:hover .realtor-listing-card-image img {
    transform: scale(1.1);
  }
  .realtor-listing-card-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(243, 121, 32, 0.95);
    color: #ffffff;
    padding: 8px 16px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    z-index: 2;
  }
  .realtor-listing-card-body {
    padding: 32px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .realtor-listing-card-title {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 12px;
    color: #101318;
    line-height: 1.3;
  }
  .realtor-listing-card-meta {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 16px;
    flex-wrap: wrap;
  }
  .realtor-listing-card-meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #5c6570;
    font-size: 14px;
    font-weight: 500;
  }
  .realtor-listing-card-meta-item i {
    color: #f37920;
    font-size: 16px;
  }
  .realtor-listing-card-excerpt {
    font-size: 16px;
    line-height: 1.7;
    color: #5c6570;
    margin-bottom: 20px;
    flex: 1;
  }
  .realtor-listing-card-link {
    color: #f37920;
    font-weight: 700;
    text-decoration: none;
    font-size: 15px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: gap 0.3s ease;
  }
  .realtor-listing-card-link:hover {
    gap: 12px;
    color: #d6681a;
  }
  @media (max-width: 991px) {
    .land-hero h1 {
      font-size: 40px;
    }
    .land-hero .hero-subtitle {
      font-size: 18px;
    }
    .land-intro,
    .land-section,
    .related-properties,
    .realtor-listings-section {
      padding: 70px 0;
    }
    .land-section-header h2,
    .land-intro-content h2,
    .land-cta h2 {
      font-size: 32px;
    }
    .land-card-image {
      height: 280px;
    }
    .realtor-listing-card-image {
      height: 260px;
    }
  }
  @media (max-width: 767px) {
    .land-hero {
      padding: 100px 0 80px;
    }
    .land-hero h1 {
      font-size: 32px;
    }
    .land-card-body,
    .realtor-listing-card-body {
      padding: 24px;
    }
    .land-card-title,
    .realtor-listing-card-title {
      font-size: 20px;
    }
    .land-card-price {
      font-size: 24px;
    }
    .realtor-listing-card-image {
      height: 240px;
    }
  }
</style>

<section class="land-hero">
  <div class="container">
    <span class="eyebrow">Property Investment</span>
    <h1>Land for Sale & Joint Ventures</h1>
    <p class="hero-subtitle">Prime investment opportunities through direct land sales and strategic partnerships. Secure, high-potential property solutions that complement your lifestyle.</p>
    <div class="mt-4">
      <a href="{{ route('land-resources') }}" class="btn">
        Learn More <i class="fas fa-arrow-right ml-2"></i>
      </a>
    </div>
  </div>
</section>

<section class="land-intro">
  <div class="container">
    <div class="land-intro-content">
      <h2>Beyond Design: Your Partner in Property & Prosperity</h2>
      <p>While Meglink Ventures is celebrated for crafting timeless, elegant, and functional interior spaces, our expertise extends into the real estate sector. We offer prime investment opportunities through both the direct sale of land and strategic Joint Ventures (JVs).</p>
      <p>A Joint Venture is a strategic business arrangement where Meglink pools resources with landowners or developers to execute a specific project—like subdivision or development—sharing the risks, costs, and ultimately, the profits. Whether you're looking for a straight purchase or a partnership to maximize land potential, we provide secure, high-potential property solutions that complement your beautiful, newly designed lifestyle.</p>
    </div>
  </div>
</section>

@if($landsForSale->isNotEmpty())
<section class="land-section">
  <div class="container">
    <div class="land-section-header">
      <span class="eyebrow">Featured Listings</span>
      <h2>Land for Sale</h2>
      <p class="section-intro">Prime properties available for direct purchase. Secure your investment with transparent transactions and clear titles.</p>
    </div>
    <div class="row g-4">
      @foreach($landsForSale as $land)
        <div class="col-lg-4 col-md-6">
          <a href="{{ route('contact') }}?subject=Land Inquiry: {{ urlencode($land->title) }}" class="land-card">
            <div class="land-card-image">
              <img src="{{ $resolveImage($land->images[0] ?? null) }}" alt="{{ $land->title }}">
              <span class="land-card-badge sale">For Sale</span>
            </div>
            <div class="land-card-body">
              <h3 class="land-card-title">{{ $land->title }}</h3>
              @if($land->location)
                <div class="land-card-location">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>{{ $land->location }}</span>
                </div>
              @endif
              @if($land->description)
                <p class="land-card-description">{{ \Illuminate\Support\Str::limit($land->description, 120) }}</p>
              @endif
              @if($land->price)
                <div class="land-card-price">
                  <div class="land-card-price-label">Price</div>
                  Ksh {{ number_format($land->price) }}
                </div>
              @endif
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@if($jointVentures->isNotEmpty())
<section class="land-section" style="background: #f7f4ef;">
  <div class="container">
    <div class="land-section-header">
      <span class="eyebrow">Partnership Opportunities</span>
      <h2>Joint Ventures</h2>
      <p class="section-intro">Strategic partnerships that maximize land potential. Share risks, costs, and profits through collaborative development projects.</p>
    </div>
    <div class="row g-4">
      @foreach($jointVentures as $land)
        <div class="col-lg-4 col-md-6">
          <a href="{{ route('contact') }}?subject=Joint Venture Inquiry: {{ urlencode($land->title) }}" class="land-card">
            <div class="land-card-image">
              <img src="{{ $resolveImage($land->images[0] ?? null) }}" alt="{{ $land->title }}">
              <span class="land-card-badge joint-venture">Joint Venture</span>
            </div>
            <div class="land-card-body">
              <h3 class="land-card-title">{{ $land->title }}</h3>
              @if($land->location)
                <div class="land-card-location">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>{{ $land->location }}</span>
                </div>
              @endif
              @if($land->description)
                <p class="land-card-description">{{ \Illuminate\Support\Str::limit($land->description, 120) }}</p>
              @endif
              @if($land->price)
                <div class="land-card-price">
                  <div class="land-card-price-label">Investment Value</div>
                  Ksh {{ number_format($land->price) }}
                </div>
              @endif
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@if(isset($allLands) && $allLands->isNotEmpty())
<section class="related-properties">
  <div class="container">
    <div class="land-section-header">
      <span class="eyebrow">Explore More</span>
      <h2>Related Properties</h2>
      <p class="section-intro">Discover more investment opportunities across our portfolio of prime properties.</p>
    </div>
    <div class="row g-4">
      @foreach($allLands->take(6) as $land)
        <div class="col-lg-4 col-md-6">
          <a href="{{ route('contact') }}?subject=Property Inquiry: {{ urlencode($land->title) }}" class="land-card">
            <div class="land-card-image">
              <img src="{{ $resolveImage($land->images[0] ?? null) }}" alt="{{ $land->title }}">
              <span class="land-card-badge {{ $land->type == 'sale' ? 'sale' : 'joint-venture' }}">
                {{ $land->type == 'sale' ? 'For Sale' : 'Joint Venture' }}
              </span>
            </div>
            <div class="land-card-body">
              <h3 class="land-card-title">{{ $land->title }}</h3>
              @if($land->location)
                <div class="land-card-location">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>{{ $land->location }}</span>
                </div>
              @endif
              @if($land->description)
                <p class="land-card-description">{{ \Illuminate\Support\Str::limit($land->description, 100) }}</p>
              @endif
              @if($land->price)
                <div class="land-card-price">
                  <div class="land-card-price-label">{{ $land->type == 'sale' ? 'Price' : 'Investment Value' }}</div>
                  Ksh {{ number_format($land->price) }}
                </div>
              @endif
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@if(isset($realtorListings) && $realtorListings->isNotEmpty())
<section class="realtor-listings-section">
  <div class="container">
    <div class="land-section-header">
      <span class="eyebrow">Featured Listings</span>
      <h2>Realtor Listings</h2>
      <p class="section-intro">Showcase-ready transformations completed with speed and care. Explore our recent realtor partnership projects.</p>
    </div>
    <div class="row g-4">
      @foreach($realtorListings as $listing)
        <div class="col-lg-4 col-md-6">
          <a href="{{ route('realtors.listing', $listing->slug) }}" class="realtor-listing-card">
            <div class="realtor-listing-card-image">
              <img src="{{ $resolveRealtorImage($listing->image) }}" alt="{{ $listing->title }}">
              <span class="realtor-listing-card-badge">Sample Listing</span>
            </div>
            <div class="realtor-listing-card-body">
              <h3 class="realtor-listing-card-title">{{ $listing->title }}</h3>
              <div class="realtor-listing-card-meta">
                @if($listing->location)
                  <div class="realtor-listing-card-meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $listing->location }}</span>
                  </div>
                @endif
                @if($listing->timeline)
                  <div class="realtor-listing-card-meta-item">
                    <i class="fas fa-clock"></i>
                    <span>{{ $listing->timeline }}</span>
                  </div>
                @endif
              </div>
              @if($listing->excerpt)
                <p class="realtor-listing-card-excerpt">{{ \Illuminate\Support\Str::limit($listing->excerpt, 100) }}</p>
              @endif
              <span class="realtor-listing-card-link">
                View Details <i class="fas fa-arrow-right"></i>
              </span>
            </div>
          </a>
        </div>
      @endforeach
    </div>
    <div class="text-center mt-5">
      <a href="{{ route('realtors') }}" class="btn" style="background: #f37920; color: #ffffff; padding: 14px 32px; border-radius: 12px; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.3s ease;">
        View All Realtor Listings <i class="fas fa-arrow-right ml-2"></i>
      </a>
    </div>
  </div>
</section>
@endif

<section class="land-cta">
  <div class="container">
    <div class="land-cta-content">
      <h2>Ready to Invest?</h2>
      <p>Contact us to learn more about our available properties, joint venture opportunities, and how we can help you make the right investment decision.</p>
      <a href="{{ route('contact') }}" class="btn">Get in Touch</a>
    </div>
  </div>
</section>
@endsection
