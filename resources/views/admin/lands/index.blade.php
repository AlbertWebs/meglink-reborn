@extends('adminlte::page')

@section('title', 'Lands for Sale')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-tree mr-2"></i>Lands for Sale</h1>
        <a href="{{ route('lands.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Land
        </a>
    </div>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-body">
        @if($lands->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Price (KES)</th>
                        <th>Images</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lands as $land)
                        <tr>
                            <td>{{ $land->id }}</td>
                            <td>
                                <strong>{{ Str::limit($land->title, 40) }}</strong>
                            </td>
                            <td>{{ $land->location ?? 'N/A' }}</td>
                            <td>
                                <strong style="color: #f37920;">KES {{ number_format($land->price, 2) }}</strong>
                            </td>
                            <td>
                                @if(!empty($land->images) && is_array($land->images))
                                    <div class="d-flex flex-wrap gap-1">
                                        @foreach(array_slice($land->images, 0, 3) as $img)
                                            <img src="{{ asset('storage/'.$img) }}" alt="land image" height="50" style="border-radius: 6px; border: 1px solid #e9ecef;">
                                        @endforeach
                                        @if(count($land->images) > 3)
                                            <span class="badge badge-info">+{{ count($land->images) - 3 }} more</span>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-muted">No images</span>
                                @endif
                            </td>
                            <td>{{ $land->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('lands.edit', $land) }}" class="admin-btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('lands.destroy', $land) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this land listing?');">
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
            <i class="fas fa-tree"></i>
            <h4>No Land Listings Yet</h4>
            <p>Get started by adding your first land listing.</p>
            <a href="{{ route('lands.create') }}" class="admin-btn-primary mt-3">
                <i class="fas fa-plus mr-2"></i>Add First Land Listing
            </a>
        </div>
        @endif
    </div>
</div>
@stop
