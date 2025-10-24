
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
<style>
    /* --- Hero Slider Styles --- */
    .hero-slider {
        position: relative;
        width: 100%;
        height: 100vh;
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
        background: rgba(0, 0, 0, 0.7);
        padding: 50px 60px;
        border-radius: 15px;
        text-align: center;
        max-width: 850px;
        margin: 0 20px;
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

    /* --- Fixed Navigation Buttons --- */
    .hero-slider .nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        border: none;
        font-size: 24px;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        margin: 0;
        line-height: 1;
    }

    .hero-slider .nav:hover {
        background-color: rgba(243, 121, 32, 0.9);
        transform: translateY(-50%) scale(1.1);
    }

    .hero-slider .nav.prev {
        left: 30px;
    }

    .hero-slider .nav.next {
        right: 30px;
    }

    /* Ensure the arrow icons are properly centered */
    .hero-slider .nav::before {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
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
            height: 80vh;
        }

        .text-container {
            padding: 30px 25px;
            margin: 0 15px;
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
            width: 50px;
            height: 50px;
            font-size: 20px;
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
            height: 70vh;
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

<!-- Your existing HTML and PHP code remains the same -->


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
    // --- Fixed Dramatic Hero Slider Script ---
    document.addEventListener("DOMContentLoaded", function() {
        const slides = document.querySelectorAll(".hero-slider .slide");
        const prev = document.querySelector(".hero-slider .prev");
        const next = document.querySelector(".hero-slider .next");
        const dotsContainer = document.querySelector(".hero-slider .dots");
        let current = 0;
        let isAnimating = false;
        let autoSlide;

        // Create dots
        slides.forEach((_, index) => {
            const dot = document.createElement("span");
            if (index === 0) dot.classList.add("active");
            dot.setAttribute('data-index', index);
            dotsContainer.appendChild(dot);
        });
        const dots = document.querySelectorAll(".hero-slider .dots span");

        // Create particle container
        const createParticles = () => {
            const particleContainer = document.createElement('div');
            particleContainer.className = 'particle-container';
            document.querySelector('.hero-slider').appendChild(particleContainer);
            return particleContainer;
        };

        const particleContainer = createParticles();

        // Generate particles using your brand colors
        const generateParticles = (direction) => {
            particleContainer.innerHTML = '';
            const particleCount = 20;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';

                const size = Math.random() * 5 + 2;
                const posX = Math.random() * window.innerWidth;
                const posY = Math.random() * window.innerHeight;

                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}px`;
                particle.style.top = `${posY}px`;
                particle.style.background = '#f37920';
                particle.style.animationDelay = `${Math.random() * 0.2}s`;

                particleContainer.appendChild(particle);
            }

            // Remove particles after animation
            setTimeout(() => {
                particleContainer.innerHTML = '';
            }, 600);
        };

        // Fixed showSlide with proper timing
        const showSlide = (index, direction = 'next') => {
            if (isAnimating) return;
            isAnimating = true;

            const currentSlide = slides[current];
            const nextSlide = slides[index];
            const textContainer = nextSlide.querySelector('.text-container');

            // Generate particles for transition
            generateParticles(direction);

            // Reset all slides first
            slides.forEach(slide => {
                slide.classList.remove('active', 'dramatic-slide-in-right', 'dramatic-slide-in-left', 'zoom-out', 'rotate-3d-out');
                slide.style.opacity = '0';
                slide.style.transform = '';
            });

            // Animate current slide out
            if (currentSlide) {
                currentSlide.classList.add(direction === 'next' ? 'zoom-out' : 'rotate-3d-out');
            }

            // Immediately set next slide as active but hidden
            nextSlide.classList.add('active');
            nextSlide.style.opacity = '0';

            // Add directional animation class after a small delay
            setTimeout(() => {
                nextSlide.classList.add(direction === 'next' ? 'dramatic-slide-in-right' : 'dramatic-slide-in-left');
            }, 10);

            // Reset text container for dramatic entrance
            textContainer.style.transform = direction === 'next' ? 'translateX(150px) scale(0.9)' : 'translateX(-150px) scale(0.9)';
            textContainer.style.opacity = '0';

            // Update dots
            dots.forEach(dot => dot.classList.remove('active'));
            dots[index].classList.add('active');

            // Staggered text animation with proper timing
            setTimeout(() => {
                textContainer.style.transform = 'translateX(0) scale(1)';
                textContainer.style.opacity = '1';

                // Animate individual text elements
                const title = textContainer.querySelector('.slide-title');
                const description = textContainer.querySelector('.slide-description');
                const button = textContainer.querySelector('.slide-btn');

                if (title) {
                    title.style.animation = 'titleSlideIn 0.8s ease-out';
                }
                if (description) {
                    description.style.animation = 'fadeInUp 0.8s ease-out 0.2s both';
                }
                if (button) {
                    button.style.animation = 'buttonSlideIn 0.8s ease-out 0.4s both';
                }
            }, 400);

            current = index;

            // Reset animation flag after all animations complete
            setTimeout(() => {
                isAnimating = false;

                // Clean up text animations
                const title = textContainer.querySelector('.slide-title');
                const description = textContainer.querySelector('.slide-description');
                const button = textContainer.querySelector('.slide-btn');

                if (title) title.style.animation = '';
                if (description) description.style.animation = '';
                if (button) button.style.animation = '';
            }, 1200); // Match the total animation duration
        };

        const nextSlide = () => {
            const nextIndex = (current + 1) % slides.length;
            showSlide(nextIndex, 'next');
        };

        const prevSlide = () => {
            const prevIndex = (current - 1 + slides.length) % slides.length;
            showSlide(prevIndex, 'prev');
        };

        // Event listeners with proper prevention
        next.addEventListener("click", () => {
            if (!isAnimating) {
                nextSlide();
                resetAutoSlide();
            }
        });

        prev.addEventListener("click", () => {
            if (!isAnimating) {
                prevSlide();
                resetAutoSlide();
            }
        });

        dots.forEach((dot) => {
            dot.addEventListener("click", () => {
                if (!isAnimating) {
                    const index = parseInt(dot.getAttribute('data-index'));
                    const direction = index > current ? 'next' : 'prev';
                    showSlide(index, direction);
                    resetAutoSlide();
                }
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!isAnimating) {
                if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoSlide();
                } else if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoSlide();
                }
            }
        });

        // Touch/swipe support with better prevention
        let touchStartX = 0;
        let touchEndX = 0;
        let touchStartTime = 0;

        const handleTouchStart = (e) => {
            if (!isAnimating) {
                touchStartX = e.changedTouches[0].screenX;
                touchStartTime = Date.now();
            }
        };

        const handleTouchEnd = (e) => {
            if (!isAnimating) {
                touchEndX = e.changedTouches[0].screenX;
                const touchEndTime = Date.now();
                const diff = touchStartX - touchEndX;
                const timeDiff = touchEndTime - touchStartTime;

                // Only process swipes that are quick enough
                if (timeDiff < 500) {
                    handleSwipe();
                }
            }
        };

        const handleSwipe = () => {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
                resetAutoSlide();
            }
        };

        // Add touch events
        const slider = document.querySelector('.hero-slider');
        slider.addEventListener('touchstart', handleTouchStart, { passive: true });
        slider.addEventListener('touchend', handleTouchEnd, { passive: true });

        // Auto-slide functionality with better timing
        const startAutoSlide = () => {
            autoSlide = setInterval(() => {
                if (!isAnimating) {
                    nextSlide();
                }
            }, 9000);
        };

        const resetAutoSlide = () => {
            if (autoSlide) {
                clearInterval(autoSlide);
                startAutoSlide();
            }
        };

        // Pause auto-slide on hover
        slider.addEventListener('mouseenter', () => {
            if (autoSlide) {
                clearInterval(autoSlide);
                autoSlide = null;
            }
        });

        slider.addEventListener('mouseleave', () => {
            if (!autoSlide) {
                startAutoSlide();
            }
        });

        // Initialize with a small delay to ensure DOM is ready
        setTimeout(() => {
            startAutoSlide();
        }, 1000);

        // Preload images for smoother transitions
        const preloadSlide = (index) => {
            const slide = slides[index];
            if (slide) {
                const bgImage = slide.style.backgroundImage;
                if (bgImage) {
                    const img = new Image();
                    img.src = bgImage.replace('url("', '').replace('")', '');
                }
            }
        };

        // Preload all slides
        slides.forEach((_, index) => {
            preloadSlide(index);
        });
    });
</script>

<style>
    /* Fixed CSS with consistent timing */
    .hero-slider {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        margin: 0;
        padding: 0;
        perspective: 1000px;
    }

    .hero-slider .slide {
        position: absolute;
        width: 100%;
        height: 100%;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0;
        transform-style: preserve-3d;
        transition: none; /* Remove any transitions that might interfere */
    }

    /* Consistent animation timing */
    .hero-slider .slide.dramatic-slide-in-right {
        animation: dramaticSlideInRight 1s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    }

    .hero-slider .slide.dramatic-slide-in-left {
        animation: dramaticSlideInLeft 1s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    }

    .hero-slider .slide.zoom-out {
        animation: zoomOut 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    }

    .hero-slider .slide.rotate-3d-out {
        animation: rotate3dOut 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    }

    @keyframes dramaticSlideInRight {
        0% {
            opacity: 0;
            transform: translateX(100%) scale(1.1);
        }
        100% {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    @keyframes dramaticSlideInLeft {
        0% {
            opacity: 0;
            transform: translateX(-100%) scale(1.1);
        }
        100% {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    @keyframes zoomOut {
        0% {
            opacity: 1;
            transform: scale(1);
        }
        100% {
            opacity: 0;
            transform: scale(0.9);
        }
    }

    @keyframes rotate3dOut {
        0% {
            opacity: 1;
            transform: rotateY(0deg) scale(1);
        }
        100% {
            opacity: 0;
            transform: rotateY(80deg) scale(0.95);
        }
    }

    /* Rest of your CSS remains the same */
    .particle-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 20;
    }

    .particle {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        animation: particleFloat 0.6s ease-out forwards;
        opacity: 0;
    }

    @keyframes particleFloat {
        0% {
            opacity: 1;
            transform: translate(0, 0) scale(1);
        }
        100% {
            opacity: 0;
            transform: translate(var(--tx, 80px), var(--ty, -80px)) scale(0);
        }
    }

    .text-container {
        background: rgba(0, 0, 0, 0.7);
        padding: 50px 60px;
        border-radius: 15px;
        text-align: center;
        max-width: 850px;
        margin: 0 20px;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(2px);
        transform: translateX(0) scale(1);
        opacity: 1;
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    @keyframes titleSlideIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes buttonSlideIn {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* ... rest of your existing CSS ... */
</style>



