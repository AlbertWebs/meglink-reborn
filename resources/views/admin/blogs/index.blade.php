@extends('adminlte::page')

@section('title', 'Blogs')

@section('content_header')
    <h1>Admin Blogs</h1>
@stop

@section('page_title','Blog Posts')

@section('content')
<div class="card">
  <div class="card-header">
    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Add Blog</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th><th>Title</th><th>Image</th><th>Date</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($blogs as $blog)
        <tr>
          <td>{{ $blog->id }}</td>
          <td>{{ $blog->title }}</td>
          <td>@if($blog->image)<img src="{{ asset('storage/'.$blog->image) }}" height="50">@endif</td>
          <td>{{ $blog->created_at->toDateString() }}</td>
          <td>
            <a href="{{ route('admin.blog.show', $blog) }}" class="btn btn-sm btn-info">Edit</a>
            <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $blogs->links() }}
  </div>
</div>
@endsection
