@extends('adminlte::page')

@section('title', $pageTitle . ' Page')

@section('content_header')
    <h1>{{ $pageTitle }} Page</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h3 class="card-title mb-0">{{ $pageTitle }} Content</h3>
        <span class="text-muted small">Update the content shown on the public page.</span>
    </div>
    <form action="{{ route('admin.info-pages.update', $page->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="form-group">
                <label for="title">Navigation Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $page->title) }}"
                >
            </div>
            <div class="form-group">
                <label for="hero_title">Hero Title</label>
                <input
                    type="text"
                    id="hero_title"
                    name="hero_title"
                    class="form-control"
                    value="{{ old('hero_title', $page->hero_title) }}"
                >
            </div>
            <div class="form-group">
                <label for="hero_subtitle">Hero Subtitle</label>
                <textarea
                    id="hero_subtitle"
                    name="hero_subtitle"
                    rows="2"
                    class="form-control"
                >{{ old('hero_subtitle', $page->hero_subtitle) }}</textarea>
            </div>
            <div class="form-group">
                <label for="intro">Intro Paragraph</label>
                <textarea
                    id="intro"
                    name="intro"
                    rows="3"
                    class="form-control"
                >{{ old('intro', $page->intro) }}</textarea>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="section_one_title">Section One Title</label>
                        <input
                            type="text"
                            id="section_one_title"
                            name="section_one_title"
                            class="form-control"
                            value="{{ old('section_one_title', $page->section_one_title) }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="section_one_body">Section One Body</label>
                        <textarea
                            id="section_one_body"
                            name="section_one_body"
                            rows="4"
                            class="form-control"
                        >{{ old('section_one_body', $page->section_one_body) }}</textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="section_two_title">Section Two Title</label>
                        <input
                            type="text"
                            id="section_two_title"
                            name="section_two_title"
                            class="form-control"
                            value="{{ old('section_two_title', $page->section_two_title) }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="section_two_body">Section Two Body</label>
                        <textarea
                            id="section_two_body"
                            name="section_two_body"
                            rows="4"
                            class="form-control"
                        >{{ old('section_two_body', $page->section_two_body) }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="cta_title">CTA Title</label>
                <input
                    type="text"
                    id="cta_title"
                    name="cta_title"
                    class="form-control"
                    value="{{ old('cta_title', $page->cta_title) }}"
                >
            </div>
            <div class="form-group">
                <label for="cta_body">CTA Body</label>
                <textarea
                    id="cta_body"
                    name="cta_body"
                    rows="3"
                    class="form-control"
                >{{ old('cta_body', $page->cta_body) }}</textarea>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="cta_button_text">CTA Button Text</label>
                        <input
                            type="text"
                            id="cta_button_text"
                            name="cta_button_text"
                            class="form-control"
                            value="{{ old('cta_button_text', $page->cta_button_text) }}"
                        >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="cta_button_link">CTA Button Link</label>
                        <input
                            type="text"
                            id="cta_button_link"
                            name="cta_button_link"
                            class="form-control"
                            value="{{ old('cta_button_link', $page->cta_button_link) }}"
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-primary">
                <i class="fas fa-save mr-1"></i>Save Page
            </button>
        </div>
    </form>
</div>
@endsection
