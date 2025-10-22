@extends('adminlte::page')

@section('title', 'Add Render')

@section('content_header')
    <h1>Add New Render</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('renders.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control" required>{{ old('description') }}</textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Upload Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
      </div>

      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Save Render
      </button>
      <a href="{{ route('renders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@stop
