@extends('adminlte::page')

@section('title', 'Edit Realtor Listing')

@section('content_header')
    <h1><i class="fas fa-edit mr-2"></i>Edit Realtor Listing</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-home mr-2"></i>Edit Realtor Listing</h3>
    </div>
    <form action="{{ route('admin.pages.realtor-listings.update', $listing) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            @include('admin.pages.realtor-listings.form', ['listing' => $listing])
        </div>
    </form>
</div>
@endsection
