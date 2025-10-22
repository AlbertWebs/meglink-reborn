@extends('adminlte::page')

@section('title', 'Add Slide')

@section('content_header')
    <h1>Add New Slide</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Subtitle</label>
        <input type="text" name="subtitle" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control" required>
      </div>

      <div class="form-check mb-3">
        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
        <label class="form-check-label" for="is_active">Active</label>
      </div>

      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Save
      </button>
      <a href="{{ route('admin.slides.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@stop
