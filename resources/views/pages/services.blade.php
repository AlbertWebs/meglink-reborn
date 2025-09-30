@extends('layouts.master')

@section('content')

 <!-- Breadcrumb -->
    <div class="pq-breadcrumb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="pq-breadcrumb-title">
                            <h1>What We Do</h1>
                        </div>
                        <div class="pq-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}"><i class="fas fa-home me-2"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item active">What We Do</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb -->

    {{--  --}}

 <!-- About Us -->
    <section style="padding-bottom: 0" >

        <div class="container">

            {{--  --}}
            <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 wow  fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <div class="pq-section-title pq-style-1">
                    <h2 class="headline-intro"  style="font-weight:900;">
                        Our Services
                    </h2>
                    <br>

                    <p>
                        {{--  --}}
                         Our Services highlight our expertise in creating functional
                        and stylish spaces. From residential to commercial projects,
                        we deliver bespoke interiors that blend aesthetics with
                        purpose, crafting environments that inspire and endure.
                        {{--  --}}
                    </p>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 wow  fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <div class="button-align">
                    <a class="pq-button pq-button-flat" href="{{route('our-work')}}">
                        <div class="pq-button-block">
                        <span class="pq-button-text">Browse Portfolio </span>
                        <span class="pq-button-line-right"></span>
                        <i class="ion ion-ios-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="divider pq-right-border pq-45"></div>
            </div>

            </div>
            {{--  --}}

        </div>
    </section>
    <!-- About Us -->
    {{--  --}}

     <!-- About Us -->
    <section class="about-us .pq-about-bg-color">

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
                <div class="col-xl-6 pq-about-us-padding d-flex flex-column justify-content-center wow animated fadeInRight pq-about-bg-color">
                    <div class="pq-section-title pq-style-1 pq-mb-35">
                         <h5  style="text-transform: capitalize; color:#f37920; font-weight:800;">{{$service->title}}</h5>

                        <p class="pq-section-description about-us-text">
                            Our creative work is more than aesthetics; it is a narrative. We approach each space with a
                            singular vision, where interior design, architecture, and creative direction converge to create
                            environments that speak. Rooted in timeless elegance and modern sensibility, we craft spaces
                            that not only inspire but also embody the essence of those who inhabit them.
                        </p>
                        <p class="pq-section-description about-us-text">
                            Innovation defines who we are. Through the fusion of advanced technology and collaborations
                            with world-class artisans, we reimagine interior spaces with unparalleled creativity. Harnessing
                            the power of ever evolving technology infused with industry-leading partnerships, we craft
                            environments that elevate everyday life, shaping a future where design and functionality meets
                            in perfect harmony.
                        </p>
                    </div>

                   <div class="d-flex justify-content-centers">
                        <a class="pq-button pq-button-flat pq-btn-white pq-mb-35" href="{{route('our-work')}}">
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
                <div class="col-xl-6 pq-about-us-padding d-flex flex-column justify-content-center wow animated fadeInLeft pq-about-bg-color">
                    <div class="pq-section-title pq-style-1 pq-mb-35">
                        <h5  style="text-transform: capitalize; color:#f37920; font-weight:800;">{{$service->title}}</h5>

                        <p class="pq-section-description about-us-text service-text">
                            Our creative work is more than aesthetics; it is a narrative. We approach each space with a
                            singular vision, where interior design, architecture, and creative direction converge to create
                            environments that speak. Rooted in timeless elegance and modern sensibility, we craft spaces
                            that not only inspire but also embody the essence of those who inhabit them.
                        </p>
                        <p class="pq-section-description about-us-text">
                            Innovation defines who we are. Through the fusion of advanced technology and collaborations
                            with world-class artisans, we reimagine interior spaces with unparalleled creativity. Harnessing
                            the power of ever evolving technology infused with industry-leading partnerships, we craft
                            environments that elevate everyday life, shaping a future where design and functionality meets
                            in perfect harmony.
                        </p>
                    </div>

                    <div class="d-flex justify-content-centers">
                        <a class="pq-button pq-button-flat pq-btn-white pq-mb-35" href="{{route('our-work')}}">
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
