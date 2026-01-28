@extends('adminlte::page')

@section('title', 'Realtor Listings')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Realtor Listings</h1>
        <a href="{{ route('admin.pages.realtor-listings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i>New Listing
        </a>
    </div>
@stop

@section('content')
@php
    $resolveImage = function (?string $path) {
        if (!$path) {
            return null;
        }
        if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }
        if (\Illuminate\Support\Str::startsWith($path, 'uploads/')) {
            return asset($path);
        }
        return \Illuminate\Support\Facades\Storage::url($path);
    };
@endphp
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Timeline</th>
                    <th>Excerpt</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($listings as $listing)
                    <tr>
                        <td style="width: 90px;">
                            @if($listing->image)
                                <img
                                    src="{{ $resolveImage($listing->image) }}"
                                    alt="{{ $listing->title }}"
                                    style="width: 70px; height: 52px; object-fit: cover; border-radius: 8px; border: 1px solid rgba(16, 19, 24, 0.12);"
                                >
                            @else
                                <span class="text-muted small">No image</span>
                            @endif
                        </td>
                        <td>{{ $listing->title }}</td>
                        <td>{{ $listing->location }}</td>
                        <td>{{ $listing->timeline }}</td>
                        <td class="text-muted" style="max-width: 220px;">
                            {{ \Illuminate\Support\Str::limit($listing->excerpt, 80) }}
                        </td>
                        <td class="text-right">
                            <a href="{{ route('realtors.listing', $listing->slug) }}" class="btn btn-sm btn-outline-secondary" target="_blank">View</a>
                            <a href="{{ route('admin.pages.realtor-listings.edit', $listing) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.pages.realtor-listings.destroy', $listing) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this listing?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No listings yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
