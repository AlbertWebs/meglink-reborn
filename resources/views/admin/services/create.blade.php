@extends('adminlte::page')

@section('title', 'Create Service')

@section('content_header')
    <h1><i class="fas fa-plus-circle mr-2"></i>Create New Service</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-cogs mr-2"></i>New Service</h3>
    </div>
    <div class="card-body">
        @include('admin.services._form')
    </div>
</div>
@endsection
