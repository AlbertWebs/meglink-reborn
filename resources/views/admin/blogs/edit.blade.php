@extends('adminlte::page')

@section('title', 'Edit Blog Post')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit Blog Post</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-blog mr-2"></i>Edit Blog Post</h3>
    </div>
    <div class="card-body">
        @include('admin.blogs._form', ['blog' => $blog])
    </div>
</div>
@endsection
