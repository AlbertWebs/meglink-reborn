@extends('adminlte::page')

@section('title', 'Add Land')

@section('content_header')
    <h1>Add New Land Listing</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('lands.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
      </div>
      <!-- resources/views/lands/create.blade.php -->

    <!-- Type -->
    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" class="form-control" required>
            <option value="sale" {{ old('type') == 'sale' ? 'selected' : '' }}>Sale</option>
            <option value="joint_venture" {{ old('type') == 'joint_venture' ? 'selected' : '' }}>Joint Venture</option>
        </select>
    </div>


      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Location</label>
          <input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Price (KES)</label>
          <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Images (you can select multiple)</label>
        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
      </div>

      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Save Listing
      </button>
      <a href="{{ route('lands.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@stop
