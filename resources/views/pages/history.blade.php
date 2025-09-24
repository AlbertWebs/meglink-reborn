@extends('layouts.master-history')

@section('content')
 <!-- Timeline -->

    <!-- Breadcrumb -->
    <div class="pq-breadcrumb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="pq-breadcrumb-title">
                            <h1>How We Got Here</h1>
                        </div>
                        <div class="pq-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}"><i class="fas fa-home me-2"></i>Home</a>
                                </li>
                                <li class="breadcrumb-item active">How We Got Here</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb -->

    <!-- Timeline -->
    <section class="history">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-8 col-md-8 wow animated fadeInRight">
                        <div class="pq-section-title pq-style-1">
                            <span class="pq-section-sub-title">Our History</span>
                            <h5 class="pq-section-main-title">Over a decade of design and consulting journey…(and counting)</h5>
                            <p>
                                Meglink began as a small interior design studio in 2008, from a small studio to a regional leader in consulting
                                and sustainable interior design solutions. Over the past 16 years, we have transformed into a regional leader,
                                offering a wide range of design services & building a strong reputation.
                            </p>


                        </div>
                    </div>
                    <br><br>
                    <div class="col-lg-4 col-md-4 wow animated fadeInRight">
                    </div>

                    <div class="pq-timelines">
                        <div class="cntl">
                            <span class="cntl-bar cntl-center">
                                <span class="cntl-bar-fill"></span>
                            </span>
                            <div class="cntl-states">
                                <div class="cntl-state ">
                                    <div class="cntl-content d-flex flex-column justify-content-center history-component">
                                        <h4>The Beginning</h4>
                                        <p>
                                            Meglink started as a small interior design outlet studio in 2008,
                                            focusing on residential projects and developing a niche in
                                            personalized home design.
                                            The company gained recognition for delivering detailed and
                                            bespoke solutions in kitchens, wardrobes, and cabinets. By 2011,
                                            we had established a modest but loyal client base, relying heavily
                                            on word-of-mouth recommendations.
                                        </p>
                                    </div>
                                    <div class="cntl-image history-image">
                                        <img decoding="async" src="{{asset('html/images/timeline/1.jpg')}}" alt="history-image">
                                    </div>
                                    <div class="cntl-icon cntl-center">2008</div>
                                </div>
                                <div class="cntl-state">
                                    <div class="cntl-content d-flex flex-column justify-content-center history-component">
                                        <h4>2012: Expanding Services</h4>
                                        <p>As demand grew, Meglink expanded its service portfolio to include
                                            office partitioning, floor finishing, and custom cabinetry.
                                            The team grew to 10 professionals, and new roles such as project
                                            managers and design assistants were added to streamline operations.
                                            During this period, Meglink also secured its first major commercial
                                            contract, marking its transition from a purely residential focus.
                                        </p>
                                    </div>
                                    <div class="cntl-image history-image">
                                        <img decoding="async" src="{{asset('html/images/timeline/2.jpg')}}" alt="history-image">
                                    </div>
                                    <div class="cntl-icon cntl-center">2012</div>
                                </div>
                                <div class="cntl-state">
                                    <div class="cntl-content d-flex flex-column justify-content-center history-component">
                                        <h4>Service Diversification</h4>
                                        <p>
                                            Meglink cemented its reputation for high-end interior design by
                                            taking on larger and more complex projects, including luxury
                                            homes and office spaces.
                                            The company invested in advanced 3D rendering technology to
                                            enhance design presentations, winning clients in new sectors.
                                            Meglink expanded its client portfolio by 40%, gaining traction with
                                            developers and corporate clients.
                                        </p>
                                    </div>
                                    <div class="cntl-image history-image">
                                        <img decoding="async" src="{{asset('html/images/timeline/3.jpg')}}" alt="history-image">
                                    </div>
                                    <div class="cntl-icon cntl-center">2015</div>
                                </div>
                                <div class="cntl-state">
                                    <div class="cntl-content d-flex flex-column justify-content-center history-component">
                                        <h4>Geographic Expansion</h4>
                                        <p>
                                            Meglink moved beyond Nairobi and began working on regional
                                            projects across Kenya, establishing partnerships with leading
                                            suppliers and contractors.
                                            The team grew to 25 professionals, including in-house architects
                                            and construction supervisors, allowing us to provide end-to-end
                                            design and consulting services. During this period, the company
                                            began exploring the hospitality sector and secured several hotel
                                            renovation projects.

                                        </p>
                                    </div>
                                    <div class="cntl-image history-image">
                                        <img decoding="async" src="{{asset('html/images/timeline/4.jpg')}}" alt="history-image">
                                    </div>
                                    <div class="cntl-icon cntl-center">2018</div>
                                </div>
                                <div class="cntl-state">
                                    <div class="cntl-content d-flex flex-column justify-content-center history-component">
                                        <h4>High-End Design, Consultation & Regional Expansion</h4>
                                        <p>
                                            Meglink diversified into high-end commercial projects, including
                                            corporate offices, hotels, and luxury retail spaces. The company
                                            adopted smart home integration as a service, blending technology
                                            with design.
                                            Staff increased to 40, and new departments like sustainability
                                            consulting and digital design were established. Meglink also
                                            launched its own proprietary project management software to
                                            improve efficiency and client transparency.
                                        </p>
                                    </div>
                                    <div class="cntl-image history-image">
                                        <img decoding="async" src="{{asset('html/images/timeline/5.jpg')}}" alt="history-image">
                                    </div>
                                    <div class="cntl-icon cntl-center">2021</div>
                                </div>
                                <div class="cntl-state">
                                    <div class="cntl-content d-flex flex-column justify-content-center history-component">
                                        <h4>Regional Recognition</h4>
                                        <p>
                                            By 2024, Meglink had become a regional leader in interior design and
                                            consulting, renowned for its comprehensive approach. The firm now
                                            employs over 50 experts and manages projects across multiple sectors,
                                            including hospitality, retail, and residential.
                                            Meglink infiuence extends beyond Kenya, positioning the company for
                                            further regional and international expansion, while maintaining a clear
                                            focus on innovation, sustainability, and client satisfaction.
                                        </p>
                                    </div>
                                    <div class="cntl-image d-flex flex-column justify-content-center history-image">
                                        <img decoding="async" src="{{asset('html/images/timeline/5.jpg')}}" alt="history-image">
                                    </div>
                                    <div class="cntl-icon cntl-center">2023</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Timeline -->

@endsection
