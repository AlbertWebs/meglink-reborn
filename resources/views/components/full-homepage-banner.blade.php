
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* --- Hero Slider Styles --- */
        .hero-slider {
            position: relative;
            width: 100%;
            height: 100vh; /* Full screen height */
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .hero-slider .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .hero-slider .slide.active {
            opacity: 1;
            z-index: 1;
        }

        /* --- Slide Content Styles --- */
        .slide-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .text-container {
            background: rgba(0, 0, 0, 0.7); /* Slightly darker for better contrast */
            padding: 50px 60px;
            border-radius: 15px;
            text-align: center;
            max-width: 850px;
            margin: 0 20px;
            /* backdrop-filter: blur(8px);  */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.8s ease;
        }

        .slide.active .text-container {
            transform: translateY(0);
            opacity: 1;
        }

        .slide-title {
            color: #f37920;
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 25px;
            line-height: 1.1;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
            font-family: 'Playfair Display', serif;
            letter-spacing: -0.5px;
            position: relative;
            padding-bottom: 20px;
        }

        .slide-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, transparent, #f37920, transparent);
            border-radius: 2px;
        }

        .slide-description {
            color: #fff;
            font-size: 1.4rem;
            margin-bottom: 35px;
            line-height: 1.6;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            font-family: 'Inter', sans-serif;
            font-weight: 300;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .slide-btn {
            display: inline-block;
            background: #f37920;
            color: #fff;
            padding: 16px 35px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .slide-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
            z-index: -1;
        }

        .slide-btn:hover {
            background: #e56a10;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }

        .slide-btn:hover::before {
            left: 100%;
        }

        /* --- Navigation Buttons --- */
        .hero-slider .nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.3);
            color: #fff;
            border: none;
            font-size: 2.2rem;
            cursor: pointer;
            z-index: 10;
            padding: 12px 18px;
            transition: all 0.3s ease;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-slider .nav:hover {
            background-color: rgba(243, 121, 32, 0.8);
            transform: translateY(-50%) scale(1.1);
        }

        .hero-slider .nav.prev {
            left: 30px;
        }

        .hero-slider .nav.next {
            right: 30px;
        }

        /* --- Dots --- */
        .hero-slider .dots {
            position: absolute;
            bottom: 30px;
            width: 100%;
            text-align: center;
            z-index: 10;
        }

        .hero-slider .dots span {
            display: inline-block;
            width: 14px;
            height: 14px;
            margin: 0 8px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }

        .hero-slider .dots span::after {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 2px solid transparent;
            border-radius: 50%;
            transition: border-color 0.3s;
        }

        .hero-slider .dots span.active {
            background-color: #f37920;
            transform: scale(1.2);
        }

        .hero-slider .dots span.active::after {
            border-color: rgba(243, 121, 32, 0.5);
        }

        .hero-slider .dots span:hover::after {
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* --- Responsive Design --- */
        @media (max-width: 992px) {
            .slide-title {
                font-size: 3.5rem;
            }

            .text-container {
                padding: 40px 50px;
            }
        }

        @media (max-width: 768px) {
            .hero-slider {
                height: 80vh; /* Slightly shorter for mobile */
            }

            .text-container {
                padding: 30px 25px;
                margin: 0 15px;
                backdrop-filter: blur(5px);
            }

            .slide-title {
                font-size: 2.8rem;
                margin-bottom: 15px;
                padding-bottom: 15px;
            }

            .slide-title::after {
                width: 80px;
                height: 3px;
            }

            .slide-description {
                font-size: 1.2rem;
                margin-bottom: 25px;
            }

            .slide-btn {
                padding: 14px 28px;
                font-size: 1rem;
            }

            .hero-slider .nav {
                font-size: 1.8rem;
                width: 50px;
                height: 50px;
            }

            .hero-slider .dots span {
                width: 12px;
                height: 12px;
            }

            .hero-nav {
                display: none !important;
            }
        }

        @media (max-width: 576px) {
            .hero-slider {
                height: 70vh; /* For very small screens */
            }

            .text-container {
                padding: 25px 20px;
                margin: 0 10px;
            }

            .slide-title {
                font-size: 2.2rem;
                margin-bottom: 12px;
                padding-bottom: 12px;
            }

            .slide-title::after {
                width: 60px;
            }

            .slide-description {
                font-size: 1.1rem;
                margin-bottom: 20px;
            }

            .slide-btn {
                padding: 12px 24px;
                font-size: 0.95rem;
            }

            .hero-slider .dots {
                bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .slide-title {
                font-size: 1.9rem;
            }

            .slide-description {
                font-size: 1rem;
            }

            .slide-btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }

        /* Extra small devices */
        @media (max-width: 360px) {
            .text-container {
                padding: 20px 15px;
            }

            .slide-title {
                font-size: 1.7rem;
            }

            .slide-description {
                font-size: 0.95rem;
            }

            .slide-btn {
                padding: 9px 18px;
                font-size: 0.85rem;
            }
        }
    </style>


    <!-- START: Fullscreen Hero Slider -->
    <section id="hero-banner" class="hero-slider">
        @php
            $slides = \App\Models\Slide::where('is_active', true)->get();
        @endphp

        @foreach($slides as $index => $slide)
        <div class="slide {{ $index === 0 ? 'active' : '' }}"
            style="background-image: url('{{ asset('storage/' . $slide->image) }}');">
            <div class="slide-content">
                <div class="text-container">
                    <h1 class="slide-title">{{ $slide->title ?? 'Meglink Ventures' }}</h1>
                    <p class="slide-description">{{ $slide->subtitle ?? 'We Create Timeless Interiors for Modern Living' }}</p>
                    <a href="{{url('/')}}/our-work" class="slide-btn">Explore More</a>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Navigation -->
        <button class="nav prev hero-nav">&#10094;</button>
        <button class="nav next hero-nav">&#10095;</button>

        <!-- Dots -->
        <div class="dots"></div>
    </section>


    <script>
        // --- Hero Slider Script ---
        document.addEventListener("DOMContentLoaded", function() {
            const slides = document.querySelectorAll(".hero-slider .slide");
            const prev = document.querySelector(".hero-slider .prev");
            const next = document.querySelector(".hero-slider .next");
            const dotsContainer = document.querySelector(".hero-slider .dots");
            let current = 0;
            let autoSlide;

            // Create dots
            slides.forEach((_, index) => {
                const dot = document.createElement("span");
                if (index === 0) dot.classList.add("active");
                dotsContainer.appendChild(dot);
            });
            const dots = document.querySelectorAll(".hero-slider .dots span");

            const showSlide = (index) => {
                slides.forEach(slide => slide.classList.remove("active"));
                dots.forEach(dot => dot.classList.remove("active"));
                slides[index].classList.add("active");
                dots[index].classList.add("active");
            };

            const nextSlide = () => {
                current = (current + 1) % slides.length;
                showSlide(current);
            };

            const prevSlide = () => {
                current = (current - 1 + slides.length) % slides.length;
                showSlide(current);
            };

            next.addEventListener("click", () => {
                nextSlide();
                resetAutoSlide();
            });

            prev.addEventListener("click", () => {
                prevSlide();
                resetAutoSlide();
            });

            dots.forEach((dot, index) => {
                dot.addEventListener("click", () => {
                    current = index;
                    showSlide(current);
                    resetAutoSlide();
                });
            });

            const startAutoSlide = () => {
                autoSlide = setInterval(nextSlide, 5000); // every 5 seconds
            };

            const resetAutoSlide = () => {
                clearInterval(autoSlide);
                startAutoSlide();
            };

            startAutoSlide();
        });
    </script>
    <!-- END: Fullscreen Hero Slider -->



