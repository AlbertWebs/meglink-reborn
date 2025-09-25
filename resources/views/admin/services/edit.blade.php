@extends('adminlte::page')

@section('title', 'Edit Services')

@section('content_header')
    <h1>Edit Services</h1>
@stop
@section('content')
  <div class="card card-warning">
    <div class="card-header"><h3 class="card-title">Edit Service</h3></div>
    <div class="card-body">
      @include('admin.services._form', ['service' => $service])
    </div>
  </div>
@endsection
