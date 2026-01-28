@extends('layouts.master-history')

@section('content')

<style>
    /* History Hero */
    .history-hero {
        padding: 100px 0 80px;
        background: linear-gradient(135deg, #101318 0%, #1a1f28 100%);
        color: #ffffff;
    }
    .history-hero .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 16px;
        display: block;
    }
    .history-hero h1 {
        font-size: 48px;
        font-weight: 800;
        margin: 0 0 20px;
        color: #ffffff;
        line-height: 1.2;
    }
    .history-hero p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 18px;
        max-width: 700px;
    }

    /* History Intro */
    .history-intro {
        padding: 80px 0 60px;
        background: #ffffff;
    }
    .history-intro .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(16, 19, 24, 0.6);
        margin-bottom: 12px;
        display: block;
    }
    .history-intro h2 {
        font-size: 38px;
        font-weight: 800;
        margin: 0 0 20px;
        color: #101318;
    }
    .history-intro p {
        color: #5c6570;
        font-size: 16px;
        line-height: 1.8;
        max-width: 800px;
    }

    /* Enhanced Timeline */
    .history-timeline-section {
        padding: 80px 0;
        background: #f7f4ef;
    }
    .cntl-state {
        margin-bottom: 60px;
    }
    .history-component {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.1);
        border: 1px solid rgba(16, 19, 24, 0.08);
        transition: all 0.3s ease;
    }
    .history-component:hover {
        transform: translateX(8px);
        box-shadow: 0 18px 40px rgba(16, 19, 24, 0.15);
    }
    .history-component h4 {
        font-size: 28px;
        font-weight: 800;
        margin: 0 0 20px;
        color: #101318;
    }
    .history-component p {
        color: #5c6570;
        line-height: 1.8;
        font-size: 16px;
        margin: 0;
    }
    .history-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.15);
    }
    .history-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .history-image:hover img {
        transform: scale(1.05);
    }
    .cntl-icon {
        background: linear-gradient(135deg, #f37920 0%, #d6681a 100%);
        color: #ffffff;
        font-weight: 800;
        font-size: 18px;
        border-radius: 50%;
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(243, 121, 32, 0.3);
        border: 4px solid #ffffff;
    }

    @media (max-width: 991px) {
        .history-hero {
            padding: 70px 0 60px;
        }
        .history-hero h1 {
            font-size: 36px;
        }
        .history-intro,
        .history-timeline-section {
            padding: 60px 0;
        }
    }
</style>

<section class="about-hero position-relative">
    <!-- Background Image -->
    <div class="about-hero-bg" style="background-image: url('{{ asset('uploads/IMG-20250612-WA0016.jpg') }}');"></div>

    <!-- Overlay -->
    <div class="about-hero-overlay"></div>

    <!-- Text Content -->
    <div class="container position-relative about-hero-content">
        <h1 class="about-title">
            Our History
            <span class="about-underline"></span>
        </h1>
    </div>
</section>

<!-- History Intro -->
<section class="history-intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <span class="eyebrow">Our Journey</span>
                <h2>Over a decade of design and consulting journey…(and counting)</h2>
                <p>
                    Meglink began as a small interior design studio in 2008, from a small studio to a regional leader in consulting
                    and sustainable interior design solutions. Over the past 16 years, we have transformed into a regional leader,
                    offering a wide range of design services & building a strong reputation.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Timeline -->
<section class="history-timeline-section">
    <div class="container">
        <div class="pq-timelines">
            <div class="cntl">
                <span class="cntl-bar cntl-center">
                    <span class="cntl-bar-fill"></span>
                </span>
                <div class="cntl-states">
                    <div class="cntl-state">
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
                                Meglink influence extends beyond Kenya, positioning the company for
                                further regional and international expansion, while maintaining a clear
                                focus on innovation, sustainability, and client satisfaction.
                            </p>
                        </div>
                        <div class="cntl-image history-image">
                            <img decoding="async" src="{{asset('html/images/timeline/5.jpg')}}" alt="history-image">
                        </div>
                        <div class="cntl-icon cntl-center">2023</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Timeline -->

@endsection
