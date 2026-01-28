@extends('layouts.master')

@section('content')

<style>
    /* Zoom Scroll Animation Styles */
    .zoom-scroll-section {
        opacity: 0;
        transform: scale(0.95);
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .zoom-scroll-section.zoom-visible {
        opacity: 1;
        transform: scale(1);
    }

    /* Staggered animation delays for multiple sections */
    .zoom-scroll-section:nth-child(1) { transition-delay: 0.1s; }
    .zoom-scroll-section:nth-child(2) { transition-delay: 0.2s; }

    /* Contact info item animations */
    .pq-icon-box {
        opacity: 0;
        transform: translateX(-20px);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .zoom-visible .pq-icon-box {
        opacity: 1;
        transform: translateX(0);
    }

    /* Stagger contact info items */
    .zoom-visible .pq-icon-box:nth-child(1) { transition-delay: 0.1s; }
    .zoom-visible .pq-icon-box:nth-child(2) { transition-delay: 0.2s; }
    .zoom-visible .pq-icon-box:nth-child(3) { transition-delay: 0.3s; }
    .zoom-visible .pq-icon-box:nth-child(4) { transition-delay: 0.4s; }

    /* Map animation */
    .pq-map {
        opacity: 0;
        transform: translateX(20px);
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .zoom-visible .pq-map {
        opacity: 1;
        transform: translateX(0);
    }

    /* Contact Section Styling */
    .contact-us {
        padding: 100px 0;
        background: #ffffff;
    }
    .contact-info-card {
        background: #ffffff;
        border: 1px solid rgba(16, 19, 24, 0.08);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.06);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .contact-info-card:hover {
        box-shadow: 0 18px 45px rgba(16, 19, 24, 0.1);
        transform: translateY(-4px);
    }
    .contact-section-header {
        margin-bottom: 40px;
    }
    .contact-section-header .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(16, 19, 24, 0.5);
        margin-bottom: 12px;
        display: block;
    }
    .contact-section-header h2 {
        font-size: 38px;
        font-weight: 800;
        color: #101318;
        margin-bottom: 0;
        line-height: 1.2;
    }
    .contact-icon-box {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 24px 0;
        border-bottom: 1px solid rgba(16, 19, 24, 0.08);
        transition: padding-left 0.3s ease;
    }
    .contact-icon-box:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    .contact-icon-box:hover {
        padding-left: 8px;
    }
    .contact-icon {
        width: 56px;
        height: 56px;
        background: rgba(243, 121, 32, 0.1);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }
    .contact-icon-box:hover .contact-icon {
        background: #f37920;
        transform: scale(1.05);
    }
    .contact-icon i {
        font-size: 24px;
        color: #f37920;
        transition: color 0.3s ease;
    }
    .contact-icon-box:hover .contact-icon i {
        color: #ffffff;
    }
    .contact-icon-content h6 {
        font-size: 18px;
        font-weight: 800;
        margin-bottom: 8px;
        color: #101318;
    }
    .contact-icon-content p {
        font-size: 16px;
        line-height: 1.7;
        color: #5c6570;
        margin-bottom: 0;
    }
    .contact-form-card {
        background: #ffffff;
        border: 1px solid rgba(16, 19, 24, 0.08);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.06);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .contact-form-card:hover {
        box-shadow: 0 18px 45px rgba(16, 19, 24, 0.1);
    }
    .contact-form-card h3 {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 28px;
        color: #101318;
        line-height: 1.2;
    }
    .contact-form-group {
        margin-bottom: 24px;
    }
    .contact-form-group label {
        font-size: 14px;
        font-weight: 700;
        color: #101318;
        margin-bottom: 8px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .contact-form-group input,
    .contact-form-group textarea {
        border: 1px solid rgba(16, 19, 24, 0.12);
        border-radius: 10px;
        padding: 14px 18px;
        font-size: 16px;
        transition: all 0.3s ease;
        width: 100%;
    }
    .contact-form-group input:focus,
    .contact-form-group textarea:focus {
        outline: none;
        border-color: #f37920;
        box-shadow: 0 0 0 3px rgba(243, 121, 32, 0.1);
    }
    .contact-form-group textarea {
        resize: vertical;
        min-height: 120px;
    }
    .contact-form-btn {
        background: #f37920;
        color: #ffffff;
        border: none;
        padding: 16px 32px;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }
    .contact-form-btn:hover {
        background: #d6681a;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(243, 121, 32, 0.3);
    }
    .contact-form-note {
        font-size: 13px;
        color: #5c6570;
        margin-top: 12px;
        text-align: center;
    }
    .contact-map {
        margin-top: 60px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.08);
        border: 1px solid rgba(16, 19, 24, 0.08);
    }
    .contact-map iframe {
        width: 100%;
        height: 400px;
        border: none;
        display: block;
    }
    @media (max-width: 991px) {
        .contact-us {
            padding: 70px 0;
        }
        .contact-section-header h2 {
            font-size: 32px;
        }
        .contact-form-card {
            padding: 32px;
        }
        .contact-icon-box {
            padding: 20px 0;
        }
    }
    @media (max-width: 767px) {
        .contact-form-card {
            padding: 24px;
        }
        .contact-icon {
            width: 48px;
            height: 48px;
        }
        .contact-icon i {
            font-size: 20px;
        }
    }
</style>

<section class="about-hero position-relative zoom-scroll-section">
  <!-- Background Image -->
   <div class="about-hero-bg" style=" background-image: url('{{ asset('uploads/IMG-20250609-WA0018.jpg') }}');"></div>

  <!-- Overlay -->
  <div class="about-hero-overlay"></div>

  <!-- Text Content -->
  <div class="container position-relative about-hero-content">
    <h1 class="about-title">
      Contact Us
      <span class="about-underline"></span>
    </h1>
  </div>
</section>

<section class="contact-us zoom-scroll-section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="contact-info-card">
                    <div class="contact-section-header">
                        <span class="eyebrow">Our Contact</span>
                        <h2>Get in Touch</h2>
                    </div>
                    <div class="contact-icon-box">
                        <div class="contact-icon">
                            <i class="ion ion-ios-home"></i>
                        </div>
                        <div class="contact-icon-content">
                            <h6>Visit Our Office</h6>
                            <p>Mayfox House, Riverside Garden,<br>Off Riverside Drive, Chiromo Area,<br>Nairobi.</p>
                        </div>
                    </div>
                    <div class="contact-icon-box">
                        <div class="contact-icon">
                            <i class="ion ion-ios-telephone"></i>
                        </div>
                        <div class="contact-icon-content">
                            <h6>Contact Us</h6>
                            <p>+ (254) 0737 211 206<br>+ (254) 0705 211 206</p>
                        </div>
                    </div>
                    <div class="contact-icon-box">
                        <div class="contact-icon">
                            <i class="ion ion-ios-email"></i>
                        </div>
                        <div class="contact-icon-content">
                            <h6>Email Us</h6>
                            <p>info@meglinkventures.co.ke<br>hello@meglinkventures.co.ke</p>
                        </div>
                    </div>
                    <div class="contact-icon-box">
                        <div class="contact-icon">
                            <i class="ion ion-ios-time"></i>
                        </div>
                        <div class="contact-icon-content">
                            <h6>Working Hours</h6>
                            <p>Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 2:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form-card">
                    <h3>Send an Inquiry</h3>
                    <form id="contact-inquiry-form">
                        <div class="contact-form-group">
                            <label for="inquiry_name">Full Name</label>
                            <input type="text" class="form-control" id="inquiry_name" placeholder="Your name" required>
                        </div>
                        <div class="contact-form-group">
                            <label for="inquiry_email">Email</label>
                            <input type="email" class="form-control" id="inquiry_email" placeholder="you@example.com" required>
                        </div>
                        <div class="contact-form-group">
                            <label for="inquiry_phone">Phone (optional)</label>
                            <input type="text" class="form-control" id="inquiry_phone" placeholder="+254 700 000 000">
                        </div>
                        <div class="contact-form-group">
                            <label for="inquiry_subject">Subject</label>
                            <input type="text" class="form-control" id="inquiry_subject" value="{{ request('subject', '') }}" placeholder="Walkthrough Inquiry">
                        </div>
                        <div class="contact-form-group">
                            <label for="inquiry_message">Message</label>
                            <textarea class="form-control" id="inquiry_message" rows="5" placeholder="Share details about your inquiry or request."></textarea>
                        </div>
                        <button type="submit" class="contact-form-btn">Send Inquiry</button>
                        <p class="contact-form-note">This opens your email client with the inquiry details.</p>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="contact-map pq-map">
                    <iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.836488961483!2d36.7980905!3d-1.2711255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f171550f35839%3A0xf75d6f20df03463e!2sMeglink%20Ventures%20Limited!5e0!3m2!1sen!2ske!4v1758621913663!5m2!1sen!2ske" title="Meglink Ventures Limited" aria-label="Meglink Ventures Limited"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Zoom Scroll Animation JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        const zoomSections = document.querySelectorAll('.zoom-scroll-section');

        // Create Intersection Observer
        const zoomObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('zoom-visible');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Observe each section
        zoomSections.forEach(section => {
            zoomObserver.observe(section);
        });

        // Fallback for older browsers
        if (!window.IntersectionObserver) {
            document.querySelectorAll('.zoom-scroll-section').forEach(section => {
                section.classList.add('zoom-visible');
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contact-inquiry-form');
        if (!form) return;

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const name = document.getElementById('inquiry_name').value.trim();
            const email = document.getElementById('inquiry_email').value.trim();
            const phone = document.getElementById('inquiry_phone').value.trim();
            const subject = document.getElementById('inquiry_subject').value.trim() || 'Walkthrough Inquiry';
            const message = document.getElementById('inquiry_message').value.trim();

            const bodyLines = [
                `Name: ${name}`,
                `Email: ${email}`,
                phone ? `Phone: ${phone}` : null,
                '',
                message,
            ].filter(Boolean);

            const mailto = `mailto:info@meglinkventures.co.ke?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(bodyLines.join('\\n'))}`;
            window.location.href = mailto;
        });
    });
</script>

@endsection
