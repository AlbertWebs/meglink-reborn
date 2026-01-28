@extends('adminlte::page')

@section('title', 'Create Testimonial')

@section('content_header')
    <h1><i class="fas fa-plus-circle mr-2"></i>Create New Testimonial</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-comments mr-2"></i>New Testimonial</h3>
    </div>
    <div class="card-body">
        @include('admin.testimonials._form')
    </div>
</div>
@endsection
