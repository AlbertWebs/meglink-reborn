@extends('adminlte::page')

@section('title', 'Portfolios')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-briefcase mr-2"></i>Portfolios</h1>
        <a href="{{ route('admin.portfolio.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Portfolio
        </a>
    </div>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-body">
        @if($portfolios->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Service</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ Str::limit($portfolio->title, 40) }}</strong>
                            </td>
                            <td>
                                @if($portfolio->service)
                                    <span class="badge badge-info">{{ $portfolio->service->title }}</span>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                @if($portfolio->image)
                                    <img src="{{ asset('storage/'.$portfolio->image) }}" width="80" alt="{{ $portfolio->title }}">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="admin-btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this portfolio?');">
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
            <i class="fas fa-briefcase"></i>
            <h4>No Portfolios Yet</h4>
            <p>Get started by creating your first portfolio item.</p>
            <a href="{{ route('admin.portfolio.create') }}" class="admin-btn-primary mt-3">
                <i class="fas fa-plus mr-2"></i>Create First Portfolio
            </a>
        </div>
        @endif
    </div>
</div>
@stop
