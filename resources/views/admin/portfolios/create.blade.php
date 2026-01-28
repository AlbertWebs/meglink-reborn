@extends('adminlte::page')

@section('title', 'Create Portfolio')

@section('content_header')
    <h1><i class="fas fa-plus-circle mr-2"></i>Create New Portfolio</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-briefcase mr-2"></i>New Portfolio</h3>
    </div>
    <div class="card-body">
        @include('admin.portfolios._form')
    </div>
</div>
@endsection
