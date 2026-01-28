@extends('adminlte::page')

@section('title', 'Hero Banner Slides')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-sliders-h mr-2"></i>Hero Banner Slides</h1>
        <a href="{{ route('admin.slides.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Slide
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
        @if($slides->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slides as $slide)
                        <tr>
                            <td>
                                @if($slide->image)
                                    <img src="{{ asset('storage/' . $slide->image) }}" width="120" alt="{{ $slide->title }}" style="border-radius: 8px;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $slide->title ?? 'N/A' }}</strong>
                            </td>
                            <td>{{ Str::limit($slide->subtitle ?? 'N/A', 50) }}</td>
                            <td>
                                <span class="badge badge-{{ $slide->is_active ? 'success' : 'secondary' }}">
                                    {{ $slide->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.slides.edit', $slide) }}" class="admin-btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.slides.destroy', $slide) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this slide?');">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-sliders-h"></i>
            <h4>No Slides Yet</h4>
            <p>Get started by creating your first hero banner slide.</p>
            <a href="{{ route('admin.slides.create') }}" class="admin-btn-primary mt-3">
                <i class="fas fa-plus mr-2"></i>Create First Slide
            </a>
        </div>
        @endif
    </div>
</div>
@stop
