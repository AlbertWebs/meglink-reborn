@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Admin Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <!-- Blog -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $blogCount ?? 0 }}</h3>
                    <p>Blog Posts</p>
                </div>
                <div class="icon">
                    <i class="fas fa-blog"></i>
                </div>
                <a href="{{ route('admin.blog.index') }}" class="small-box-footer">
                    Manage Blogs <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Portfolio -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $portfolioCount ?? 0 }}</h3>
                    <p>Portfolios</p>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <a href="{{ route('admin.portfolio.index') }}" class="small-box-footer">
                    Manage Portfolios <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Services -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $serviceCount ?? 0 }}</h3>
                    <p>Services</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <a href="{{ route('admin.services.index') }}" class="small-box-footer">
                    Manage Services <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $testimonialCount ?? 0 }}</h3>
                    <p>Testimonials</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comments"></i>
                </div>
                <a href="{{ route('admin.testimonials.index') }}" class="small-box-footer">
                    Manage Testimonials <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Lands for Sale -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $landCount ?? 0 }}</h3>
                    <p>Lands for Sale</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tree"></i>
                </div>
                <a href="{{ route('lands.index') }}" class="small-box-footer">
                    Manage Lands <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Renders -->
        <div class="col-lg-3 col-6">
            <div class="small-box" style="background-color: #f37920; color: white;">
                <div class="inner">
                    <h3>{{ $renderCount ?? 0 }}</h3>
                    <p>Renders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-image"></i>
                </div>
                <a href="{{ route('renders.index') }}" class="small-box-footer" style="color: white;">
                    Manage Renders <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Hero Banner Slides -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-dark text-white">
                <div class="inner">
                    <h3>{{ $slideCount ?? 0 }}</h3>
                    <p>Hero Banner Slides</p>
                </div>
                <div class="icon">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <a href="{{ route('admin.slides.index') }}" class="small-box-footer text-white">
                    Manage Slides <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Team Members -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-purple">
                <div class="inner">
                    <h3>{{ $teamCount ?? 0 }}</h3>
                    <p>Team Members</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.teams.index') }}" class="small-box-footer">
                    Manage Team <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Settings -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3><i class="fas fa-cog"></i></h3>
                    <p>Website Settings</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tools"></i>
                </div>
                <a href="{{ route('admin.settings.index') }}" class="small-box-footer">
                    Manage Settings <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Public Website -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><i class="fas fa-globe"></i></h3>
                    <p>Public Website</p>
                </div>
                <div class="icon">
                    <i class="fas fa-eye"></i>
                </div>
                <a target="_blank" href="{{ route('home') }}" class="small-box-footer">
                    View Home Page <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@stop
