@extends('adminlte::page')

@section('title', 'Renders Gallery')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-image mr-2"></i>Renders Gallery</h1>
        <a href="{{ route('renders.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Render
        </a>
    </div>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
@if(session('success'))
    <div class="alert alert-success alert-enhanced">{{ session('success') }}</div>
@endif

<div class="card admin-form-card">
    <div class="card-body">
        @if($renders->count() > 0)
            <div class="row">
                @foreach($renders as $render)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm" style="border-radius: 12px; overflow: hidden; transition: all 0.3s ease;">
                            <img src="{{ asset('storage/' . $render->image) }}" alt="Render Image" class="card-img-top" style="height:200px; object-fit:cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-3">{{ $render->title ?? 'Untitled' }}</h5>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('renders.edit', $render->id) }}" class="admin-btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('renders.destroy', $render->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this render?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-image"></i>
                <h4>No Renders Yet</h4>
                <p>Get started by uploading your first render.</p>
                <a href="{{ route('renders.create') }}" class="admin-btn-primary mt-3">
                    <i class="fas fa-plus mr-2"></i>Upload First Render
                </a>
            </div>
        @endif
    </div>
</div>
@stop
