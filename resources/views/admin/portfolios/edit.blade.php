@extends('adminlte::page')

@section('title', 'Edit Portfolio')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit Portfolio - {{ $portfolio->title }}</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-briefcase mr-2"></i>Edit Portfolio</h3>
    </div>
    <div class="card-body">
        @include('admin.portfolios._form', ['portfolio' => $portfolio])
    </div>
</div>
@endsection
