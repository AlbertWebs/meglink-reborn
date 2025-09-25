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
                <a href="{{ route('admin.blog.index') }}" class="small-box-footer">Manage Blogs <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{ route('admin.portfolio.index') }}" class="small-box-footer">Manage Portfolios <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{ route('admin.services.index') }}" class="small-box-footer">Manage Services <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{ route('admin.testimonials.index') }}" class="small-box-footer">Manage Testimonials <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
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
                <a href="{{ route('admin.settings.index') }}" class="small-box-footer">Manage Settings <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Settings -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><i class="fas fa-cog"></i></h3>
                    <p>Public Website</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tools"></i>
                </div>
                <a target="new" href="{{ route('home') }}" class="small-box-footer">View Website Home Page <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>




@stop
