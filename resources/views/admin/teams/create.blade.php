@extends('adminlte::page')

@section('content')
@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
<div class="container py-4">
    <h2>Add Team Member</h2>
    <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Designation</label>
            <input name="designation" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Instagram</label>
            <input name="instagram" class="form-control">
        </div>
        <div class="mb-3">
            <label>Twitter</label>
            <input name="twitter" class="form-control">
        </div>
        <div class="mb-3">
            <label>LinkedIn</label>
            <input name="linkedin" class="form-control">
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
