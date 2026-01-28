@extends('adminlte::page')

@section('title', 'Create Slide')

@section('content_header')
    <h1><i class="fas fa-plus-circle mr-2"></i>Create New Slide</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-sliders-h mr-2"></i>New Hero Banner Slide</h3>
    </div>
    <div class="card-body">
        @include('admin.slides._form')
    </div>
</div>
@stop
