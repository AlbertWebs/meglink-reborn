<!-- START: Fullscreen Hero Slider -->
<section id="hero-banner" class="hero-slider">
    @foreach(\App\Models\Slide::where('is_active', true)->get() as $slide)
    <div class="slide active" style="background-image: url('{{ asset('storage/' . $slide->image) }}');">
        <div class="slide-content">
            <div class="text-container">
                <h2 class="slide-title">{{ $slide->title ?? 'Meglink Ventures' }}</h2>
                <p class="slide-description">{{ $slide->description ?? 'Leading Interior Design & Construction' }}</p>
                {{-- <a href="{{ $slide->link ?? '#services' }}" class="slide-btn">
                    Explore More &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
                </a> --}}
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
  background: rgba(0, 0, 0, 0.6); /* Transparent black background */
  padding: 40px;
  border-radius: 10px;
  text-align: center;
  max-width: 800px;
  margin: 0 20px;
  /* backdrop-filter: blur(5px);  */
}

.slide-title {
  color: #f37920;
  font-size: 3.5rem;
  font-weight: 900;
  margin-bottom: 20px;
  line-height: 1.2;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.slide-description {
  color: #fff;
  font-size: 1.3rem;
  margin-bottom: 30px;
  line-height: 1.6;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
}

.slide-btn {
  display: inline-block;
  background: #f37920;
  color: #fff;
  padding: 15px 30px;
  text-decoration: none;
  border-radius: 5px;
  font-weight: 600;
  font-size: 1.1rem;
  transition: all 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.slide-btn:hover {
  background: #e56a10;
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

/* --- Navigation Buttons --- */
.hero-slider .nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0,0,0,0.1);
  color: #fff;
  border: none;
  font-size: 2rem;
  cursor: pointer;
  z-index: 10;
  padding: 10px 16px;
  transition: background 0.3s ease;
}
.hero-slider .nav:hover {
  background-color: rgba(0, 0, 0, 0.158);
}
.hero-slider .nav.prev { left: 20px; }
.hero-slider .nav.next { right: 20px; }

/* --- Dots --- */
.hero-slider .dots {
  position: absolute;
  bottom: 20px;
  width: 100%;
  text-align: center;
  z-index: 10;
}
.hero-slider .dots span {
  display: inline-block;
  width: 12px;
  height: 12px;
  margin: 0 6px;
  background-color: rgba(255,255,255,0.6);
  border-radius: 50%;
  cursor: pointer;
  transition: background 0.3s;
}
.hero-slider .dots span.active {
  background-color: #f37920;
}

/* --- Responsive Design --- */
@media (max-width: 768px) {
  .hero-slider {
    height: 80vh; /* Slightly shorter for mobile */
  }

  .text-container {
    padding: 30px 25px;
    margin: 0 15px;
  }

  .slide-title {
    font-size: 2.5rem;
    margin-bottom: 15px;
  }

  .slide-description {
    font-size: 1.1rem;
    margin-bottom: 25px;
  }

  .slide-btn {
    padding: 12px 25px;
    font-size: 1rem;
  }

  .hero-slider .nav {
    font-size: 1.5rem;
    padding: 8px 12px;
  }

  .hero-slider .dots span {
    width: 10px;
    height: 10px;
  }

  .hero-nav{
    display:none !important;
  }
}

@media (max-width: 480px) {
  .hero-slider {
    height: 70vh; /* For very small screens */
  }

  .text-container {
    padding: 25px 20px;
    margin: 0 10px;
  }

  .slide-title {
    font-size: 2rem;
    margin-bottom: 12px;
  }

  .slide-description {
    font-size: 1rem;
    margin-bottom: 20px;
  }

  .slide-btn {
    padding: 10px 20px;
    font-size: 0.9rem;
  }

  .hero-slider .nav {
    font-size: 1.2rem;
    padding: 6px 10px;
  }

  .hero-slider .dots {
    bottom: 15px;
  }

  .hero-nav{
    display:none !important;
  }
}

/* Extra small devices */
@media (max-width: 360px) {
  .text-container {
    padding: 20px 15px;
  }

  .slide-title {
    font-size: 1.8rem;
  }

  .slide-description {
    font-size: 0.9rem;
  }

  .slide-btn {
    padding: 8px 16px;
    font-size: 0.85rem;
  }
}
</style>

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
