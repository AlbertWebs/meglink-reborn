@extends('adminlte::page')

@section('title', 'Manage Slides')

@section('content_header')
    <h1>Hero Banner Slides</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
    <a href="{{ route('admin.slides.create') }}" class="btn btn-success">
      <i class="fas fa-plus"></i> Add Slide
    </a>
  </div>

  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
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
          <td><img src="{{ asset('storage/' . $slide->image) }}" width="120" class="rounded"></td>
          <td>{{ $slide->title ?? '-' }}</td>
          <td>{{ $slide->subtitle ?? '-' }}</td>
          <td>
            <span class="badge bg-{{ $slide->is_active ? 'success' : 'secondary' }}">
              {{ $slide->is_active ? 'Active' : 'Inactive' }}
            </span>
          </td>
          <td>
            <a href="{{ route('admin.slides.edit', $slide) }}" class="btn btn-primary btn-sm">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('admin.slides.destroy', $slide) }}" method="POST" style="display:inline-block;">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this slide?')">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
