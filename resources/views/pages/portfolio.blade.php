@extends('layouts.master')

@section('content')

 <!-- Breadcrumb -->
    <div class="pq-breadcrumb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="pq-breadcrumb-title">
                            <h1>Our Work</h1>
                        </div>
                        <div class="pq-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}"><i class="fas fa-home me-2"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item active">Our Work</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb -->

        <section style="padding-bottom: 0" >

        <div class="container-fluid">

            {{--  --}}
            <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 wow  fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <div class="pq-section-title pq-style-1">
                    <h2 class="headline-intro"  style="font-weight:900;">
                        Our Portfolio
                    </h2>
                    <br>

                    <p>
                        {{--  --}}
                            Our portfolio highlights our expertise in creating functional
                            and stylish spaces. From residential to commercial projects,
                            we deliver bespoke interiors that blend aesthetics with
                            purpose, crafting environments that inspire and endure.
                        {{--  --}}
                    </p>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 wow  fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                <div class="button-align">
                    <a class="pq-button pq-button-flat" href="{{route('services')}}">
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

        </div>
    </section>

       <!-- Masnory -->
    <section class="masonrys">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pq-grid-container">

                        <div class="pq-masonry" data-next_items="4" data-initial_items="8">
                            <div class="grid-sizer pq-col-4"></div>
                            <div class="pq-masonry-item pq-filter-items  ipt-lg-3 style_2 59 ">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img">
                                            <img decoding="async" src="{{asset('html/images/gallery/1.jpg')}}" alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">indoor court</a></h5>
                                            <span><a href="portfolio-single.html">Laminate</a></span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html" class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1"></circle>
                                                                </g>
                                                                <path data-name="Path 1" d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z" fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pq-masonry-item pq-filter-items  ipt-lg-3 style_2 59  52 ">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img">
                                            <img decoding="async" src="{{asset('html/images/gallery/2.jpg')}}" alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Awesome Outdoor Project</a></h5>
                                            <span><a href="portfolio-single.html">Laminate</a></span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html" class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1"></circle>
                                                                </g>
                                                                <path data-name="Path 1" d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z" fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pq-masonry-item pq-filter-items  ipt-lg-3 style_2 61  52  60 ">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img">
                                            <img decoding="async" src="{{asset('html/images/gallery/3.jpg')}}" alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">kitchen renovation</a></h5>
                                            <span><a href="portfolio-single.html">flooring</a></span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html" class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1"></circle>
                                                                </g>
                                                                <path data-name="Path 1" d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z" fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pq-masonry-item pq-filter-items  ipt-lg-3 style_2 61  52 ">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img">
                                            <img decoding="async" src="{{asset('html/images/gallery/4.jpg')}}" alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Industrial Flooring</a></h5>
                                            <span><a href="portfolio-single.html">flooring</a></span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html" class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1"></circle>
                                                                </g>
                                                                <path data-name="Path 1" d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z" fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pq-masonry-item pq-filter-items  ipt-lg-3 style_2 52  7 ">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img">
                                            <img decoding="async" src="{{asset('html/images/gallery/5.jpg')}}" alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">eco-friendly-flooring</a></h5>
                                            <span><a href="portfolio-single.html">marble</a></span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html" class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg"><svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1"></circle>
                                                                </g>
                                                                <path data-name="Path 1" d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z" fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pq-masonry-item pq-filter-items ipt-lg-3 style_2 61 59">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img">
                                            <img decoding="async" src="{{asset('html/images/gallery/6.jpg')}}" alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Laminate Flooring</a></h5>
                                            <span><a href="portfolio-single.html">flooring</a></span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html" class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1"></circle>
                                                                </g>
                                                                <path data-name="Path 1" d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z" fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pq-masonry-item pq-filter-items ipt-lg-3 style_2 58 60">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img">
                                            <img decoding="async" src="{{asset('html/images/gallery/7.jpg')}}" alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Bamboo flooring</a></h5>
                                            <span><a href="portfolio-single.html">tiles</a></span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html" class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1"></circle>
                                                                </g>
                                                                <path data-name="Path 1" d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z" fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pq-masonry-item pq-filter-items ipt-lg-3 style_2 61 52 7">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img">
                                            <img decoding="async" src="{{asset('html/images/gallery/8.jpg')}}" alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Stone Cladding</a></h5>
                                            <span><a href="portfolio-single.html">flooring</a></span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html"
                                                class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1"></circle>
                                                                </g>
                                                                <path data-name="Path 1" d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z" fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pq-masonry-item pq-filter-items ipt-lg-3 style_2 59 58">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img">
                                            <img decoding="async" src="{{asset('html/images/gallery/9.jpg')}}" alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Ceramic Tiles</a></h5>
                                            <span><a href="portfolio-single.html">Laminate</a></span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html" class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1"></circle>
                                                                </g>
                                                                <path data-name="Path 1" d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z" fill="#e6af5d"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pq-masonry-item pq-filter-items ipt-lg-3 style_2 7 60">
                                <div class="pq-portfoliobox-1">
                                    <div class="pq-portfolio-block">
                                        <div class="pq-portfolio-img">
                                            <img decoding="async" src="{{asset('html/images/gallery/10.jpg')}}" alt="">
                                        </div>
                                        <div class="pq-portfolio-info">
                                            <h5><a href="portfolio-single.html">Wall Carpeting</a></h5>
                                            <span><a href="portfolio-single.html">stone</a></span>
                                        </div>
                                        <div class="pq-btn-container">
                                            <a href="portfolio-single.html" class="pq-button pq-button-link">
                                                <div class="pq-button-block">
                                                    <div class="pq-svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="64.356" height="36.52" viewBox="0 0 64.356 36.52">
                                                            <g transform="translate(-6.444 -1.74)">
                                                                <g data-name="Group 2">
                                                                    <circle data-name="Ellipse 2" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1" opacity="0.5"></circle>
                                                                    <circle data-name="Ellipse 3" cx="17" cy="17.76" r="17.76" transform="translate(34.78 2.24)" fill="none" stroke="#e6af5d" stroke-width="1"></circle>
                                                                </g>
                                                                <path data-name="Path 1" d="M49.525,14.265l-.627.779,5.583,4.5H6.444v1h48.02L48.9,24.954l.621.783L56.7,20.044Z" fill="#e6af5d"></path>
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
                    <div class="text-center pq-mt-30">
                        <a id="showMore" class="pq-button pq-button-flat" href="#">
                            <div class="pq-button-block">
                                <span class="pq-btn-text">load More</span>
                                <span class="pq-button-line-right"></span>
                                <i class="ion ion-ios-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Masnory -->

@endsection
