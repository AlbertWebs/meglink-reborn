@extends('adminlte::page')

@section('title', 'Edit Render')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit Render</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-image mr-2"></i>Edit Render</h3>
    </div>
    <div class="card-body">
        @include('admin.renders._form', ['render' => $render])
    </div>
</div>
@stop
