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
      Our Services
      <span class="about-underline"></span>
    </h1>
  </div>
</section>
    {{--  --}}

<section class="intro-section wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.3s">
  <div class="intro-container">
    <div class="intro-text">
      <h2 class="wow fadeInDown" data-wow-delay="0.4s">Our Services</h2>
      <h4 class="wow fadeInUp" data-wow-delay="0.6s" style="color:#f37920">Experience Design At Its Majesty.</h4>

      <p class="wow fadeIn" data-wow-delay="0.8s" >
        Our Services highlight our expertise in creating functional
                        and stylish spaces. From residential to commercial projects,
                        we deliver bespoke interiors that blend aesthetics with
                        purpose, crafting environments that inspire and endure.
      </p>
      <a href="{{url('our-work')}}" class="intro-btn wow zoomIn" data-wow-delay="1s">
        Explore Portfolio &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>



     <!-- About Us -->
    <section class="about-us .pq-about-bg-color pq-bg-grey">

        <div class="container-fluid">
            <?php
                $Services = \App\Models\Service::all();
                $Count = 1;
            ?>
            @foreach ($Services as $service )
            @if ($Count % 2 !== 0)
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
                            Our creative work is more than aesthetics; it is a narrative. We approach each space with a
                            singular vision, where interior design, architecture, and creative direction converge to create
                            environments that speak. Rooted in timeless elegance and modern sensibility, we craft spaces
                            that not only inspire but also embody the essence of those who inhabit them.
                        </p>
                        <p class="pq-section-description about-us-text text-black">
                            Innovation defines who we are. Through the fusion of advanced technology and collaborations
                            with world-class artisans, we reimagine interior spaces with unparalleled creativity. Harnessing
                            the power of ever evolving technology infused with industry-leading partnerships, we craft
                            environments that elevate everyday life, shaping a future where design and functionality meets
                            in perfect harmony.
                        </p>
                    </div>

                   <div class="d-flex justify-content-centers">
                        <a class="pq-button pq-button-flat pq-btn-white pq-mb-35" href="{{route('services')}}/{{$service->slung}}">
                            <div class="pq-button-block">
                                <span class="pq-button-text">Learn More </span>
                                <span class="pq-button-line-right"></span>
                                <i class="ion ion-ios-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @else
            {{--  --}}
            <div class="row">
                <div class="col-xl-6 pq-about-us-padding d-flex flex-column justify-content-center wow animated fadeInLeft pq-about-bg-colors">
                    <div class="pq-section-title pq-style-1 pq-mb-35">
                        <h5  style="text-transform: capitalize; color:#f37920; font-weight:800;">{{$service->title}}</h5>

                        <p class="pq-section-description about-us-text text-black service-text">
                            Our creative work is more than aesthetics; it is a narrative. We approach each space with a
                            singular vision, where interior design, architecture, and creative direction converge to create
                            environments that speak. Rooted in timeless elegance and modern sensibility, we craft spaces
                            that not only inspire but also embody the essence of those who inhabit them.
                        </p>
                        <p class="pq-section-description about-us-text text-black">
                            Innovation defines who we are. Through the fusion of advanced technology and collaborations
                            with world-class artisans, we reimagine interior spaces with unparalleled creativity. Harnessing
                            the power of ever evolving technology infused with industry-leading partnerships, we craft
                            environments that elevate everyday life, shaping a future where design and functionality meets
                            in perfect harmony.
                        </p>
                    </div>

                    <div class="d-flex justify-content-centers">
                        <a class="pq-button pq-button-flat pq-btn-white pq-mb-35" href="{{route('services')}}/{{$service->slung}}">
                            <div class="pq-button-block">
                                <span class="pq-button-text">Learn More </span>
                                <span class="pq-button-line-right"></span>
                                <i class="ion ion-ios-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 padding-reset">
                    <div class="about-us-img">
                        <img src="{{ asset('storage/'.$service->image) }}" class="service-images pq-image1 wow animated fadeInRight" alt="">
                    </div>
                </div>
            </div>
            @endif
            <?php $Count++; ?>
            @endforeach
        </div>
    </section>
    <!-- About Us -->



@endsection
