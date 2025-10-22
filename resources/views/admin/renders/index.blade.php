@extends('adminlte::page')

@section('title', 'Renders Gallery')

@section('content_header')
    <h1>All Renders</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h3 class="card-title">Uploaded Renders</h3>
    <a href="{{ route('renders.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Render
    </a>
  </div>

  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($renders->count() > 0)
      <div class="row">
        @foreach($renders as $render)
          <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
              <img src="{{ asset('storage/' . $render->image) }}" alt="Render Image" class="card-img-top" style="height:200px; object-fit:cover;">
              <div class="card-body text-center">
                <h5 class="card-title">{{ $render->title }}</h5>
                <a href="{{ route('renders.edit', $render->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <form action="{{ route('renders.destroy', $render->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-center text-muted">No renders uploaded yet.</p>
    @endif
  </div>
</div>
@stop
