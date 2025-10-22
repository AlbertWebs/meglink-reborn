@extends('adminlte::page')

@section('title', 'Edit Render')

@section('content_header')
    <h1>Edit Render</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('renders.update', $render->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $render->title) }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control" required>{{ old('description', $render->description) }}</textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Current Image</label><br>
        <img src="{{ asset('storage/' . $render->image) }}" alt="Render Image" class="img-fluid rounded mb-2" style="max-height: 200px;">
      </div>

      <div class="mb-3">
        <label class="form-label">Replace Image (optional)</label>
        <input type="file" name="image" class="form-control" accept="image/*">
      </div>

      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Update Render
      </button>
      <a href="{{ route('renders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@stop
