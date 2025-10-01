@extends('layouts.master')

@section('content')

 <!-- Breadcrumb -->
    <div class="pq-breadcrumb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="pq-breadcrumb-title">
                            <h1>Who We Are</h1>
                        </div>
                        <div class="pq-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}"><i class="fas fa-home me-2"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item active">Who We Are</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb -->

    <!-- About Us -->
    <section class="about-us pq-pb-180 .pq-about-bg-color">

        <div class="container">

            {{--  --}}
            <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 wow  fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <div class="pq-section-title pq-style-1">
                    <h2 class="headline-intro"  style="font-weight:800;">
                        Experience Design At Its Majesty.
                    </h2>
                    <p>
                        <font color="#676767">
                        <span style=" line-height: 1.6;">
                        </span></font>
                    </p>
                    <p>
                        {{--  --}}
                        Founded in 2008 as an interior design outlet
                        studio, the Nairobi-based company has
                        evolved into an interdisciplinary regional
                        lifestyle brand that is leading the
                        contemporary Interior design consulting and
                        contracting conversation with experiential
                        residential, hospitality, commercial and retail
                        industry with an expansive portfolio of home
                        product designs and brand collaborations.
                        {{--  --}}
                    </p>
                    <font color="#676767">
                        <quillbot-extension-portal></quillbot-extension-portal>
                    </font>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 wow  fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <div class="button-align">
                    <a class="pq-button pq-button-flat" download="" href="{{route('services')}}">
                        <div class="pq-button-block">
                        <span class="pq-button-text">Browse Services </span>
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
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-us-img">
                        <img src="{{asset('html/images/background-images/29ebc0_dc1c4b96292c44d6b5980861bb8d8a66mv2.jpg')}}" class="pq-image1 wow animated fadeInLeft" alt="">
                    </div>
                </div>
                <div class="col-xl-6 pq-about-us-padding wow animated fadeInRight pq-about-bg-color">
                    <div class="pq-section-title pq-style-1 pq-mb-35">
                        <span class="pq-section-sub-title about-us-text" style="text-transform: capitalize">Interior Design Consulting & Contracting</span>

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

                    <a class="pq-button pq-button-flat pq-btn-white pq-mb-35" href="{{route('our-work')}}">
                        <div class="pq-button-block">
                            <span class="pq-button-text">Our Work </span>
                            <span class="pq-button-line-right"></span>
                            <i class="ion ion-ios-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us -->


    <!-- Award -->
    <section class="award pq-bg-grey">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <div class="pq-sticky-top">
                        <div class="pq-section-title pq-style-1 pq-mb-45">
                            <span class="pq-section-sub-title">our Priniciples</span>
                            <h5 class="pq-section-main-title" style="font-weight:800;">What does Meglink stand for?</h5>
                            <p>
                                These three words represent who we are today, they are aspirational of who we want to be
                                in the future and drive us to all make better decisions in how we work, what we build and
                                how we engage with our clients.
                            </p>
                        </div>
                        <a class="pq-button pq-button-flat" href="{{route('services')}}">
                            <div class="pq-button-block">
                                <span class="pq-button-text">view More </span>
                                <span class="pq-button-line-right"></span>
                                <i class="ion ion-ios-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 mt-4 mt-xl-0">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="pq-service-box pq-style-2 text-left">
                                <div class="pq-service-info">
                                    <div class="pq-service-content">
                                        <div class="pq-service-number">
                                            01 </div>
                                        <h5 class="pq-service-title" style="font-weight:700;">INNOVATION.</h5>
                                    </div>
                                    <div class="pq-service-description">
                                        <p>
                                            We use innovative technology
                                            to help us solve the ever
                                            evolving construction
                                            problems.
                                            This means we: Improve efficiency & We are aspirational
                                        </p>
                                    </div>
                                    <div class="pq-btn-container">
                                        <a class="pq-button pq-button-link" href="about-us.html">
                                            <div class="pq-button-block">
                                                <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52"
                                                        viewBox="0 0 64.356 36.52">
                                                        <g transform="translate(-6.444 -1.74)">
                                                            <g data-name="Group 2">
                                                                <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                    transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1"
                                                                    opacity="0.5"></circle>
                                                                <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                    transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1">
                                                                </circle>
                                                            </g>
                                                            <path data-name="Path 1"
                                                                d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                fill="#30373f"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="pq-service-box pq-style-2 text-left">
                                <div class="pq-service-info">
                                    <div class="pq-service-content">
                                        <div class="pq-service-number">
                                            02 </div>
                                        <h5 class="pq-service-title" style="font-weight:700;">QUALITY.</h5>
                                    </div>
                                    <div class="pq-service-description">
                                        <p>
                                        We emphasize great
                                        craftsmanship right from
                                        the early stages of design
                                        to completion of a
                                        project.
                                        </p>
                                    </div>
                                    <div class="pq-btn-container">
                                        <a class="pq-button pq-button-link" href="about-us.html">
                                            <div class="pq-button-block">
                                                <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52"
                                                        viewBox="0 0 64.356 36.52">
                                                        <g transform="translate(-6.444 -1.74)">
                                                            <g data-name="Group 2">
                                                                <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                    transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1"
                                                                    opacity="0.5"></circle>
                                                                <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                    transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1">
                                                                </circle>
                                                            </g>
                                                            <path data-name="Path 1"
                                                                d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                fill="#30373f"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="pq-service-box pq-style-2 text-left">
                                <div class="pq-service-info">
                                    <div class="pq-service-content">
                                        <div class="pq-service-number">
                                            03 </div>
                                        <h5 class="pq-service-title" style="font-weight:700;">COLLABORATION.</h5>
                                    </div>
                                    <div class="pq-service-description">
                                        <p>
                                           It’s in everything we do.
                                            We collaborate within
                                            our team, with our
                                            clients, and with all of
                                            our and suppliers.
                                            Everybody’s ideas
                                            count. Everybody has a
                                            voice.
                                        </p>
                                    </div>
                                    <div class="pq-btn-container">
                                        <a class="pq-button pq-button-link" href="about-us.html">
                                            <div class="pq-button-block">
                                                <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52"
                                                        viewBox="0 0 64.356 36.52">
                                                        <g transform="translate(-6.444 -1.74)">
                                                            <g data-name="Group 2">
                                                                <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                    transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1"
                                                                    opacity="0.5"></circle>
                                                                <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                    transform="translate(34.78 2.24)" fill="none" stroke="#30373f" stroke-width="1">
                                                                </circle>
                                                            </g>
                                                            <path data-name="Path 1"
                                                                d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                fill="#30373f"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{--  --}}
            <div class="col-lg-12">
                <div class="divider pq-right-border pq-45"></div>
            </div>
        </div>
    </section>
    <!-- Award -->





        <!-- Latest Work -->
    <section class="latest-work overflow-hidden">
        <div class="container">
            <div class="floating-image floating-image-left floating-image-2">
                <img src="{{asset('html/images/floating-images/2.png')}}" alt="">
            </div>
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 wow animated fadeInRight">
                    <div class="pq-section-title pq-style-1">
                        <span class="pq-section-sub-title">Our Work</span>
                        <h5 class="pq-section-main-title" style="font-weight:800;">Our Portfolio</h5>
                        <p>
                            Our portfolio highlights our expertise in creating functional
                            and stylish spaces. From residential to commercial projects,
                            we deliver bespoke interiors that blend aesthetics with
                            purpose, crafting environments that inspire and endure.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 wow animated fadeInRight">
                    <div class="button-align">
                        <a class="pq-button pq-button-flat" href="{{route('our-work')}}">
                            <div class="pq-button-block">
                                <span class="pq-button-text">view Portfolio</span>
                                <span class="pq-button-line-right"></span>
                                <i class="ion ion-ios-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="divider pq-right-border pq-45"></div>
                </div>
                <div class="col-lg-12 wow animated fadeInUp">
                    <div class="pq-portfoliobox pq-portfoliobox-style-1 pq-me-320">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="true" data-nav="false" data-desk_num="4" data-lap_num="2"
                            data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false" data-loop="true" data-margin="30">
                            <div class="item">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img  ">
                                            <img decoding="async" src="{{asset('html/images/gallery/1.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">indoor court</a></h5>
                                            <span> <a href="portfolio-single.html">Laminate</a>
                                            </span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356"
                                                            height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1">
                                                                    </circle>
                                                                </g>
                                                                <path data-name="Path 1"
                                                                    d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                    fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img  ">
                                            <img decoding="async" src="{{asset('html/images/gallery/2.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Awesome
                                                    Outdoor
                                                    Project</a></h5>
                                            <span> <a href="portfolio-single.html">Laminate</a>
                                            </span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356"
                                                            height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1">
                                                                    </circle>
                                                                </g>
                                                                <path data-name="Path 1"
                                                                    d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                    fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img  ">
                                            <img decoding="async" src="{{asset('html/images/gallery/3.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">kitchen
                                                    renovation</a>
                                            </h5>
                                            <span> <a href="portfolio-single.html">flooring</a>
                                            </span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356"
                                                            height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1">
                                                                    </circle>
                                                                </g>
                                                                <path data-name="Path 1"
                                                                    d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                    fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img  ">
                                            <img decoding="async" src="{{asset('html/images/gallery/4.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Industrial
                                                    Flooring</a>
                                            </h5>
                                            <span> <a href="portfolio-single.html">flooring</a>
                                            </span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356"
                                                            height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1">
                                                                    </circle>
                                                                </g>
                                                                <path data-name="Path 1"
                                                                    d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                    fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img  ">
                                            <img decoding="async" src="{{asset('html/images/gallery/5.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a
                                                    href="portfolio-single.html">eco-friendly-flooring</a>
                                            </h5>
                                            <span> <a href="portfolio-single.html">marble</a>
                                            </span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356"
                                                            height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1">
                                                                    </circle>
                                                                </g>
                                                                <path data-name="Path 1"
                                                                    d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                    fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img  ">
                                            <img decoding="async" src="{{asset('html/images/gallery/6.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Laminate
                                                    Flooring</a></h5>
                                            <span> <a href="portfolio-single.html">flooring</a>
                                            </span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356"
                                                            height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1">
                                                                    </circle>
                                                                </g>
                                                                <path data-name="Path 1"
                                                                    d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                    fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img  ">
                                            <img decoding="async" src="{{asset('html/images/gallery/7.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Bamboo flooring</a>
                                            </h5>
                                            <span> <a href="portfolio-single.html">tiles</a> </span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356"
                                                            height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1">
                                                                    </circle>
                                                                </g>
                                                                <path data-name="Path 1"
                                                                    d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                    fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img  ">
                                            <img decoding="async" src="{{asset('html/images/gallery/8.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Stone Cladding</a></h5>
                                            <span> <a href="portfolio-single.html">flooring</a>
                                            </span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356"
                                                            height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1">
                                                                    </circle>
                                                                </g>
                                                                <path data-name="Path 1"
                                                                    d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                    fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img  ">
                                            <img decoding="async" src="{{asset('html/images/gallery/9.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Ceramic Tiles</a></h5>
                                            <span> <a href="portfolio-single.html">Laminate</a>
                                            </span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356"
                                                            height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1">
                                                                    </circle>
                                                                </g>
                                                                <path data-name="Path 1"
                                                                    d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                    fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img  ">
                                            <img decoding="async" src="{{asset('html/images/gallery/10.jpg')}}"
                                                alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Wall Carpeting</a></h5>
                                            <span> <a href="portfolio-single.html">stone</a> </span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356"
                                                            height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76"
                                                                        transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d"
                                                                        stroke-width="1">
                                                                    </circle>
                                                                </g>
                                                                <path data-name="Path 1"
                                                                    d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z"
                                                                    fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Work -->

@endsection
