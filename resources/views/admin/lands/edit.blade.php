@extends('adminlte::page')

@section('title', 'Edit Land Listing')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit Land Listing</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-tree mr-2"></i>Edit Land Listing</h3>
    </div>
    <div class="card-body">
        @include('admin.lands._form', ['land' => $land])
    </div>
</div>
@stop
