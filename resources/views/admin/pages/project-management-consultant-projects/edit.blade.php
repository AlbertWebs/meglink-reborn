@extends('adminlte::page')

@section('title', 'Edit PMC Project')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit PMC Project</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-folder-open mr-2"></i>Edit PMC Project</h3>
    </div>
    <form action="{{ route('admin.pages.project-management-consultant-projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            @include('admin.pages.project-management-consultant-projects.form', ['project' => $project])
        </div>
    </form>
</div>
@endsection
