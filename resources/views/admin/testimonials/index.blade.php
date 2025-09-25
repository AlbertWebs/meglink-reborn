@extends('admin.layouts.app')
@section('page_title','Testimonials')

@section('content')
<div class="card">
  <div class="card-header">
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Add Testimonial</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead><tr><th>#</th><th>Name</th><th>Stars</th><th>Image</th><th>Actions</th></tr></thead>
      <tbody>
        @foreach($testimonials as $t)
        <tr>
          <td>{{ $t->id }}</td>
          <td>{{ $t->name }}</td>
          <td>{{ $t->stars }} ⭐</td>
          <td>@if($t->image)<img src="{{ asset('storage/'.$t->image) }}" height="50">@endif</td>
          <td>
            <a href="{{ route('admin.testimonials.edit',$t) }}" class="btn btn-sm btn-info">Edit</a>
            <form action="{{ route('admin.testimonials.destroy',$t) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this testimonial?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $testimonials->links() }}
  </div>
</div>
@endsection
