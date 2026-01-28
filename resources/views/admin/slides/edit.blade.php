@extends('adminlte::page')

@section('title', 'Edit Slide')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit Slide</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-sliders-h mr-2"></i>Edit Hero Banner Slide</h3>
    </div>
    <div class="card-body">
        @include('admin.slides._form', ['slide' => $slide])
    </div>
</div>
@stop
