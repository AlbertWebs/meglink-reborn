@extends('adminlte::page')

@section('title', 'Services')

@section('content_header')
    <h1>Services</h1>
@stop
@section('content')
  <div class="card card-primary">
    <div class="card-header"><h3 class="card-title">Create Service</h3></div>
    <div class="card-body">
      @include('admin.services._form')
    </div>
  </div>
@endsection
