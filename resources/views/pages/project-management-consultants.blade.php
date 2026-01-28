@extends('layouts.master')

@section('title', $pmcPage->seo_title ?: $pmcPage->title)
@section('meta_title', $pmcPage->seo_title ?: $pmcPage->title)
@section('meta_description', $pmcPage->seo_description ?: '')

@section('content')
@php
  $scopeRows = collect(explode("\n", (string) $pmcPage->table_rows))
      ->map(fn ($row) => array_map('trim', explode('|', $row)))
      ->filter(fn ($row) => count($row) >= 2)
      ->values();
  $disciplineImages = collect(explode("\n", (string) $pmcPage->discipline_images))
      ->map(fn ($row) => trim($row))
      ->filter()
      ->values();
  $highlightItems = collect(explode("\n", (string) $pmcPage->highlights_items))
      ->map(fn ($row) => trim($row))
      ->filter()
      ->values();
  $metricItems = collect(explode("\n", (string) $pmcPage->metrics_items))
      ->map(fn ($row) => array_map('trim', explode('|', $row)))
      ->filter(fn ($row) => count($row) >= 2)
      ->values();
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
@endphp
<style>
  .pmc-hero {
    background: #101318;
    color: #ffffff;
    padding: 140px 0 100px;
    position: relative;
    overflow: hidden;
  }
  .pmc-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(16, 19, 24, 0.95) 0%, rgba(16, 19, 24, 0.98) 100%);
  }
  .pmc-hero .container {
    position: relative;
    z-index: 1;
  }
  .pmc-hero .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.4em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 20px;
    display: block;
  }
  .pmc-hero h1 {
    font-size: 56px;
    font-weight: 800;
    margin-bottom: 24px;
    color: #ffffff;
    line-height: 1.15;
    letter-spacing: -0.02em;
  }
  .pmc-hero .hero-subtitle {
    color: rgba(255, 255, 255, 0.85);
    font-size: 20px;
    line-height: 1.8;
    max-width: 720px;
    font-weight: 400;
  }
  .pmc-intro {
    padding: 100px 0;
    background: #ffffff;
  }
  .pmc-intro-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.08);
    border-radius: 24px;
    padding: 48px;
    box-shadow: 0 20px 50px rgba(16, 19, 24, 0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .pmc-intro-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 28px 60px rgba(16, 19, 24, 0.1);
  }
  .pmc-intro-card h3 {
    font-size: 36px;
    font-weight: 800;
    margin-bottom: 24px;
    color: #101318;
    line-height: 1.2;
  }
  .pmc-intro-card .intro-content {
    font-size: 18px;
    line-height: 1.85;
    color: #5c6570;
  }
  .pmc-intro-card .intro-content p {
    margin-bottom: 20px;
  }
  .pmc-intro-card .intro-content p:last-child {
    margin-bottom: 0;
  }
  .pmc-images {
    position: relative;
  }
  .pmc-images .image-wrapper {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(16, 19, 24, 0.12);
    transition: transform 0.4s ease;
  }
  .pmc-images .image-wrapper:hover {
    transform: scale(1.02);
  }
  .pmc-images img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    display: block;
  }
  .pmc-highlights {
    padding: 100px 0;
    background: linear-gradient(135deg, #101318 0%, #1a1f26 100%);
    color: #ffffff;
    position: relative;
    overflow: hidden;
  }
  .pmc-highlights::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(243, 121, 32, 0.1) 0%, transparent 70%);
    border-radius: 50%;
  }
  .pmc-highlights .section-header {
    margin-bottom: 50px;
  }
  .pmc-highlights .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.5);
    margin-bottom: 12px;
    display: block;
  }
  .pmc-highlights h3 {
    font-size: 42px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 16px;
    line-height: 1.2;
  }
  .pmc-highlights .section-intro {
    color: rgba(255, 255, 255, 0.75);
    font-size: 18px;
    line-height: 1.7;
    max-width: 500px;
  }
  .pmc-highlights-list {
    margin: 0;
    padding: 0;
    list-style: none;
  }
  .pmc-highlights-list li {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    padding: 24px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    transition: padding-left 0.3s ease;
  }
  .pmc-highlights-list li:last-child {
    border-bottom: none;
  }
  .pmc-highlights-list li:hover {
    padding-left: 8px;
  }
  .pmc-highlights-list .highlight-number {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    background: rgba(243, 121, 32, 0.15);
    border: 2px solid rgba(243, 121, 32, 0.3);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 800;
    color: #f37920;
  }
  .pmc-highlights-list .highlight-text {
    flex: 1;
    font-size: 17px;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.9);
    padding-top: 4px;
  }
  .pmc-metrics {
    padding: 100px 0;
    background: #f7f4ef;
  }
  .pmc-metrics .section-header {
    margin-bottom: 60px;
  }
  .pmc-metrics .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 12px;
    display: block;
  }
  .pmc-metrics h3 {
    font-size: 42px;
    font-weight: 800;
    color: #101318;
    margin-bottom: 16px;
    line-height: 1.2;
  }
  .pmc-metrics .section-intro {
    font-size: 18px;
    color: #5c6570;
    line-height: 1.7;
    max-width: 600px;
  }
  .pmc-metrics .metric-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.08);
    border-radius: 20px;
    padding: 36px;
    text-align: left;
    height: 100%;
    box-shadow: 0 12px 30px rgba(16, 19, 24, 0.06);
    transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
    position: relative;
    overflow: hidden;
  }
  .pmc-metrics .metric-card::before {
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
  .pmc-metrics .metric-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 45px rgba(16, 19, 24, 0.12);
    border-color: rgba(243, 121, 32, 0.2);
  }
  .pmc-metrics .metric-card:hover::before {
    transform: scaleY(1);
  }
  .pmc-metrics .metric-value {
    font-size: 42px;
    font-weight: 800;
    color: #101318;
    line-height: 1;
    margin-bottom: 12px;
    letter-spacing: -0.02em;
  }
  .pmc-metrics .metric-label {
    text-transform: uppercase;
    letter-spacing: 0.2em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.6);
    line-height: 1.5;
  }
  .pmc-scope {
    padding: 100px 0;
    background: #ffffff;
  }
  .pmc-scope .section-header {
    margin-bottom: 60px;
  }
  .pmc-scope .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 12px;
    display: block;
  }
  .pmc-scope h3 {
    font-size: 42px;
    font-weight: 800;
    color: #101318;
    margin-bottom: 16px;
    line-height: 1.2;
  }
  .pmc-scope .section-intro {
    font-size: 18px;
    color: #5c6570;
    line-height: 1.7;
    max-width: 600px;
  }
  .pmc-discipline-card {
    border-radius: 24px;
    border: 1px solid rgba(16, 19, 24, 0.08);
    box-shadow: 0 20px 50px rgba(16, 19, 24, 0.08);
    overflow: hidden;
    background: #ffffff;
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    margin-bottom: 32px;
  }
  .pmc-discipline-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 30px 70px rgba(16, 19, 24, 0.15);
    border-color: rgba(243, 121, 32, 0.2);
  }
  .pmc-discipline-media {
    position: relative;
    overflow: hidden;
  }
  .pmc-discipline-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    min-height: 360px;
    transition: transform 0.6s ease;
  }
  .pmc-discipline-card:hover .pmc-discipline-media img {
    transform: scale(1.08);
  }
  .pmc-discipline-content {
    padding: 48px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .pmc-discipline-content .discipline-label {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 11px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 16px;
    display: block;
  }
  .pmc-discipline-content h4 {
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 16px;
    color: #101318;
    line-height: 1.2;
  }
  .pmc-discipline-content p {
    font-size: 17px;
    line-height: 1.8;
    color: #5c6570;
    margin-bottom: 0;
  }
  .pmc-projects {
    padding: 100px 0;
    background: #f7f4ef;
  }
  .pmc-projects .section-header {
    margin-bottom: 60px;
  }
  .pmc-projects .eyebrow {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 12px;
    display: block;
  }
  .pmc-projects h3 {
    font-size: 42px;
    font-weight: 800;
    color: #101318;
    margin-bottom: 16px;
    line-height: 1.2;
  }
  .pmc-projects .section-intro {
    font-size: 18px;
    color: #5c6570;
    line-height: 1.7;
    max-width: 600px;
  }
  .pmc-project-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 28px;
  }
  .pmc-project-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.08);
    border-radius: 22px;
    padding: 0;
    box-shadow: 0 12px 30px rgba(16, 19, 24, 0.08);
    height: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    text-decoration: none;
    color: inherit;
  }
  .pmc-project-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 24px 60px rgba(16, 19, 24, 0.15);
    border-color: rgba(243, 121, 32, 0.3);
    text-decoration: none;
    color: inherit;
  }
  .pmc-project-card .project-image {
    width: 100%;
    height: 280px;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease;
  }
  .pmc-project-card:hover .project-image {
    transform: scale(1.1);
  }
  .pmc-project-card .card-body {
    padding: 32px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .pmc-project-card .project-label {
    text-transform: uppercase;
    letter-spacing: 0.2em;
    font-size: 11px;
    font-weight: 700;
    color: rgba(16, 19, 24, 0.5);
    margin-bottom: 12px;
    display: block;
  }
  .pmc-project-card h5 {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 16px;
    color: #101318;
    line-height: 1.3;
  }
  .pmc-project-card .project-meta {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }
  .pmc-project-card .project-meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #5c6570;
    font-weight: 500;
  }
  .pmc-project-card .project-meta-item i {
    color: #f37920;
    font-size: 16px;
  }
  .pmc-project-card .timeline-badge {
    background: #101318;
    color: #ffffff;
    padding: 10px 20px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: auto;
    align-self: flex-start;
  }
  .pmc-project-card .timeline-badge i {
    font-size: 12px;
  }
  .pmc-cta {
    background: linear-gradient(135deg, #101318 0%, #1a1f26 100%);
    padding: 100px 0;
    color: #ffffff;
    position: relative;
    overflow: hidden;
  }
  .pmc-cta::before {
    content: "";
    position: absolute;
    bottom: 0;
    right: 0;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(243, 121, 32, 0.08) 0%, transparent 70%);
    border-radius: 50%;
  }
  .pmc-cta .cta-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 24px;
    padding: 48px;
    position: relative;
    z-index: 1;
  }
  .pmc-cta .cta-badge {
    text-transform: uppercase;
    letter-spacing: 0.3em;
    font-size: 12px;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 16px;
    display: block;
  }
  .pmc-cta h3 {
    font-size: 42px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 20px;
    line-height: 1.2;
  }
  .pmc-cta .cta-body {
    font-size: 18px;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 32px;
  }
  .pmc-cta .btn-light {
    background: #ffffff;
    color: #101318;
    font-weight: 700;
    padding: 16px 32px;
    border-radius: 12px;
    font-size: 16px;
    transition: all 0.3s ease;
    border: none;
  }
  .pmc-cta .btn-light:hover {
    background: #f37920;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(243, 121, 32, 0.3);
  }
  @media (max-width: 991px) {
    .pmc-hero h1 {
      font-size: 40px;
    }
    .pmc-hero .hero-subtitle {
      font-size: 18px;
    }
    .pmc-intro-card,
    .pmc-discipline-content {
      padding: 32px;
    }
    .pmc-discipline-media img {
      min-height: 280px;
    }
    .pmc-project-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<section class="pmc-hero">
  <div class="container">
    <span class="eyebrow">Project Management Consultants</span>
    <h1>{{ $pmcPage->hero_title }}</h1>
    @if($pmcPage->hero_subtitle)
      <div class="hero-subtitle">{!! $pmcPage->hero_subtitle !!}</div>
    @endif
  </div>
</section>

<section class="pmc-intro">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <div class="pmc-intro-card">
          <h3>{{ $pmcPage->title }}</h3>
          <div class="intro-content">{!! $pmcPage->intro !!}</div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row g-4">
          <div class="col-6">
            <div class="image-wrapper">
              <img src="{{ $resolveImage($pmcPage->image_one ?: 'uploads/kitchen.jpg') }}" alt="Project management consulting showcase">
            </div>
          </div>
          <div class="col-6">
            <div class="image-wrapper" style="margin-top: 40px;">
              <img src="{{ $resolveImage($pmcPage->image_two ?: 'uploads/wardrobe.jpeg') }}" alt="Project delivery craftsmanship">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="pmc-highlights">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Our Approach</span>
      <h3>{{ $pmcPage->highlights_title }}</h3>
      <p class="section-intro">A professional, accountable approach designed to protect timelines and quality.</p>
    </div>
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <ul class="pmc-highlights-list">
          @foreach($highlightItems as $index => $item)
            <li>
              <div class="highlight-number">{{ sprintf('%02d', $index + 1) }}</div>
              <div class="highlight-text">{{ $item }}</div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="pmc-metrics">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Performance</span>
      <h3>{{ $pmcPage->metrics_title }}</h3>
      <p class="section-intro">Evidence of consistent delivery, measured across the projects we lead.</p>
    </div>
    <div class="row g-4">
      @foreach($metricItems as $metric)
        <div class="col-lg-3 col-md-6">
          <div class="metric-card">
            <div class="metric-value">{{ $metric[1] }}</div>
            <div class="metric-label">{{ $metric[0] }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="pmc-scope">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Expertise</span>
      <h3>{{ $pmcPage->table_title }}</h3>
      <div class="section-intro">{!! $pmcPage->table_intro !!}</div>
    </div>
    <div class="row">
      @foreach($scopeRows as $index => $row)
        @php
          $image = $disciplineImages[$index] ?? $pmcPage->image_one ?? 'uploads/kitchen.jpg';
          $reverse = $index % 2 === 1 ? 'flex-lg-row-reverse' : '';
        @endphp
        <div class="col-12">
          <div class="pmc-discipline-card">
            <div class="row g-0 align-items-stretch {{ $reverse }}">
              <div class="col-lg-5 pmc-discipline-media">
                <img src="{{ $resolveImage($image) }}" alt="{{ $row[0] }} expertise">
              </div>
              <div class="col-lg-7 d-flex align-items-center">
                <div class="pmc-discipline-content">
                  <span class="discipline-label">Professional Discipline</span>
                  <h4>{{ $row[0] }}</h4>
                  <p>{{ $row[1] }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="pmc-projects">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Portfolio</span>
      <h3>{{ $pmcPage->sample_projects_title }}</h3>
      <div class="section-intro">{!! $pmcPage->sample_projects_intro !!}</div>
    </div>
    <div class="pmc-project-grid">
      @foreach($pmcProjects as $project)
        <a class="pmc-project-card" href="{{ route('project-management-consultants.project', $project->slug) }}">
          @if($project->image)
            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="project-image">
          @endif
          <div class="card-body">
            <span class="project-label">Sample Project</span>
            <h5>{{ $project->title }}</h5>
            <div class="project-meta">
              @if($project->location)
                <div class="project-meta-item">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>{{ $project->location }}</span>
                </div>
              @endif
            </div>
            @if($project->timeline)
              <span class="timeline-badge">
                <i class="fas fa-clock"></i>
                {{ $project->timeline }}
              </span>
            @endif
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

<section class="pmc-cta">
  <div class="container">
    <div class="cta-card">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <span class="cta-badge">Get Started</span>
          <h3>{{ $pmcPage->cta_title }}</h3>
          <div class="cta-body">{!! $pmcPage->cta_body !!}</div>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="{{ $pmcPage->cta_button_link ?? url('/contact-us') }}" class="btn btn-light btn-lg">
            {{ $pmcPage->cta_button_text ?? 'Book a Consultation' }}
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
