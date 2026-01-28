@extends('adminlte::page')

@section('title', 'Blog Posts')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-blog mr-2"></i>Blog Posts</h1>
        <a href="{{ route('admin.blog.create') }}" class="admin-btn-primary">
            <i class="fas fa-plus mr-2"></i>Add New Blog
        </a>
    </div>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-body">
        @if($blogs->count() > 0)
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
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                            <strong>{{ Str::limit($blog->title, 50) }}</strong>
                        </td>
                        <td>
                            @if($blog->image)
                                <img src="{{ asset('storage/'.$blog->image) }}" height="60" alt="{{ $blog->title }}">
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>{{ $blog->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.blog.show', $blog) }}" class="admin-btn-info">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
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
            {{ $blogs->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-blog"></i>
            <h4>No Blog Posts Yet</h4>
            <p>Get started by creating your first blog post.</p>
            <a href="{{ route('admin.blog.create') }}" class="admin-btn-primary mt-3">
                <i class="fas fa-plus mr-2"></i>Create First Blog Post
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
