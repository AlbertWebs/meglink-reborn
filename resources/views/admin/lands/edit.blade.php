@extends('adminlte::page')

@section('title', 'Edit Land')

@section('content_header')
    <h1>Edit Land Listing</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('lands.update', $land) }}" method="POST" enctype="multipart/form-data">
      @csrf @method('PUT')

      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $land->title) }}" required>
      </div>

      <!-- resources/views/lands/edit.blade.php -->

    <!-- Type -->
    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" class="form-control" required>
            <option value="sale" {{ $land->type == 'sale' ? 'selected' : '' }}>Sale</option>
            <option value="joint_venture" {{ $land->type == 'joint_venture' ? 'selected' : '' }}>Joint Venture</option>
        </select>
    </div>


      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="4" class="form-control" required>{{ old('description', $land->description) }}</textarea>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Location</label>
          <input type="text" name="location" class="form-control" value="{{ old('location', $land->location) }}" required>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Price (KES)</label>
          <input type="number" name="price" class="form-control" value="{{ old('price', $land->price) }}" required>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Add More Images (optional)</label>
        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
      </div>

      @if($land->images)
      <div class="mb-3">
        <label class="form-label">Existing Images</label>
        <div class="d-flex flex-wrap gap-2">
          @foreach($land->images as $img)
            <img src="{{ asset('storage/'.$img) }}" height="80" class="rounded border">
          @endforeach
        </div>
      </div>
      @endif

      <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Update Listing
      </button>
      <a href="{{ route('lands.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@stop
