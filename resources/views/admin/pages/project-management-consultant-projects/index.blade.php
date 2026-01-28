@extends('adminlte::page')

@section('title', 'PMC Projects')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-folder-open mr-2"></i>PMC Projects</h1>
        <a href="{{ route('admin.pages.project-management-consultant-projects.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus mr-2"></i>New Project
        </a>
    </div>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
@php
    $resolveImage = function (?string $path) {
        if (!$path) {
            return null;
        }
        if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }
        if (\Illuminate\Support\Str::startsWith($path, 'uploads/')) {
            return asset($path);
        }
        return \Illuminate\Support\Facades\Storage::url($path);
    };
@endphp

@if(session('success'))
    <div class="alert alert-success alert-enhanced">{{ session('success') }}</div>
@endif

<div class="card admin-form-card">
    <div class="card-body">
        @if($projects->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Preview</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Timeline</th>
                        <th>Excerpt</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>
                                @if($project->image)
                                    <img
                                        src="{{ $resolveImage($project->image) }}"
                                        alt="{{ $project->title }}"
                                        style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid rgba(16, 19, 24, 0.12);"
                                    >
                                @else
                                    <span class="text-muted small">No image</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ Str::limit($project->title, 40) }}</strong>
                            </td>
                            <td>{{ $project->location ?? 'N/A' }}</td>
                            <td>{{ $project->timeline ?? 'N/A' }}</td>
                            <td class="text-muted" style="max-width: 250px;">
                                {{ \Illuminate\Support\Str::limit($project->excerpt, 80) }}
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('project-management-consultants.project', $project->slug) }}" class="admin-btn-info" target="_blank">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('admin.pages.project-management-consultant-projects.edit', $project) }}" class="admin-btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.pages.project-management-consultant-projects.destroy', $project) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this project?');">
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
            <i class="fas fa-folder-open"></i>
            <h4>No Projects Yet</h4>
            <p>Get started by creating your first PMC project.</p>
            <a href="{{ route('admin.pages.project-management-consultant-projects.create') }}" class="admin-btn-primary mt-3">
                <i class="fas fa-plus mr-2"></i>Create First Project
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
