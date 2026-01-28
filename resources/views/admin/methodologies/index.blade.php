@extends('adminlte::page')

@section('title', 'Our Methodology')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-clipboard-list mr-2"></i>Our Methodology</h1>
        <a href="{{ route('admin.methodologies.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Step
        </a>
    </div>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-enhanced">
                {{ session('success') }}
            </div>
        @endif

        @if($methodologies->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Step #</th>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($methodologies as $methodology)
                    <tr>
                        <td>{{ $methodology->id }}</td>
                        <td>
                            <span class="badge badge-primary">{{ $methodology->step_number }}</span>
                        </td>
                        <td>
                            <strong>{{ Str::limit($methodology->title, 50) }}</strong>
                        </td>
                        <td>
                            <i class="{{ $methodology->icon }}"></i>
                            <small class="text-muted">{{ $methodology->icon }}</small>
                        </td>
                        <td>{{ $methodology->order }}</td>
                        <td>
                            @if($methodology->is_active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.methodologies.show', $methodology) }}" class="admin-btn-info">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.methodologies.destroy', $methodology) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this methodology step?');">
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
            {{ $methodologies->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-clipboard-list"></i>
            <h4>No Methodology Steps Yet</h4>
            <p>Get started by creating your first methodology step.</p>
            <a href="{{ route('admin.methodologies.create') }}" class="admin-btn-primary mt-3">
                <i class="fas fa-plus mr-2"></i>Create First Step
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
