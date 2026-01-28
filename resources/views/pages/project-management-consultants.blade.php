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
    padding: 110px 0 80px;
  }
  .pmc-hero h1 {
    font-size: 46px;
    font-weight: 800;
    margin-bottom: 18px;
    color: #ffffff;
  }
  .pmc-hero p {
    color: rgba(255, 255, 255, 0.78);
    font-size: 17px;
    line-height: 1.9;
    max-width: 640px;
  }
  .pmc-intro {
    padding: 70px 0;
    background: #ffffff;
  }
  .pmc-intro-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.12);
    border-radius: 22px;
    padding: 32px;
    box-shadow: 0 18px 32px rgba(16, 19, 24, 0.08);
  }
  .pmc-images img {
    width: 100%;
    border-radius: 18px;
    object-fit: cover;
    min-height: 220px;
  }
  .pmc-scope {
    padding: 70px 0;
    background: #ffffff;
  }
  .pmc-highlights {
    padding: 60px 0;
    background: #101318;
    color: #ffffff;
  }
  .pmc-highlights h3 {
    color: #ffffff;
  }
  .pmc-highlights ul {
    margin: 0;
    padding: 0;
    list-style: none;
  }
  .pmc-highlights li {
    display: flex;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }
  .pmc-highlights li:last-child {
    border-bottom: none;
  }
  .pmc-highlights .badge {
    background: #f37920;
    color: #ffffff;
    font-weight: 700;
    letter-spacing: 0.05em;
  }
  .pmc-metrics {
    padding: 60px 0;
    background: #ffffff;
  }
  .pmc-metrics .metric-card {
    border: 1px solid rgba(16, 19, 24, 0.12);
    border-radius: 18px;
    padding: 22px;
    text-align: left;
    height: 100%;
    box-shadow: 0 14px 28px rgba(16, 19, 24, 0.06);
  }
  .pmc-metrics .metric-value {
    font-size: 28px;
    font-weight: 800;
    color: #101318;
  }
  .pmc-metrics .metric-label {
    text-transform: uppercase;
    letter-spacing: 0.15em;
    font-size: 11px;
    color: rgba(16, 19, 24, 0.6);
  }
  .pmc-discipline-card {
    border-radius: 22px;
    border: 1px solid rgba(16, 19, 24, 0.12);
    box-shadow: 0 16px 28px rgba(16, 19, 24, 0.06);
    overflow: hidden;
    background: #ffffff;
    display: flex;
    flex-direction: column;
    height: 100%;
  }
  .pmc-discipline-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    min-height: 220px;
  }
  .pmc-discipline-content {
    padding: 28px;
  }
  .pmc-discipline-content h4 {
    font-weight: 700;
    margin-bottom: 12px;
  }
  .pmc-projects {
    padding: 70px 0;
    background: #ffffff;
  }
  .pmc-project-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 18px;
  }
  .pmc-project-card {
    border: 1px solid rgba(16, 19, 24, 0.12);
    border-radius: 18px;
    padding: 22px;
    box-shadow: 0 14px 26px rgba(16, 19, 24, 0.06);
    height: 100%;
  }
  .pmc-project-card h5 {
    font-weight: 700;
    margin-bottom: 6px;
  }
  .pmc-project-card .badge {
    background: #101318;
    color: #ffffff;
  }
  .pmc-cta {
    background: #101318;
    padding: 70px 0;
    color: #ffffff;
  }
  .pmc-cta h3 {
    font-weight: 800;
  }
</style>

<section class="pmc-hero">
  <div class="container">
    <span class="eyebrow text-uppercase" style="letter-spacing: 0.3em; font-size: 12px;">Project Management Consultants</span>
    <h1>{{ $pmcPage->hero_title }}</h1>
    @if($pmcPage->hero_subtitle)
      <div>{!! $pmcPage->hero_subtitle !!}</div>
    @endif
  </div>
</section>

