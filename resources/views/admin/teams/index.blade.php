@extends('adminlte::page')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Team Members</h2>
        <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">+ Add Member</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Socials</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>
                        @if($team->image)
                            <img src="{{ asset('storage/'.$team->image) }}" width="70">
                        @endif
                    </td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->designation }}</td>
                    <td>
                        <a href="{{ $team->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $team->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('admin.teams.edit', $team) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.teams.destroy', $team) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this member?')" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $teams->links() }}
</div>
@endsection
