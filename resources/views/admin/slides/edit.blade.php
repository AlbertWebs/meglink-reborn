@extends('adminlte::page')

@section('title', 'Edit Slide')

@section('content_header')
    <h1>Edit Slide</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('slides.update', $slide) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $slide->title }}">
      </div>

      <div class="mb-3">
        <label class="form-label">Subtitle</label>
        <input type="text" name="subtitle" class="form-control" value="{{ $slide->subtitle }}">
      </div>

      <div class="mb-3">
        <label class="form-label">Current Image</label><br>
        <img src="{{ asset('storage/' . $slide->image) }}" width="150" class="rounded mb-2">
        <input type="file" name="image" class="form-control">
      </div>

      <div class="form-check mb-3">
        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $slide->is_active ? 'checked' : '' }}>
        <label class="form-check-label" for="is_active">Active</label>
      </div>

      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Update
      </button>
      <a href="{{ route('slides.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@stop
