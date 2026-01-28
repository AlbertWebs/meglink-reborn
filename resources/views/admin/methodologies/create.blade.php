@extends('adminlte::page')

@section('title', 'Create Methodology Step')

@section('content_header')
    <h1><i class="fas fa-plus-circle mr-2"></i>Create New Methodology Step</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-clipboard-list mr-2"></i>New Methodology Step</h3>
    </div>
    <div class="card-body">
        @include('admin.methodologies._form')
    </div>
</div>
@endsection
