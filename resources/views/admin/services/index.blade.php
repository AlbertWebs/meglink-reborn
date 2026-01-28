@extends('adminlte::page')

@section('title', 'Services')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-cogs mr-2"></i>Services</h1>
        <a href="{{ route('admin.services.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Service
        </a>
    </div>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-body">
        @if($services->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>
                                <strong>{{ Str::limit($service->title, 50) }}</strong>
                            </td>
                            <td>
                                @if($service->image)
                                    <img src="{{ asset('storage/'.$service->image) }}" height="60" alt="{{ $service->title }}">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>{{ $service->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.services.edit', $service) }}" class="admin-btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this service?');">
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
        <div class="mt-4">
            {{ $services->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-cogs"></i>
            <h4>No Services Yet</h4>
            <p>Get started by creating your first service.</p>
            <a href="{{ route('admin.services.create') }}" class="admin-btn-primary mt-3">
                <i class="fas fa-plus mr-2"></i>Create First Service
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
