@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Settings</h1>
@stop



@section('content')
<div class="card card-primary">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h3 class="card-title mb-0">Website Settings</h3>
    <span class="text-muted small">Contact + social info used across the site.</span>
  </div>
  <form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <div class="row">
        <div class="col-12">
          <h5 class="text-muted">Contact</h5>
          <hr class="mt-1">
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="phone_number">Primary phone</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input
                type="tel"
                id="phone_number"
                name="phone_number"
                class="form-control"
                placeholder="+1 (555) 000-0000"
                value="{{ old('phone_number', $settings->phone_number ?? '') }}"
              >
            </div>
            <small class="form-text text-muted">Shown in the site header.</small>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="phone_number_secondary">Secondary phone</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input
                type="tel"
                id="phone_number_secondary"
                name="phone_number_secondary"
                class="form-control"
                placeholder="+1 (555) 000-0000"
                value="{{ old('phone_number_secondary', $settings->phone_number_secondary ?? '') }}"
              >
            </div>
            <small class="form-text text-muted">Optional backup number.</small>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                placeholder="hello@company.com"
                value="{{ old('email', $settings->email ?? '') }}"
              >
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="website">Website</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-globe"></i></span>
              </div>
              <input
                type="url"
                id="website"
                name="website"
                class="form-control"
                placeholder="https://example.com"
                value="{{ old('website', $settings->website ?? '') }}"
              >
            </div>
          </div>
        </div>
        <div class="col-12 mt-2">
          <h5 class="text-muted">Social links</h5>
          <hr class="mt-1">
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="facebook">Facebook</label>
            <input
              type="url"
              id="facebook"
              name="facebook"
              class="form-control"
              placeholder="https://facebook.com/yourpage"
              value="{{ old('facebook', $settings->facebook ?? '') }}"
            >
          </div>
          <div class="form-group">
            <label for="instagram">Instagram</label>
            <input
              type="url"
              id="instagram"
              name="instagram"
              class="form-control"
              placeholder="https://instagram.com/yourhandle"
              value="{{ old('instagram', $settings->instagram ?? '') }}"
            >
          </div>
          <div class="form-group">
            <label for="linkedin">LinkedIn</label>
            <input
              type="url"
              id="linkedin"
              name="linkedin"
              class="form-control"
              placeholder="https://linkedin.com/company/yourcompany"
              value="{{ old('linkedin', $settings->linkedin ?? '') }}"
            >
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="tiktok">TikTok</label>
            <input
              type="url"
              id="tiktok"
              name="tiktok"
              class="form-control"
              placeholder="https://tiktok.com/@yourhandle"
              value="{{ old('tiktok', $settings->tiktok ?? '') }}"
            >
          </div>
          <div class="form-group">
            <label for="twitter">Twitter</label>
            <input
              type="url"
              id="twitter"
              name="twitter"
              class="form-control"
              placeholder="https://twitter.com/yourhandle"
              value="{{ old('twitter', $settings->twitter ?? '') }}"
            >
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
      <button class="btn btn-primary">
        <i class="fas fa-save mr-1"></i>Save Settings
      </button>
    </div>
  </form>
</div>
@endsection
