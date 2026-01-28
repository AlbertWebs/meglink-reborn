@extends('adminlte::page')

@section('title', 'Edit Testimonial')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit Testimonial</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-comments mr-2"></i>Edit Testimonial</h3>
    </div>
    <div class="card-body">
        @include('admin.testimonials._form', ['testimonial' => $testimonial])
    </div>
</div>
@endsection
