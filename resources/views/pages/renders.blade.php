@extends('layouts.master-renders')

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

    /* Gallery item animations */
    .gallery-item {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .zoom-visible .gallery-item {
        opacity: 1;
        transform: translateY(0);
    }

    /* Stagger gallery items */
    .zoom-visible .gallery-item:nth-child(1) { transition-delay: 0.1s; }
    .zoom-visible .gallery-item:nth-child(2) { transition-delay: 0.2s; }
    .zoom-visible .gallery-item:nth-child(3) { transition-delay: 0.3s; }
    .zoom-visible .gallery-item:nth-child(4) { transition-delay: 0.4s; }
    .zoom-visible .gallery-item:nth-child(5) { transition-delay: 0.5s; }
    .zoom-visible .gallery-item:nth-child(6) { transition-delay: 0.6s; }
    .zoom-visible .gallery-item:nth-child(7) { transition-delay: 0.7s; }
    .zoom-visible .gallery-item:nth-child(8) { transition-delay: 0.8s; }
    .zoom-visible .gallery-item:nth-child(9) { transition-delay: 0.9s; }

    /* Enhanced Renders Section */
    .renders-hero {
        padding: 100px 0 80px;
        background: linear-gradient(135deg, #101318 0%, #1a1f28 100%);
        color: #ffffff;
    }
    .renders-hero .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 16px;
        display: block;
    }
    .renders-hero h2 {
        font-size: 48px;
        font-weight: 800;
        margin: 0 0 20px;
        color: #ffffff;
        line-height: 1.2;
    }
    .renders-hero h4 {
        font-size: 24px;
        font-weight: 700;
        color: #f37920;
        margin-bottom: 24px;
    }
    .renders-hero p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 18px;
        line-height: 1.8;
        max-width: 700px;
    }
    .renders-gallery {
        padding: 80px 0;
        background: #ffffff;
    }
    .renders-gallery-header {
        text-align: center;
        margin-bottom: 60px;
    }
    .renders-gallery-header .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(16, 19, 24, 0.6);
        margin-bottom: 12px;
        display: block;
    }
    .renders-gallery-header h2 {
        font-size: 42px;
        font-weight: 800;
        margin: 0 0 16px;
        color: #101318;
    }
    .renders-gallery-header p {
        color: #5c6570;
        font-size: 16px;
        max-width: 600px;
        margin: 0 auto;
    }
    .render-card {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.1);
        transition: all 0.4s ease;
        height: 100%;
        min-height: 380px;
    }
    .render-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(16, 19, 24, 0.2);
    }
    .render-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .render-card:hover img {
        transform: scale(1.1);
    }
    .render-card-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(16, 19, 24, 0.95), rgba(16, 19, 24, 0.7), transparent);
        padding: 32px 24px 24px;
        color: #ffffff;
        transform: translateY(20px);
        transition: all 0.4s ease;
    }
    .render-card:hover .render-card-overlay {
        transform: translateY(0);
    }
    .render-card-overlay h5 {
        font-size: 20px;
        font-weight: 800;
        margin: 0 0 8px;
        color: #ffffff;
    }
    .render-card-overlay p {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
    }
    .btn-gallery {
        background: #f37920;
        border: none;
        color: #ffffff;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        box-shadow: 0 4px 12px rgba(243, 121, 32, 0.3);
    }
    .btn-gallery:hover {
        background: #d6681a;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(243, 121, 32, 0.4);
        color: #ffffff;
    }
    .btn-gallery .badge {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
    }

    /* Gallery Modal Styles */
    .render-gallery-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(16, 19, 24, 0.95);
        backdrop-filter: blur(10px);
        overflow: hidden;
    }
    .render-gallery-modal.active {
        display: flex;
        flex-direction: column;
        animation: fadeIn 0.3s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .gallery-modal-header {
        padding: 20px 30px;
        background: rgba(16, 19, 24, 0.9);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #ffffff;
    }
    .gallery-modal-header h3 {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        color: #ffffff;
    }
    .gallery-modal-close {
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: #ffffff;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .gallery-modal-close:hover {
        background: #f37920;
        border-color: #f37920;
        transform: rotate(90deg);
    }
    .gallery-modal-content {
        flex: 1;
        overflow-y: auto;
        padding: 30px;
    }
    .gallery-modal-description {
        color: rgba(255, 255, 255, 0.8);
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 30px;
        max-width: 800px;
    }
    .gallery-images-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    .gallery-image-item {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.05);
    }
    .gallery-image-item:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 24px rgba(243, 121, 32, 0.3);
    }
    .gallery-image-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        display: block;
    }
    .gallery-image-item.lightbox-active {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 10000;
        max-width: 90vw;
        max-height: 90vh;
        width: auto;
        height: auto;
        animation: zoomIn 0.3s ease;
    }
    @keyframes zoomIn {
        from {
            opacity: 0;
            transform: translate(-50%, -50%) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }
    }
    .gallery-image-item.lightbox-active img {
        width: auto;
        height: auto;
        max-width: 90vw;
        max-height: 90vh;
        object-fit: contain;
        border-radius: 8px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
    }
    .lightbox-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.98);
        z-index: 9998;
        cursor: pointer;
    }
    .lightbox-overlay.active {
        display: block;
        animation: fadeIn 0.2s ease;
    }
    .gallery-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(243, 121, 32, 0.9);
        color: #ffffff;
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        z-index: 10001;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .gallery-nav:hover {
        background: #f37920;
        transform: translateY(-50%) scale(1.1);
    }
    .gallery-nav.prev {
        left: 20px;
    }
    .gallery-nav.next {
        right: 20px;
    }
    .gallery-nav.close {
        top: 20px;
        right: 20px;
        transform: none;
        background: rgba(220, 38, 38, 0.9);
        width: 45px;
        height: 45px;
    }
    .gallery-nav.close:hover {
        background: #dc3545;
        transform: rotate(90deg) scale(1.1);
    }
    @media (max-width: 768px) {
        .gallery-images-grid {
            grid-template-columns: 1fr;
        }
        .gallery-modal-header h3 {
            font-size: 18px;
        }
        .gallery-nav {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }
        .gallery-nav.prev {
            left: 10px;
        }
        .gallery-nav.next {
            right: 10px;
        }
    }
    @media (max-width: 991px) {
        .renders-hero {
            padding: 70px 0 60px;
        }
        .renders-hero h2 {
            font-size: 36px;
        }
        .renders-gallery {
            padding: 60px 0;
        }
    }
