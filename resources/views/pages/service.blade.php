@extends('layouts.master')

@section('content')

<section class="about-hero position-relative">
  <!-- Background Image -->
   <div class="about-hero-bg" style=" background-image: url('{{ asset('storage/'.$service->image) }}');"></div>

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
    {{--  --}}

<section class="intro-section wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.3s">
  <div class="intro-container">
    <div class="intro-text">
      <h2 class="wow fadeInDown" data-wow-delay="0.4s">Our Services</h2>
      <h4 class="wow fadeInUp" data-wow-delay="0.6s" style="color:#f37920"> {{$service->title}}</h4>

      <p class="wow fadeIn" data-wow-delay="0.8s" >
        {{$service->meta}}
      </p>
      <a href="{{url('our-work')}}" class="intro-btn wow zoomIn" data-wow-delay="1s">
        Explore {{$service->title}} Portfolio &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>



     <!-- About Us -->
    <section class="about-us .pq-about-bg-color pq-bg-grey">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-6 padding-reset">
                    <div class="about-us-img">
                        <img src="{{ asset('storage/'.$service->image) }}" class="service-images pq-image1 wow animated fadeInLeft" alt="">
                    </div>
                </div>
                <div class="col-xl-6 pq-about-us-padding d-flex flex-column justify-content-center wow animated fadeInRight pq-about-bg-colors">
                    <div class="pq-section-title pq-style-1 pq-mb-35">
                         <h5  style="text-transform: capitalize; color:#f37920; font-weight:800;">{{$service->title}}</h5>

                        <p class="pq-section-description about-us-text text-black">
                          {!! $service->title !!}
                        </p>

                    </div>

                </div>
            </div>


        </div>
    </section>
    <!-- About Us -->



@endsection
