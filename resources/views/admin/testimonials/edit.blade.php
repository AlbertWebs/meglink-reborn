@extends('admin.layouts.app')
@section('page_title','Edit Testimonial')
@section('content')
  <div class="card card-warning">
    <div class="card-header"><h3 class="card-title">Edit Testimonial</h3></div>
    <div class="card-body">
      @include('admin.testimonials._form', ['testimonial' => $testimonial])
    </div>
  </div>
@endsection
