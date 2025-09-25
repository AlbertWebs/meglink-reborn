@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Settings</h1>
@stop



@section('content')
<div class="card card-primary">
  <div class="card-header"><h3 class="card-title">Website Settings</h3></div>
  <div class="card-body">
    <form action="{{ route('admin.settings.update') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $settings->phone_number ?? '') }}">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $settings->email ?? '') }}">
          </div>
          <div class="form-group">
            <label>Website</label>
            <input type="url" name="website" class="form-control" value="{{ old('website', $settings->website ?? '') }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group"><label>Facebook</label>
            <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $settings->facebook ?? '') }}">
          </div>
          <div class="form-group"><label>Instagram</label>
            <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $settings->instagram ?? '') }}">
          </div>
          <div class="form-group"><label>LinkedIn</label>
            <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $settings->linkedin ?? '') }}">
          </div>
          <div class="form-group"><label>TikTok</label>
            <input type="url" name="tiktok" class="form-control" value="{{ old('tiktok', $settings->tiktok ?? '') }}">
          </div>
          <div class="form-group"><label>Twitter</label>
            <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $settings->twitter ?? '') }}">
          </div>
        </div>
      </div>
      <button class="btn btn-success mt-3">Save Settings</button>
    </form>
  </div>
</div>
@endsection
