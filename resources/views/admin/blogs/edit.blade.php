
@extends('adminlte::page')

@section('title', 'Create Edit Blog')

@section('content_header')
    <h1>Blog Post</h1>
@stop

{{-- @section('page_title','Edit Blog') --}}
@section('content')
<div class="card card-warning">
  <div class="card-header"><h3 class="card-title">Edit Blog Post</h3></div>
  <div class="card-body">@include('admin.blogs._form', ['blog' => $blog])</div>
</div>
@endsection
