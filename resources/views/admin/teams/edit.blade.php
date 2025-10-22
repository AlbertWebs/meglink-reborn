@extends('adminlte::page')

@section('content')
<div class="container py-4">
    <h2>Edit Team Member</h2>
    <form action="{{ route('admin.teams.update', $team) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ $team->name }}" required>
        </div>
        <div class="mb-3">
            <label>Designation</label>
            <input name="designation" class="form-control" value="{{ $team->designation }}" required>
        </div>
        <div class="mb-3">
            <label>Instagram</label>
            <input name="instagram" class="form-control" value="{{ $team->instagram }}">
        </div>
        <div class="mb-3">
            <label>Twitter</label>
            <input name="twitter" class="form-control" value="{{ $team->twitter }}">
        </div>
        <div class="mb-3">
            <label>LinkedIn</label>
            <input name="linkedin" class="form-control" value="{{ $team->linkedin }}">
        </div>
        <div class="mb-3">
            <label>Image</label>
            @if($team->image)
                <div><img src="{{ asset('storage/'.$team->image) }}" width="100" class="mb-2"></div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
