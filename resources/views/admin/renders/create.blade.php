@extends('adminlte::page')

@section('title', 'Create Render')

@section('content_header')
    <h1><i class="fas fa-plus-circle mr-2"></i>Create New Render</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-image mr-2"></i>New Render</h3>
    </div>
    <div class="card-body">
        @include('admin.renders._form')
    </div>
</div>
@stop
