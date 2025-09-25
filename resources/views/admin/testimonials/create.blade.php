@extends('admin.layouts.app')
@section('page_title','Add Testimonial')
@section('content')
<div class="card card-primary">
  <div class="card-header"><h3 class="card-title">Add Testimonial</h3></div>
  <div class="card-body">@include('admin.testimonials._form')</div>
</div>
@endsection
