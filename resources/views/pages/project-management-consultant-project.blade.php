@extends('layouts.master')

@section('title', $project->title)
@section('meta_title', $project->title)
@section('meta_description', $project->excerpt ?: '')

@section('content')
<style>
  .pmc-project-hero {
    background: #101318;
    color: #ffffff;
    padding: 90px 0 70px;
  }
  .pmc-project-hero h1 {
    font-weight: 800;
    margin-bottom: 12px;
  }
  .pmc-project-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.12);
    border-radius: 18px;
    padding: 24px;
    box-shadow: 0 14px 26px rgba(16, 19, 24, 0.06);
  }
  .pmc-project-body {
    padding: 70px 0;
    background: #ffffff;
  }
  .pmc-project-body img {
    width: 100%;
    border-radius: 18px;
    object-fit: cover;
  }
</style>

<section class="pmc-project-hero">
  <div class="container">
    <span class="eyebrow text-uppercase" style="letter-spacing: 0.3em; font-size: 12px;">Sample Project</span>
    <h1>{{ $project->title }}</h1>
    @if($project->excerpt)
      <p style="color: rgba(255, 255, 255, 0.75); max-width: 700px;">{{ $project->excerpt }}</p>
    @endif
  </div>
</section>

<section class="pmc-project-body">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-5">
        <div class="pmc-project-card">
          @if($project->image)
            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
          @endif
          <div class="mt-3">
            <div class="text-muted">Location</div>
            <div class="font-weight-bold">{{ $project->location }}</div>
          </div>
          <div class="mt-3">
            <div class="text-muted">Timeline</div>
            <div class="font-weight-bold">{{ $project->timeline }}</div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="pmc-project-card">
          <h3 class="mb-3">Project Overview</h3>
          <p class="mb-0">{!! nl2br(e($project->body ?? '')) !!}</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
