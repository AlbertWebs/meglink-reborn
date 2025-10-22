@extends('adminlte::page')

@section('title', 'Lands for Sale')

@section('content_header')
    <h1>Manage Lands for Sale</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
    <a href="{{ route('lands.create') }}" class="btn btn-primary">
      <i class="fas fa-plus"></i> Add Land
    </a>
  </div>

  <div class="card-body table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Location</th>
          <th>Price (KES)</th>
          <th>Images</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($lands as $land)
        <tr>
          <td>{{ $land->id }}</td>
          <td>{{ $land->title }}</td>
          <td>{{ $land->location }}</td>
          <td>{{ number_format($land->price, 2) }}</td>
          <td>
            @if(!empty($land->images))
              <div class="d-flex flex-wrap gap-1">
                @foreach($land->images as $img)
                  <img src="{{ asset('storage/'.$img) }}" alt="land image" height="50" class="rounded border">
                @endforeach
              </div>
            @endif
          </td>
          <td>{{ $land->created_at->format('Y-m-d') }}</td>
          <td>
            <a href="{{ route('lands.edit', $land) }}" class="btn btn-sm btn-info">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('lands.destroy', $land) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this listing?')">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="text-center text-muted">No land listings found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@stop
