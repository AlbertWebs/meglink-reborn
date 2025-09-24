@extends('layouts.master')

@section('content')

 <!-- Breadcrumb -->
    <div class="pq-breadcrumb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="pq-breadcrumb-title">
                            <h1>Contact Us</h1>
                        </div>
                        <div class="pq-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}"><i class="fas fa-home me-2"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item active">Contact Us</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb -->


      <!-- Contact Us -->
    <section class="contact-us pq-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <div class="pq-section-title pq-style-1 pq-mb-30">
                        <span class="pq-section-sub-title">our contact</span>
                        <h5 class="pq-section-main-title">Get in touch</h5>
                        {{-- <p class="pq-section-description">Lorem Ipsum is simply dummy text of the printing &amp; typesetting industry. Contrary to popular belief, Lorem Ipsum is not simply random text.</p> --}}
                    </div>
                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-home"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Visit A Office</h6>
                            <p class="mb-0">Mayfox House, Riverside Garden,
                                Off Riverside Drive, Chiromo Area,
                                Nairobi.

                            </p>
                        </div>
                    </div>
                    <div class="divider pq-my-15"></div>
                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-telephone"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Contact-Us</h6>
                            <p class="mb-0">+ (254) 0737 211 206<br>+ (254) 0705 211 206</p>
                        </div>
                    </div>
                    <div class="divider pq-my-15"></div>
                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-email"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Email-Us</h6>
                            <p class="mb-0">info@meglinkventures.co.ke<br>hello@meglinkventures.co.ke</p>
                        </div>
                    </div>
                    <div class="divider pq-my-15"></div>

                    <div class="pq-icon-box pq-style-3">
                        <div class="pq-icon">
                            <i class="ion ion-ios-time"></i>
                        </div>
                        <div class="pq-icon-box-content">
                            <h6>Working Hours</h6>
                            <p class="mb-0">Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 2:00 PM</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 mt-4 mt-lg-0 p-xl-0">
                    <div class="pq-map pq-me-330">
                        <iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.836488961483!2d36.7980905!3d-1.2711255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f171550f35839%3A0xf75d6f20df03463e!2sMeglink%20Ventures%20Limited!5e0!3m2!1sen!2ske!4v1758621913663!5m2!1sen!2ske" title="London Eye, London, United Kingdom" aria-label="London Eye, London, United Kingdom"></iframe>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <div class="row mt-4 text-center">
        <div class="col-lg-12">
            <strong>
            <a href="">Privacy Policy</a> |
            <a href="">Terms and Conditions</a> |
            <a href="">Copyright</a>
            </strong>
        </div>
    </div>
    <!-- Contact Us -->
    <br><br>




@endsection
