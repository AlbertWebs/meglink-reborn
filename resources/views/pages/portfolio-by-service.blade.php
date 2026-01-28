@extends('layouts.master-renders')

@section('content')

<style>
    .portfolio-filter-wrap {
        background: #0f1218;
        border-radius: 22px;
        padding: 22px;
        box-shadow: 0 20px 50px rgba(16, 19, 24, 0.18);
        border: 1px solid rgba(255, 255, 255, 0.08);
        margin-top: 20px;
        position: sticky;
        top: 90px;
        z-index: 20;
    }
    .portfolio-filter-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 18px;
    }
    .portfolio-filter-title {
        font-weight: 700;
        color: #ffffff;
        letter-spacing: 0.24em;
        text-transform: uppercase;
        font-size: 11px;
        margin: 0;
    }
    .portfolio-filter-hint {
        color: rgba(255, 255, 255, 0.6);
        font-size: 13px;
        margin: 0;
    }
    .portfolio-filters {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 12px;
        margin: 0;
    }
    .portfolio-filter-link {
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 12px 14px;
        border-radius: 14px;
        border: 1px solid rgba(255, 255, 255, 0.14);
        color: rgba(255, 255, 255, 0.8);
        font-weight: 600;
        font-size: 13px;
        text-decoration: none;
        background: rgba(255, 255, 255, 0.04);
        transition: all 0.2s ease;
    }
    .portfolio-filter-link:hover {
        border-color: rgba(243, 121, 32, 0.7);
        color: #ffffff;
        background: rgba(243, 121, 32, 0.18);
    }
    .portfolio-filter-link.active {
        background: #f37920;
        border-color: #f37920;
        color: #101318;
        box-shadow: 0 10px 20px rgba(243, 121, 32, 0.25);
    }
    .portfolio-filter-count {
        font-size: 11px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.55);
    }
    .portfolio-filter-link.active .portfolio-filter-count {
        color: rgba(16, 19, 24, 0.7);
    }
    @media (max-width: 767px) {
        .portfolio-filters {
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .portfolio-filter-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .portfolio-filters {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
        .portfolio-filter-link {
            padding: 10px 12px;
        }
    }
    @media (max-width: 480px) {
        .portfolio-filters {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="about-hero position-relative">
    <!-- Background Image -->
    <div class="about-hero-bg" style=" background-image: url('{{ asset('uploads/kitchen.jpg') }}');"></div>

    <!-- Overlay -->
    <div class="about-hero-overlay"></div>

    <!-- Text Content -->
    <div class="container position-relative about-hero-content">
        <h1 class="about-title">
            {{$service->title}}
            <span class="about-underline"></span>
        </h1>
    </div>
</section>

<section>
    <div class="container">
        <div class="portfolio-filter-wrap">
            <div class="portfolio-filter-header">
                <p class="portfolio-filter-title">Filter by category</p>
                <p class="portfolio-filter-hint">Currently viewing {{ $service->title }}.</p>
            </div>
            <div class="portfolio-filters">
                <a class="portfolio-filter-link" href="{{ route('our-work') }}">
                    All <span class="portfolio-filter-count">All</span>
                </a>
                @foreach($services as $filterService)
                    <a class="portfolio-filter-link {{ $filterService->id === $service->id ? 'active' : '' }}"
                       href="{{ route('portfolio-service', $filterService->slung) }}">
                        {{ $filterService->title }}
                        <span class="portfolio-filter-count">View</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="renders-gallery py-5 bg-light">
    <div class="container">
        <div class="row g-4 popup-gallery">
            @forelse($portfolios as $render)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item position-relative overflow-hidden">
                        <a href="{{ asset('storage/' . $render->image) }}" title="{{ $render->title }}">
                            <img src="{{ asset('storage/' . $render->image) }}" alt="{{ $render->title }}"
                                class="img-fluid rounded" style="height: 320px; object-fit: cover;">
                            <div class="gallery-overlay position-absolute bottom-0 start-0 w-100 p-3"
                                style="background: rgba(0,0,0,0.6); color: #f37920;">
                                <h5 class="m-0 fw-semibold text-white">{{ $render->title }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No portfolio images available for {{$service->title}} yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
