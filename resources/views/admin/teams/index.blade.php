@extends('adminlte::page')

@section('title', 'Team Members')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-users mr-2"></i>Team Members</h1>
        <a href="{{ route('admin.teams.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Member
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
        @if($teams->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Social Links</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>
                                @if($team->image)
                                    <img src="{{ asset('storage/'.$team->image) }}" width="80" alt="{{ $team->name }}" style="border-radius: 8px;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $team->name }}</strong>
                            </td>
                            <td>{{ $team->designation ?? 'N/A' }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    @if($team->instagram)
                                        <a href="{{ $team->instagram }}" target="_blank" class="text-danger">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    @endif
                                    @if($team->twitter)
                                        <a href="{{ $team->twitter }}" target="_blank" class="text-info">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    @endif
                                    @if($team->linkedin)
                                        <a href="{{ $team->linkedin }}" target="_blank" class="text-primary">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    @endif
                                    @if(!$team->instagram && !$team->twitter && !$team->linkedin)
                                        <span class="text-muted">No social links</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.teams.edit', $team) }}" class="admin-btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.teams.destroy', $team) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this team member?');">
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
            {{ $teams->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-users"></i>
            <h4>No Team Members Yet</h4>
            <p>Get started by adding your first team member.</p>
            <a href="{{ route('admin.teams.create') }}" class="admin-btn-primary mt-3">
                <i class="fas fa-plus mr-2"></i>Add First Team Member
            </a>
        </div>
        @endif
    </div>
</div>
@stop
