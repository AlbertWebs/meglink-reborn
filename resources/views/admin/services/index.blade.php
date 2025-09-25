@extends('adminlte::page')

@section('title', 'Services')

@section('content_header')
    <h1>Services</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add Service</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead><tr><th>#</th><th>Title</th><th>Image</th><th>Created</th><th>Actions</th></tr></thead>
      <tbody>
      @foreach($services as $service)
        <tr>
          <td>{{ $service->id }}</td>
          <td>{{ $service->title }}</td>
          <td>
            @if($service->image)
              <img src="{{ asset('storage/'.$service->image) }}" style="height:60px" alt="">
            @endif
          </td>
          <td>{{ $service->created_at->toDateString() }}</td>
          <td>
            <a class="btn btn-sm btn-info" href="{{ route('admin.services.edit', $service) }}">Edit</a>
            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display:inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

    {{ $services->links() }}
  </div>
</div>
@endsection
