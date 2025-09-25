@extends('adminlte::page')

@section('title', 'Portfolios')

@section('content_header')
    <h1>Portfolios</h1>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">Add New Portfolio</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Service</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $portfolio->title }}</td>
                            <td>{{ $portfolio->service->title ?? 'N/A' }}</td>
                            <td>
                                @if($portfolio->image)
                                    <img src="{{ asset('storage/'.$portfolio->image) }}" width="60">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
