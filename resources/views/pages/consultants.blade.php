@extends('layouts.master')

@section('content')
<style>
  .consultants-hero {
    background: radial-gradient(circle at 20% 20%, rgba(243, 121, 32, 0.18), transparent 55%),
                radial-gradient(circle at 80% 10%, rgba(255, 255, 255, 0.06), transparent 45%),
                #0f141b;
    color: #ffffff;
    padding: 100px 0 80px;
  }
  .consultants-hero h1 {
    font-size: 46px;
    font-weight: 800;
    margin-bottom: 18px;
  }
  .consultants-hero p {
    color: rgba(255, 255, 255, 0.78);
    font-size: 17px;
    line-height: 1.9;
    max-width: 640px;
  }
  .consultants-intro {
    padding: 70px 0;
    background: #ffffff;
  }
  .consultants-intro .intro-card {
    background: #f8f6f2;
    border-radius: 20px;
    padding: 32px;
    box-shadow: 0 20px 40px rgba(17, 22, 30, 0.08);
  }
  .consultants-pillars {
    padding: 70px 0;
    background: #f2f4f7;
  }
  .consultants-pillars .pillar-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 26px;
    height: 100%;
    box-shadow: 0 14px 30px rgba(15, 20, 27, 0.08);
  }
  .consultants-pillars h5 {
    font-weight: 700;
    color: #101318;
  }
  .consultants-cta {
    background: linear-gradient(135deg, rgba(243, 121, 32, 0.92), rgba(16, 19, 24, 0.95));
    padding: 70px 0;
    color: #ffffff;
  }
  .consultants-cta h3 {
    font-weight: 800;
  }
</style>

<section class="consultants-hero">
  <div class="container">
    <span class="eyebrow text-uppercase" style="letter-spacing: 0.3em; font-size: 12px;">Consultants</span>
    <h1>{{ $infoPage->hero_title }}</h1>
    @if($infoPage->hero_subtitle)
      <p>{{ $infoPage->hero_subtitle }}</p>
    @endif
  </div>
</section>

<section class="consultants-intro">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <div class="intro-card">
          <h3 class="mb-3">{{ $infoPage->title }}</h3>
          <p class="mb-0">{!! nl2br(e($infoPage->intro ?? '')) !!}</p>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="p-4">
          <h5 class="mb-3">What we deliver</h5>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Scope definition and alignment</li>
            <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Budget clarity and milestone control</li>
            <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Supplier, contractor, and stakeholder coordination</li>
            <li><i class="fas fa-check-circle text-warning me-2"></i>Design intent protected through execution</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="consultants-pillars">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="pillar-card">
          <h5>{{ $infoPage->section_one_title }}</h5>
          <p class="mb-0">{!! nl2br(e($infoPage->section_one_body ?? '')) !!}</p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="pillar-card">
          <h5>{{ $infoPage->section_two_title }}</h5>
          <p class="mb-0">{!! nl2br(e($infoPage->section_two_body ?? '')) !!}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="consultants-cta">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h3>{{ $infoPage->cta_title }}</h3>
        <p class="mb-0">{!! nl2br(e($infoPage->cta_body ?? '')) !!}</p>
      </div>
      <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <a href="{{ $infoPage->cta_button_link ?? url('/contact-us') }}" class="btn btn-light btn-lg">
          {{ $infoPage->cta_button_text ?? 'Book a Consultation' }}
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
