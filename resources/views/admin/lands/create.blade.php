@extends('adminlte::page')

@section('title', 'Create Land Listing')

@section('content_header')
    <h1><i class="fas fa-plus-circle mr-2"></i>Create New Land Listing</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-tree mr-2"></i>New Land Listing</h3>
    </div>
    <div class="card-body">
        @include('admin.lands._form')
    </div>
</div>
@stop
