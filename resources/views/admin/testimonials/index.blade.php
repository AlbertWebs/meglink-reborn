@extends('adminlte::page')

@section('title', 'Testimonials')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-comments mr-2"></i>Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Testimonial
        </a>
    </div>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-body">
        @if($testimonials->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Rating</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>
                                <strong>{{ $t->name }}</strong>
                            </td>
                            <td>{{ $t->position ?? 'N/A' }}</td>
                            <td>
                                @for($i = 0; $i < $t->stars; $i++)
                                    <span style="color: #f37920;">⭐</span>
                                @endfor
                                <span class="text-muted">({{ $t->stars }})</span>
                            </td>
                            <td>
                                @if($t->image)
                                    <img src="{{ asset('storage/'.$t->image) }}" height="60" alt="{{ $t->name }}">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.testimonials.edit', $t) }}" class="admin-btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
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
            {{ $testimonials->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-comments"></i>
            <h4>No Testimonials Yet</h4>
            <p>Get started by adding your first testimonial.</p>
            <a href="{{ route('admin.testimonials.create') }}" class="admin-btn-primary mt-3">
                <i class="fas fa-plus mr-2"></i>Add First Testimonial
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
