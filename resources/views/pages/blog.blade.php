@extends('layouts.master')

@section('content')

<style>
    /* Blog Hero */
    .blog-hero {
        background: linear-gradient(135deg, #101318 0%, #1a1f28 100%);
        padding: 100px 0 80px;
        color: #ffffff;
    }
    .blog-hero .eyebrow {
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-size: 12px;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 16px;
        display: block;
    }
    .blog-hero h1 {
        font-size: 48px;
        font-weight: 800;
        margin: 0 0 20px;
        color: #ffffff;
        line-height: 1.2;
    }
    .blog-hero p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 18px;
        max-width: 700px;
    }

    /* Blog Grid */
    .blog-grid-section {
        padding: 80px 0;
        background: #ffffff;
    }
    .blog-card {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 12px 30px rgba(16, 19, 24, 0.1);
        transition: all 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(16, 19, 24, 0.2);
    }
    .blog-card-image {
        position: relative;
        height: 280px;
        overflow: hidden;
    }
    .blog-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .blog-card:hover .blog-card-image img {
        transform: scale(1.1);
    }
    .blog-card-body {
        padding: 32px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .blog-card-meta {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
        font-size: 13px;
        color: #5c6570;
    }
    .blog-card-meta i {
        color: #f37920;
    }
    .blog-card-title {
        font-size: 24px;
        font-weight: 800;
        margin: 0 0 16px;
        color: #101318;
        line-height: 1.3;
    }
    .blog-card-title a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .blog-card-title a:hover {
        color: #f37920;
    }
    .blog-card-excerpt {
        color: #5c6570;
        line-height: 1.7;
        margin-bottom: 24px;
        flex: 1;
    }
    .blog-card-link {
        color: #f37920;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: gap 0.3s ease;
    }
    .blog-card-link:hover {
        gap: 12px;
        color: #d6681a;
    }
    .blog-empty-state {
        text-align: center;
        padding: 100px 20px;
    }
    .blog-empty-state i {
        font-size: 64px;
        color: #e9ecef;
        margin-bottom: 24px;
    }
    .blog-empty-state h3 {
        color: #5c6570;
        margin-bottom: 12px;
    }

    /* Pagination */
    .blog-pagination {
        margin-top: 60px;
        display: flex;
        justify-content: center;
    }
    .blog-pagination .pagination {
        display: flex;
        gap: 8px;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .blog-pagination .page-item {
        margin: 0;
    }
    .blog-pagination .page-link {
        padding: 12px 18px;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        color: #5c6570;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
        background: #ffffff;
    }
    .blog-pagination .page-link:hover {
        border-color: #f37920;
        color: #f37920;
        background: rgba(243, 121, 32, 0.05);
    }
    .blog-pagination .page-item.active .page-link {
        background: #f37920;
        border-color: #f37920;
        color: #ffffff;
    }

    @media (max-width: 991px) {
        .blog-hero {
            padding: 70px 0 60px;
        }
        .blog-hero h1 {
            font-size: 36px;
        }
        .blog-grid-section {
            padding: 60px 0;
        }
    }
</style>

<section class="blog-hero">
    <div class="container">
        <span class="eyebrow">Trendy Updates</span>
        <h1>Our Blog</h1>
        <p>Stay updated with the latest trends, insights, and stories from the world of interior design.</p>
    </div>
</section>

<section class="blog-grid-section">
    <div class="container">
        @if(isset($blogs) && $blogs->count() > 0)
            <div class="row g-4">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <article class="blog-card">
                            @if($blog->image)
                                <div class="blog-card-image">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                </div>
                            @endif
                            <div class="blog-card-body">
                                <div class="blog-card-meta">
                                    <span><i class="far fa-calendar"></i> {{ $blog->created_at->format('M d, Y') }}</span>
                                </div>
                                <h3 class="blog-card-title">
                                    <a href="#">{{ $blog->title }}</a>
                                </h3>
                                @if($blog->content)
                                    <p class="blog-card-excerpt">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}
                                    </p>
                                @endif
                                <a href="#" class="blog-card-link">
                                    Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            @if($blogs->hasPages())
                <div class="blog-pagination">
                    {{ $blogs->links() }}
                </div>
            @endif
        @else
            <div class="blog-empty-state">
                <i class="fas fa-blog"></i>
                <h3>No Blog Posts Yet</h3>
                <p class="text-muted">Check back soon for our latest updates and insights!</p>
            </div>
        @endif
    </div>
</section>

@endsection
