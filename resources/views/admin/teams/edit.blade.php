@extends('adminlte::page')

@section('title', 'Edit Team Member')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit Team Member</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-users mr-2"></i>Edit Team Member</h3>
    </div>
    <div class="card-body">
        @include('admin.teams._form', ['team' => $team])
    </div>
</div>
@endsection
