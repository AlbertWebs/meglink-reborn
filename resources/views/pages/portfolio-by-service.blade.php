@extends('layouts.master-renders')

@section('content')

@extends('layouts.master')

@section('content')



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
                        <p class="text-muted">No renders available at the moment. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection


@endsection
