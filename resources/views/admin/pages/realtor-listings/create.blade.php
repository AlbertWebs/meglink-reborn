@extends('adminlte::page')

@section('title', 'Create Realtor Listing')

@section('content_header')
    <h1><i class="fas fa-plus-circle mr-2"></i>Create New Realtor Listing</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-home mr-2"></i>New Realtor Listing</h3>
    </div>
    <form action="{{ route('admin.pages.realtor-listings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @include('admin.pages.realtor-listings.form', ['listing' => null])
        </div>
    </form>
</div>
@endsection
