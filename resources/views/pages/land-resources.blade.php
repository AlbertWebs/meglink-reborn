@extends('layouts.master')

@section('title', isset($resource) && $resource->seo_title ? $resource->seo_title : 'Land Resources | Meglink Ventures')
@section('meta_title', isset($resource) && $resource->seo_title ? $resource->seo_title : 'Land Resources | Meglink Ventures')
@section('meta_description', isset($resource) && $resource->seo_description ? $resource->seo_description : 'Essential information for land purchasers, sellers, and joint venture partners.')

@section('content')
<style>
  .land-resources-hero {
    background: linear-gradient(135deg, #101318 0%, #1a1f26 100%);
    color: #ffffff;
    padding: 120px 0 90px;
    position: relative;
    overflow: hidden;
  }
  .land-resources-hero::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(243, 121, 32, 0.08) 0%, transparent 70%);
    border-radius: 50%;
  }
  .land-resources-hero .container {
    position: relative;
    z-index: 1;
  }
  .land-resources-hero .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.35em;
    font-size: 11px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.55);
    margin-bottom: 18px;
    display: block;
  }
  .land-resources-hero h1 {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 20px;
    color: #ffffff;
    line-height: 1.2;
    letter-spacing: -0.015em;
  }
  .land-resources-hero .hero-subtitle {
    color: rgba(255, 255, 255, 0.85);
    font-size: 18px;
    line-height: 1.75;
    max-width: 680px;
    margin-bottom: 0;
    font-weight: 400;
  }
  .land-resources-content {
    padding: 90px 0;
    background: #ffffff;
  }
  .resource-section {
    margin-bottom: 100px;
    position: relative;
  }
  .resource-section:last-child {
    margin-bottom: 0;
  }
  .resource-section::after {
    content: "";
    position: absolute;
    bottom: -50px;
    left: 0;
    width: 60px;
    height: 2px;
    background: rgba(16, 19, 24, 0.08);
  }
  .resource-section:last-child::after {
    display: none;
  }
  .resource-section-header {
    margin-bottom: 36px;
    display: flex;
    align-items: center;
    gap: 20px;
  }
  .resource-section-number {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    background: rgba(243, 121, 32, 0.1);
    color: #f37920;
    border: 2px solid rgba(243, 121, 32, 0.2);
    border-radius: 10px;
    font-size: 20px;
    font-weight: 800;
    flex-shrink: 0;
  }
  .resource-section-title {
    font-size: 32px;
    font-weight: 800;
    margin: 0;
    color: #101318;
    line-height: 1.25;
    letter-spacing: -0.01em;
  }
  .resource-section-content {
    font-size: 17px;
    line-height: 1.85;
    color: #5c6570;
    max-width: 860px;
    margin-left: 64px;
  }
  .resource-section-content p {
    margin-bottom: 22px;
  }
  .resource-section-content p:last-child {
    margin-bottom: 0;
  }
  .resource-section-content h4,
  .resource-section-content h5 {
    color: #101318;
    font-weight: 800;
    margin-top: 28px;
    margin-bottom: 14px;
    font-size: 22px;
  }
  .resource-section-content h5 {
    font-size: 20px;
  }
  .resource-section-content ul,
  .resource-section-content ol {
    margin: 22px 0;
    padding-left: 26px;
  }
  .resource-section-content li {
    margin-bottom: 14px;
    line-height: 1.85;
  }
  .resource-section-content strong {
    color: #101318;
    font-weight: 700;
  }
  .resource-section-cta {
    margin-top: 40px;
    padding-top: 32px;
    border-top: 1px solid rgba(16, 19, 24, 0.08);
  }
  .resource-section-cta-link {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: #f37920;
    font-weight: 700;
    font-size: 16px;
    text-decoration: none;
    transition: all 0.3s ease;
    padding: 12px 24px;
    border: 2px solid rgba(243, 121, 32, 0.2);
    border-radius: 10px;
    background: rgba(243, 121, 32, 0.05);
  }
  .resource-section-cta-link:hover {
    color: #ffffff;
    background: #f37920;
    border-color: #f37920;
    gap: 14px;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(243, 121, 32, 0.2);
  }
  .resource-section-cta-link i {
    font-size: 14px;
    transition: transform 0.3s ease;
  }
  .resource-section-cta-link:hover i {
    transform: translateX(2px);
  }
  @media (max-width: 991px) {
    .land-resources-hero {
      padding: 100px 0 80px;
    }
    .land-resources-hero h1 {
      font-size: 36px;
    }
    .land-resources-hero .hero-subtitle {
      font-size: 17px;
    }
    .land-resources-content {
      padding: 70px 0;
    }
    .resource-section {
      margin-bottom: 70px;
    }
    .resource-section-header {
      flex-direction: column;
      align-items: flex-start;
      gap: 16px;
    }
    .resource-section-content {
      margin-left: 0;
    }
    .resource-section-title {
      font-size: 26px;
    }
  }
  @media (max-width: 767px) {
    .land-resources-hero {
      padding: 90px 0 70px;
    }
    .land-resources-hero h1 {
      font-size: 30px;
    }
    .resource-section-content {
      font-size: 16px;
    }
    .resource-section-number {
      width: 40px;
      height: 40px;
      font-size: 18px;
    }
  }
</style>

<section class="land-resources-hero">
  <div class="container">
    <span class="eyebrow">Resources</span>
    <h1>{{ isset($resource) && $resource->title ? $resource->title : 'Land Resources' }}</h1>
    <p class="hero-subtitle">Essential information for land purchasers, sellers, and joint venture partners. Learn about prerequisites, requirements, and partnership opportunities.</p>
  </div>
</section>

<section class="land-resources-content">
  <div class="container">
    @if(isset($resource) && $resource->land_purchaser_notice)
    <div class="resource-section">
      <div class="resource-section-header">
        <div class="resource-section-number">1</div>
        <h2 class="resource-section-title">Land Purchaser Notice</h2>
      </div>
      <div class="resource-section-content">
        {!! $resource->land_purchaser_notice !!}
      </div>
      <div class="resource-section-cta">
        <a href="{{ route('contact') }}?subject={{ urlencode('Land Purchase Inquiry') }}" class="resource-section-cta-link">
          Get in Touch <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
    @endif

    @if(isset($resource) && $resource->land_seller)
    <div class="resource-section">
      <div class="resource-section-header">
        <div class="resource-section-number">2</div>
        <h2 class="resource-section-title">Land Seller Requirements</h2>
      </div>
      <div class="resource-section-content">
        {!! $resource->land_seller !!}
      </div>
      <div class="resource-section-cta">
        <a href="{{ route('contact') }}?subject={{ urlencode('Land Sale Inquiry') }}" class="resource-section-cta-link">
          Get in Touch <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
    @endif

    @if(isset($resource) && $resource->joint_ventures)
    <div class="resource-section">
      <div class="resource-section-header">
        <div class="resource-section-number">3</div>
        <h2 class="resource-section-title">Joint Ventures</h2>
      </div>
      <div class="resource-section-content">
        {!! $resource->joint_ventures !!}
      </div>
      <div class="resource-section-cta">
        <a href="{{ route('contact') }}?subject={{ urlencode('Joint Venture Inquiry') }}" class="resource-section-cta-link">
          Get in Touch <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
    @endif
  </div>
</section>
@endsection
