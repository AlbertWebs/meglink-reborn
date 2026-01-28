@extends('adminlte::page')

@section('title', 'Create PMC Project')

@section('content_header')
    <h1><i class="fas fa-plus-circle mr-2"></i>Create New PMC Project</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-folder-open mr-2"></i>New PMC Project</h3>
    </div>
    <form action="{{ route('admin.pages.project-management-consultant-projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @include('admin.pages.project-management-consultant-projects.form', ['project' => null])
        </div>
    </form>
</div>
@endsection