</style>

<section class="renders-hero zoom-scroll-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="eyebrow">3D Visualization</span>
                <h2>Meglink Renders</h2>
                <h4>Leading Interior Designer in Kenya</h4>
                <p>
                    Meglink Ventures specializes in creating bespoke, high-end interiors that are a true reflection of your personality and lifestyle. We believe that exceptional design is functional, elegant, and enduring. From initial concept development to the final handover, our dedicated team manages every detail—ensuring a seamless, stress-free process and a stunning final result that elevates your living or working environment into a genuine masterpiece.
                </p>
                <a href="{{url('/')}}/our-work" class="btn btn-orange btn-lg mt-4">
                    Explore Portfolio &nbsp; &nbsp; <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- START: Renders Gallery Section -->
<section class="renders-gallery zoom-scroll-section">
    <div class="container">
        <div class="renders-gallery-header">
            <span class="eyebrow">Our Collection</span>
            <h2>Architectural Renders</h2>
            <p>Explore our collection of high-quality 3D renders that bring designs to life.</p>
        </div>

        <div class="row g-4 popup-gallery">
            @forelse($renders as $render)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <div class="render-card">
                            <img src="{{ asset('storage/' . $render->image) }}" alt="{{ $render->title }}">
                            <div class="render-card-overlay">
                                <h5>{{ $render->title }}</h5>
                                @if($render->description)
                                    <p>{{ \Illuminate\Support\Str::limit($render->description, 80) }}</p>
                                @endif
                                <button type="button" 
                                        class="btn btn-orange btn-gallery mt-3" 
                                        onclick="openRenderGallery({{ $render->id }})"
                                        data-render-id="{{ $render->id }}"
                                        data-render-title="{{ htmlspecialchars($render->title, ENT_QUOTES, 'UTF-8') }}"
                                        data-render-description="{{ htmlspecialchars($render->description ?? '', ENT_QUOTES, 'UTF-8') }}"
                                        data-render-main-image="{{ asset('storage/' . $render->image) }}"
                                        data-render-images='@json($render->images->map(function($img) { return asset('storage/' . $img->image_link); })->values()->toArray())'>
                                    <i class="fas fa-images mr-2"></i>View Gallery
                                    @if($render->images->count() > 0)
                                        <span class="badge badge-light ml-2">{{ $render->images->count() + 1 }}</span>
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div style="padding: 80px 20px;">
                        <i class="fas fa-images" style="font-size: 64px; color: #e9ecef; margin-bottom: 20px;"></i>
                        <h4 style="color: #5c6570; margin-bottom: 12px;">No Renders Available</h4>
                        <p class="text-muted">Check back soon for our latest 3D visualizations!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- END: Renders Gallery Section -->

<!-- Render Gallery Modal -->
<div id="renderGalleryModal" class="render-gallery-modal">
    <div class="gallery-modal-header">
        <h3 id="galleryModalTitle">Render Gallery</h3>
        <button type="button" class="gallery-modal-close" onclick="closeRenderGallery()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="gallery-modal-content">
        <p id="galleryModalDescription" class="gallery-modal-description"></p>
        <div id="galleryImagesGrid" class="gallery-images-grid"></div>
    </div>
</div>

<!-- Lightbox Overlay -->
<div id="lightboxOverlay" class="lightbox-overlay" onclick="closeLightbox()">
    <div style="position: absolute; top: 20px; right: 20px; color: rgba(255, 255, 255, 0.6); font-size: 14px; pointer-events: none;">
        Press ESC to close
    </div>
