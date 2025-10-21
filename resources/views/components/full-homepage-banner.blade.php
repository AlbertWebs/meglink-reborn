<!-- START: Fullscreen Hero Slider -->
<section id="hero-banner" class="hero-slider">
  <div class="slide active" style="background-image: url('{{ asset('html/images/background-Images/board_4227759_97d4b027.png') }}');"></div>
  <div class="slide" style="background-image: url('{{ asset('html/images/background-Images/board_4227759_97d4b027.png') }}');"></div>
  <div class="slide" style="background-image: url('{{ asset('html/images/background-Images/board_4227759_97d4b027.png') }}');"></div>

  <!-- Navigation -->
  <button class="nav prev">&#10094;</button>
  <button class="nav next">&#10095;</button>

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

/* --- Navigation Buttons --- */
.hero-slider .nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0,0,0,0.4);
  color: #fff;
  border: none;
  font-size: 2rem;
  cursor: pointer;
  z-index: 10;
  padding: 10px 16px;
  transition: background 0.3s ease;
}
.hero-slider .nav:hover {
  background-color: rgba(0,0,0,0.7);
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

  .hero-slider .nav {
    font-size: 1.5rem;
    padding: 8px 12px;
  }

  .hero-slider .dots span {
    width: 10px;
    height: 10px;
  }
}

@media (max-width: 480px) {
  .hero-slider {
    height: 70vh; /* For very small screens */
  }

  .hero-slider .nav {
    font-size: 1.2rem;
    padding: 6px 10px;
  }

  .hero-slider .dots {
    bottom: 15px;
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
