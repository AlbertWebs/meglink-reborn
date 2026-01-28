@extends('adminlte::page')

@section('title', 'Edit Service')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit Service</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-cogs mr-2"></i>Edit Service</h3>
    </div>
    <div class="card-body">
        @include('admin.services._form', ['service' => $service])
    </div>
</div>
@endsection