<section class="pmc-intro">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6">
        <div class="pmc-intro-card">
          <h3 class="mb-3">{{ $pmcPage->title }}</h3>
          <div class="mb-0">{!! $pmcPage->intro !!}</div>
        </div>
      </div>
      <div class="col-lg-6 pmc-images">
        <div class="row g-3">
          <div class="col-6">
            <img src="{{ $resolveImage($pmcPage->image_one ?: 'uploads/kitchen.jpg') }}" alt="Project management consulting showcase">
          </div>
          <div class="col-6">
            <img src="{{ $resolveImage($pmcPage->image_two ?: 'uploads/wardrobe.jpeg') }}" alt="Project delivery craftsmanship">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="pmc-highlights">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-5">
        <h3 class="mb-2">{{ $pmcPage->highlights_title }}</h3>
        <p class="mb-0" style="color: rgba(255, 255, 255, 0.7);">A professional, accountable approach designed to protect timelines and quality.</p>
      </div>
      <div class="col-lg-7">
        <ul>
          @foreach($highlightItems as $index => $item)
            <li>
              <span class="badge px-3 py-2">{{ sprintf('%02d', $index + 1) }}</span>
              <span>{{ $item }}</span>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="pmc-metrics">
  <div class="container">
    <div class="row align-items-end mb-4">
      <div class="col-lg-7">
        <h3 class="mb-2">{{ $pmcPage->metrics_title }}</h3>
        <p class="text-muted mb-0">Evidence of consistent delivery, measured across the projects we lead.</p>
      </div>
    </div>
    <div class="row g-4">
      @foreach($metricItems as $metric)
        <div class="col-lg-3 col-md-6">
          <div class="metric-card">
            <div class="metric-value">{{ $metric[1] }}</div>
            <div class="metric-label mt-2">{{ $metric[0] }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="pmc-scope">
  <div class="container">
    <div class="row align-items-end mb-4">
      <div class="col-lg-7">
        <h3 class="mb-2">{{ $pmcPage->table_title }}</h3>
        <div class="text-muted mb-0">{!! $pmcPage->table_intro !!}</div>
      </div>
    </div>
    <div class="row g-4">
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
                  <span class="eyebrow text-uppercase" style="letter-spacing: 0.3em; font-size: 11px; color: rgba(16, 19, 24, 0.6);">Professional Discipline</span>
                  <h4 class="text-dark">{{ $row[0] }}</h4>
                  <p class="mb-0 text-muted">{{ $row[1] }}</p>
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
    <div class="row align-items-end mb-4">
      <div class="col-lg-7">
        <h3 class="mb-2">{{ $pmcPage->sample_projects_title }}</h3>
        <div class="text-muted mb-0">{!! $pmcPage->sample_projects_intro !!}</div>
      </div>
    </div>
    <div class="pmc-project-grid">
      @foreach($pmcProjects as $project)
        <a class="pmc-project-card text-decoration-none text-dark" href="{{ route('project-management-consultants.project', $project->slug) }}">
          @if($project->image)
            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" style="width: 100%; border-radius: 14px; object-fit: cover; min-height: 160px;">
          @endif
          <span class="eyebrow text-uppercase d-block mt-3" style="letter-spacing: 0.3em; font-size: 11px; color: rgba(16, 19, 24, 0.6);">Sample Project</span>
          <h5 class="mt-2">{{ $project->title }}</h5>
          <p class="mb-2 text-muted">{{ $project->location }}</p>
          <span class="badge px-3 py-2">{{ $project->timeline }}</span>
        </a>
      @endforeach
    </div>
  </div>
</section>

<section class="pmc-cta">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h3>{{ $pmcPage->cta_title }}</h3>
        <div class="mb-0">{!! $pmcPage->cta_body !!}</div>
      </div>
      <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <a href="{{ $pmcPage->cta_button_link ?? url('/contact-us') }}" class="btn btn-light btn-lg">
          {{ $pmcPage->cta_button_text ?? 'Book a Consultation' }}
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
