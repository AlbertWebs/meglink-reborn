@extends('adminlte::page')

@section('title', 'Renders Gallery')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <h1><i class="fas fa-images mr-2"></i>PRT Renders Gallery</h1>
            <p class="text-muted mb-0" style="font-size: 14px;">Manage your architectural renders and visualizations</p>
        </div>
        <a href="{{ route('renders.create') }}" class="admin-btn-primary mt-2">
            <i class="fas fa-plus mr-2"></i>Add New Render
        </a>
    </div>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<style>
    .renders-gallery {
        position: relative;
    }

    .gallery-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        padding: 20px;
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-card.primary {
        background: linear-gradient(135deg, #f37920 0%, #d6681a 100%);
        box-shadow: 0 4px 15px rgba(243, 121, 32, 0.3);
    }

    .stat-card.success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        box-shadow: 0 4px 15px rgba(17, 153, 142, 0.3);
    }

    .stat-card.info {
        background: linear-gradient(135deg, #3494e6 0%, #2980b9 100%);
        box-shadow: 0 4px 15px rgba(52, 148, 230, 0.3);
    }

    .stat-card .stat-icon {
        font-size: 32px;
        margin-bottom: 10px;
        opacity: 0.9;
    }

    .stat-card .stat-value {
        font-size: 32px;
        font-weight: 700;
        margin: 5px 0;
    }

    .stat-card .stat-label {
        font-size: 13px;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .gallery-filters {
        background: white;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
    }

    .gallery-filters input {
        flex: 1;
        min-width: 250px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 10px 15px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .gallery-filters input:focus {
        border-color: #f37920;
        outline: none;
        box-shadow: 0 0 0 3px rgba(243, 121, 32, 0.1);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        margin-top: 20px;
    }

    .render-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        cursor: pointer;
    }

    .render-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .render-card-image-wrapper {
        position: relative;
        width: 100%;
        height: 220px;
        overflow: hidden;
        background: #f8f9fa;
    }

    .render-card-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .render-card:hover .render-card-image-wrapper img {
        transform: scale(1.1);
    }

    .render-card-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: rgba(243, 121, 32, 0.95);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .render-card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .render-card:hover .render-card-overlay {
        opacity: 1;
    }

    .render-card-overlay-btn {
        background: rgba(255, 255, 255, 0.95);
        color: #2c3e50;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .render-card-overlay-btn:hover {
        background: white;
        transform: scale(1.05);
        color: #f37920;
    }

    .render-card-body {
        padding: 20px;
    }

    .render-card-title {
        font-size: 16px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0 0 8px 0;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .render-card-description {
        font-size: 13px;
        color: #6c757d;
        margin: 0 0 15px 0;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .render-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 15px;
        border-top: 1px solid #e9ecef;
    }

    .render-card-actions {
        display: flex;
        gap: 8px;
    }

    .render-card-date {
        font-size: 11px;
        color: #adb5bd;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-action {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        text-decoration: none;
    }

    .btn-action-edit {
        background: #17a2b8;
        color: white;
    }

    .btn-action-edit:hover {
        background: #138496;
        transform: translateY(-1px);
        color: white;
    }

    .btn-action-delete {
        background: #dc3545;
        color: white;
    }

    .btn-action-delete:hover {
        background: #c82333;
        transform: translateY(-1px);
        color: white;
    }

    .btn-action-view {
        background: #6c757d;
        color: white;
    }

    .btn-action-view:hover {
        background: #5a6268;
        transform: translateY(-1px);
        color: white;
    }

    .empty-state-enhanced {
        text-align: center;
        padding: 80px 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 16px;
        margin: 20px 0;
    }

    .empty-state-enhanced i {
        font-size: 80px;
        color: #dee2e6;
        margin-bottom: 20px;
        display: block;
    }

    .empty-state-enhanced h4 {
        color: #495057;
        font-size: 24px;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .empty-state-enhanced p {
        color: #6c757d;
        font-size: 16px;
        margin-bottom: 30px;
    }

    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .gallery-stats {
            grid-template-columns: 1fr;
        }

        .gallery-filters {
            flex-direction: column;
        }

        .gallery-filters input {
            width: 100%;
            min-width: auto;
        }
    }
</style>

@if(session('success'))
    <div class="alert alert-success alert-enhanced alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="renders-gallery">
    <!-- Statistics Cards -->
    <div class="gallery-stats">
        <div class="stat-card primary">
            <div class="stat-icon"><i class="fas fa-images"></i></div>
            <div class="stat-value">{{ $renders->count() }}</div>
            <div class="stat-label">Total Renders</div>
        </div>
        <div class="stat-card success">
            <div class="stat-icon"><i class="fas fa-image"></i></div>
            <div class="stat-value">{{ $renders->sum(function($render) { return $render->images->count(); }) }}</div>
            <div class="stat-label">Total Images</div>
        </div>
        <div class="stat-card info">
            <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
            <div class="stat-value">{{ $renders->where('created_at', '>=', now()->subDays(7))->count() }}</div>
            <div class="stat-label">This Week</div>
        </div>
    </div>

    <!-- Filters -->
    @if($renders->count() > 0)
    <div class="gallery-filters">
        <i class="fas fa-search text-muted"></i>
        <input type="text" id="searchInput" placeholder="Search renders by title or description..." autocomplete="off">
        <span class="text-muted" style="font-size: 13px;">
            <i class="fas fa-info-circle mr-1"></i>
            Showing {{ $renders->count() }} render(s)
        </span>
    </div>
    @endif

    <!-- Gallery Grid -->
    <div class="card admin-form-card" style="border: none; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
        <div class="card-body">
            @if($renders->count() > 0)
                <div class="gallery-grid" id="galleryGrid">
                    @foreach($renders as $render)
                        <div class="render-card" data-title="{{ strtolower($render->title ?? '') }}" data-description="{{ strtolower($render->description ?? '') }}">
                            <div class="render-card-image-wrapper">
                                <img src="{{ asset('storage/' . $render->image) }}" alt="{{ $render->title ?? 'Render' }}" loading="lazy">
                                <div class="render-card-badge">
                                    <i class="fas fa-images"></i>
                                    {{ $render->images->count() + 1 }} {{ $render->images->count() == 0 ? 'image' : 'images' }}
                                </div>
                                <div class="render-card-overlay">
                                    <a href="{{ route('renders.edit', $render->id) }}" class="render-card-overlay-btn">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="#" class="render-card-overlay-btn" onclick="viewRender({{ $render->id }}); return false;">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </div>
                            </div>
                            <div class="render-card-body">
                                <h5 class="render-card-title">{{ $render->title ?? 'Untitled Render' }}</h5>
                                @if($render->description)
                                    <p class="render-card-description">{{ $render->description }}</p>
                                @endif
                                <div class="render-card-footer">
                                    <div class="render-card-date">
                                        <i class="far fa-calendar mr-1"></i>
                                        {{ $render->created_at->format('M d, Y') }}
                                    </div>
                                    <div class="render-card-actions">
                                        <a href="{{ route('renders.edit', $render->id) }}" class="btn-action btn-action-edit" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('renders.destroy', $render->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this render? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-action-delete" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state-enhanced">
                    <i class="fas fa-images"></i>
                    <h4>No Renders Yet</h4>
                    <p>Start building your render gallery by uploading your first architectural visualization.</p>
                    <a href="{{ route('renders.create') }}" class="admin-btn-primary">
                        <i class="fas fa-plus mr-2"></i>Upload First Render
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewRenderModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #f37920 0%, #d6681a 100%); color: white; border: none;">
                <h5 class="modal-title"><i class="fas fa-images mr-2"></i>Render Details</h5>
                <button type="button" class="close" data-dismiss="modal" style="color: white;">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body" id="renderModalContent">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script>
    // Search functionality
    document.getElementById('searchInput')?.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const cards = document.querySelectorAll('.render-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const title = card.getAttribute('data-title');
            const description = card.getAttribute('data-description');
            const matches = title.includes(searchTerm) || description.includes(searchTerm);
            
            if (matches) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Update count
        const countElement = document.querySelector('.gallery-filters .text-muted');
        if (countElement) {
            countElement.innerHTML = `<i class="fas fa-info-circle mr-1"></i>Showing ${visibleCount} render(s)`;
        }
    });

    // View render function
    function viewRender(renderId) {
        // This would typically fetch render details via AJAX
        // For now, redirect to edit page
        window.location.href = '{{ url("admin/renders") }}/' + renderId + '/edit';
    }

    // Add smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
</script>
@stop
