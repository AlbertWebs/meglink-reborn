@extends('adminlte::page')

@section('title', 'Create Blog Post')

@section('content_header')
    <h1>Blog Post</h1>
@stop
@section('content')
<div class="card card-primary">
  <div class="card-header"><h3 class="card-title">Create Blog Post</h3></div>
  <div class="card-body">@include('admin.blogs._form')</div>
</div>
@endsection