</div>

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

    // Render Gallery Functions
    let currentImageIndex = 0;
    let currentImages = [];

    function openRenderGallery(renderId) {
        const button = document.querySelector(`[data-render-id="${renderId}"]`);
        if (!button) return;

        const title = button.getAttribute('data-render-title');
        const description = button.getAttribute('data-render-description');
        const mainImage = button.getAttribute('data-render-main-image');
        const imagesJson = button.getAttribute('data-render-images');
        
        // Parse images array
        let images = [];
        try {
            images = JSON.parse(imagesJson);
        } catch (e) {
            images = [];
        }

        // Add main image as first image
        currentImages = [mainImage, ...images];
        currentImageIndex = 0;

        // Update modal content
        document.getElementById('galleryModalTitle').textContent = title;
        document.getElementById('galleryModalDescription').textContent = description || 'Explore all images from this render.';
        
        // Clear and populate gallery grid
        const grid = document.getElementById('galleryImagesGrid');
        grid.innerHTML = '';
        
        currentImages.forEach((imageUrl, index) => {
            const imageItem = document.createElement('div');
            imageItem.className = 'gallery-image-item';
            imageItem.onclick = () => openLightbox(index);
            imageItem.innerHTML = `<img src="${imageUrl}" alt="${title} - Image ${index + 1}" loading="lazy">`;
            grid.appendChild(imageItem);
        });

        // Show modal
        document.getElementById('renderGalleryModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeRenderGallery() {
        document.getElementById('renderGalleryModal').classList.remove('active');
        document.body.style.overflow = '';
        closeLightbox();
    }

    function openLightbox(index) {
        currentImageIndex = index;
        const imageItem = document.querySelectorAll('.gallery-image-item')[index];
        if (!imageItem) return;

        // Create lightbox container
        const lightboxContainer = document.createElement('div');
        lightboxContainer.className = 'gallery-image-item lightbox-active';
        lightboxContainer.style.position = 'fixed';
        lightboxContainer.style.top = '50%';
        lightboxContainer.style.left = '50%';
        lightboxContainer.style.transform = 'translate(-50%, -50%)';
        lightboxContainer.style.zIndex = '10000';
        lightboxContainer.style.maxWidth = '90vw';
        lightboxContainer.style.maxHeight = '90vh';
        lightboxContainer.onclick = (e) => e.stopPropagation();
        
        // Create image element
        const lightboxImg = document.createElement('img');
        lightboxImg.src = currentImages[index];
        lightboxImg.style.maxWidth = '90vw';
        lightboxImg.style.maxHeight = '90vh';
        lightboxImg.style.objectFit = 'contain';
        lightboxImg.style.display = 'block';
        lightboxImg.onclick = (e) => e.stopPropagation();
        
        // Add close button
        const closeBtn = document.createElement('button');
        closeBtn.className = 'gallery-nav close';
        closeBtn.innerHTML = '<i class="fas fa-times"></i>';
        closeBtn.onclick = (e) => {
            e.stopPropagation();
            closeLightbox();
        };
        closeBtn.title = 'Close (Esc)';
        
        // Add navigation buttons
        const navPrev = document.createElement('button');
        navPrev.className = 'gallery-nav prev';
        navPrev.innerHTML = '<i class="fas fa-chevron-left"></i>';
        navPrev.title = 'Previous (←)';
        navPrev.onclick = (e) => {
            e.stopPropagation();
            navigateLightbox(-1);
        };

        const navNext = document.createElement('button');
        navNext.className = 'gallery-nav next';
        navNext.innerHTML = '<i class="fas fa-chevron-right"></i>';
        navNext.title = 'Next (→)';
        navNext.onclick = (e) => {
            e.stopPropagation();
            navigateLightbox(1);
        };

        lightboxContainer.appendChild(lightboxImg);
        lightboxContainer.appendChild(closeBtn);
        lightboxContainer.appendChild(navPrev);
        lightboxContainer.appendChild(navNext);

        document.body.appendChild(lightboxContainer);
        document.getElementById('lightboxOverlay').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        const lightboxImg = document.querySelector('.gallery-image-item.lightbox-active');
        if (lightboxImg) {
            lightboxImg.remove();
        }
        document.getElementById('lightboxOverlay').classList.remove('active');
        document.body.style.overflow = '';
    }

    function navigateLightbox(direction) {
        currentImageIndex += direction;
        if (currentImageIndex < 0) {
            currentImageIndex = currentImages.length - 1;
        } else if (currentImageIndex >= currentImages.length) {
            currentImageIndex = 0;
        }
        closeLightbox();
        setTimeout(() => openLightbox(currentImageIndex), 100);
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (document.getElementById('lightboxOverlay').classList.contains('active')) {
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                navigateLightbox(-1);
            } else if (e.key === 'ArrowRight') {
                navigateLightbox(1);
            }
        } else if (document.getElementById('renderGalleryModal').classList.contains('active')) {
            if (e.key === 'Escape') {
                closeRenderGallery();
            }
        }
    });

    // Close modal when clicking outside
    document.getElementById('renderGalleryModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeRenderGallery();
        }
    });
</script>

@endsection
