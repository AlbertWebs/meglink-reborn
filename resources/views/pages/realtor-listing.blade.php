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
@endphp
<style>
  .realtor-listing-hero {
    background: #101318;
    color: #ffffff;
    padding: 90px 0 70px;
  }
  .realtor-listing-hero h1 {
    font-weight: 800;
    margin-bottom: 12px;
  }
  .realtor-listing-card {
    background: #ffffff;
    border: 1px solid rgba(16, 19, 24, 0.12);
    border-radius: 18px;
    padding: 24px;
    box-shadow: 0 14px 26px rgba(16, 19, 24, 0.06);
  }
  .realtor-listing-body {
    padding: 70px 0;
    background: #ffffff;
  }
  .realtor-listing-body img {
    width: 100%;
    border-radius: 18px;
    object-fit: cover;
  }
</style>

<section class="realtor-listing-hero">
  <div class="container">
    <span class="eyebrow text-uppercase" style="letter-spacing: 0.3em; font-size: 12px;">Sample Listing</span>
    <h1>{{ $listing->title }}</h1>
    @if($listing->excerpt)
      <p style="color: rgba(255, 255, 255, 0.75); max-width: 700px;">{{ $listing->excerpt }}</p>
    @endif
  </div>
</section>

<section class="realtor-listing-body">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-5">
        <div class="realtor-listing-card">
          @if($listing->image)
            <img src="{{ $resolveImage($listing->image) }}" alt="{{ $listing->title }}">
          @endif
          <div class="mt-3">
            <div class="text-muted">Location</div>
            <div class="font-weight-bold">{{ $listing->location }}</div>
          </div>
          <div class="mt-3">
            <div class="text-muted">Timeline</div>
            <div class="font-weight-bold">{{ $listing->timeline }}</div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="realtor-listing-card">
          <h3 class="mb-3">Listing Overview</h3>
          <p class="mb-0">{!! nl2br(e($listing->body ?? '')) !!}</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
