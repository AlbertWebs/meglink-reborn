@extends('adminlte::page')

@section('title', 'Website Settings')

@section('content_header')
    <h1><i class="fas fa-cog mr-2"></i>Website Settings</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-tools mr-2"></i>Website Settings</h3>
        <small class="text-white-50">Contact information and social links used across the site.</small>
    </div>
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-enhanced">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-enhanced">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-12 mb-4">
                    <h5 class="text-muted" style="font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 14px;">Contact Information</h5>
                    <hr style="border-color: #e9ecef;">
                </div>
                <div class="col-lg-6">
                    <div class="admin-form-group">
                        <label for="phone_number">Primary Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input
                                type="tel"
                                id="phone_number"
                                name="phone_number"
                                class="form-control"
                                placeholder="+254 700 000 000"
                                value="{{ old('phone_number', $settings->phone_number ?? '') }}"
                            >
                        </div>
                        <small class="form-text text-muted">Shown in the site header.</small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="admin-form-group">
                        <label for="phone_number_secondary">Secondary Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input
                                type="tel"
                                id="phone_number_secondary"
                                name="phone_number_secondary"
                                class="form-control"
                                placeholder="+254 700 000 000"
                                value="{{ old('phone_number_secondary', $settings->phone_number_secondary ?? '') }}"
                            >
                        </div>
                        <small class="form-text text-muted">Optional backup number.</small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="admin-form-group">
                        <label for="email">Email Address</label>
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
                    <div class="admin-form-group">
                        <label for="website">Website URL</label>
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
                <div class="col-12 mt-4 mb-4">
                    <h5 class="text-muted" style="font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 14px;">Social Media Links</h5>
                    <hr style="border-color: #e9ecef;">
                </div>
                <div class="col-lg-6">
                    <div class="admin-form-group">
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
                    <div class="admin-form-group">
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
                    <div class="admin-form-group">
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
                    <div class="admin-form-group">
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
                    <div class="admin-form-group">
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
            <button type="submit" class="admin-btn-primary">
                <i class="fas fa-save mr-2"></i>Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
