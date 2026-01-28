@extends('adminlte::page')

@section('title', 'Edit Methodology Step')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit Methodology Step</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-clipboard-list mr-2"></i>Edit Methodology Step</h3>
    </div>
    <div class="card-body">
        @include('admin.methodologies._form', ['methodology' => $methodology])
    </div>
</div>
@endsection
