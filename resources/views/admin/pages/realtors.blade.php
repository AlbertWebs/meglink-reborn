@extends('adminlte::page')

@section('title', 'Realtors')

@section('content_header')
    <h1>Realtors</h1>
@stop

@section('content')
@php
    $resolveImage = function (?string $path) {
        if (!$path) {
            return null;
        }
        if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }
        if (\Illuminate\Support\Str::startsWith($path, 'uploads/')) {
            return asset($path);
        }
        return \Illuminate\Support\Facades\Storage::url($path);
    };
@endphp
<div class="card card-primary">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h3 class="card-title mb-0">Page Content</h3>
        <span class="text-muted small">Controls the public page content and SEO.</span>
    </div>
    <form action="{{ route('admin.pages.realtors.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Navigation Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $page->title) }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" id="seo_title" name="seo_title" class="form-control" value="{{ old('seo_title', $page->seo_title) }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="seo_description">SEO Description</label>
                <textarea id="seo_description" name="seo_description" rows="2" class="form-control">{{ old('seo_description', $page->seo_description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="hero_title">Hero Title</label>
                <input type="text" id="hero_title" name="hero_title" class="form-control" value="{{ old('hero_title', $page->hero_title) }}">
            </div>
            <div class="form-group">
                <label for="hero_subtitle">Hero Subtitle</label>
                <textarea id="hero_subtitle" name="hero_subtitle" rows="3" class="form-control rich-text">{{ old('hero_subtitle', $page->hero_subtitle) }}</textarea>
            </div>
            <div class="form-group">
                <label for="intro">Intro Paragraph</label>
                <textarea id="intro" name="intro" rows="5" class="form-control rich-text">{{ old('intro', $page->intro) }}</textarea>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="image_one_file">Image One</label>
                        <input type="file" id="image_one_file" name="image_one_file" class="form-control-file">
                        @if($page->image_one)
                            <small class="form-text text-muted">Current: {{ $page->image_one }}</small>
                            <div class="mt-2">
                                <img
                                    src="{{ $resolveImage($page->image_one) }}"
                                    alt="Image One preview"
                                    style="max-width: 180px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12);"
                                    id="image-one-preview"
                                >
                            </div>
                        @else
                            <div class="mt-2">
                                <img
                                    src=""
                                    alt="Image One preview"
                                    style="max-width: 180px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12); display: none;"
                                    id="image-one-preview"
                                >
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="image_two_file">Image Two</label>
                        <input type="file" id="image_two_file" name="image_two_file" class="form-control-file">
                        @if($page->image_two)
                            <small class="form-text text-muted">Current: {{ $page->image_two }}</small>
                            <div class="mt-2">
                                <img
                                    src="{{ $resolveImage($page->image_two) }}"
                                    alt="Image Two preview"
                                    style="max-width: 180px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12);"
                                    id="image-two-preview"
                                >
                            </div>
                        @else
                            <div class="mt-2">
                                <img
                                    src=""
                                    alt="Image Two preview"
                                    style="max-width: 180px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12); display: none;"
                                    id="image-two-preview"
                                >
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="text-muted">Realtor Services Table</h5>
            <div class="form-group">
                <label for="table_title">Table Title</label>
                <input type="text" id="table_title" name="table_title" class="form-control" value="{{ old('table_title', $page->table_title) }}">
            </div>
            <div class="form-group">
                <label for="table_intro">Table Intro</label>
                <textarea id="table_intro" name="table_intro" rows="3" class="form-control rich-text">{{ old('table_intro', $page->table_intro) }}</textarea>
            </div>
            <div class="form-group">
                <label for="table_rows">Table Rows</label>
                <textarea id="table_rows" name="table_rows" rows="5" class="form-control">{{ old('table_rows', $page->table_rows) }}</textarea>
                <small class="form-text text-muted">One row per line. Format: Title|Description</small>
            </div>
            <hr>
            <h5 class="text-muted">Sample Projects</h5>
            <div class="form-group">
                <label for="sample_projects_title">Sample Projects Title</label>
                <input type="text" id="sample_projects_title" name="sample_projects_title" class="form-control" value="{{ old('sample_projects_title', $page->sample_projects_title) }}">
            </div>
            <div class="form-group">
                <label for="sample_projects_intro">Sample Projects Intro</label>
                <textarea id="sample_projects_intro" name="sample_projects_intro" rows="3" class="form-control rich-text">{{ old('sample_projects_intro', $page->sample_projects_intro) }}</textarea>
            </div>
            <div class="form-group">
                <label for="sample_listing_images">Sample Listing Images</label>
                <textarea id="sample_listing_images" name="sample_listing_images" rows="4" class="form-control">{{ old('sample_listing_images', $page->sample_listing_images) }}</textarea>
                <small class="form-text text-muted">One image path per line, aligned with the sample listings order.</small>
            </div>
            <div class="form-group">
                <label for="sample_projects">Sample Projects Rows</label>
                <textarea id="sample_projects" name="sample_projects" rows="5" class="form-control">{{ old('sample_projects', $page->sample_projects) }}</textarea>
                <small class="form-text text-muted">One row per line. Format: Project|Location|Timeline</small>
            </div>
            <hr>
            <h5 class="text-muted">Call To Action</h5>
            <div class="form-group">
                <label for="cta_title">CTA Title</label>
                <input type="text" id="cta_title" name="cta_title" class="form-control" value="{{ old('cta_title', $page->cta_title) }}">
            </div>
            <div class="form-group">
                <label for="cta_body">CTA Body</label>
                <textarea id="cta_body" name="cta_body" rows="3" class="form-control rich-text">{{ old('cta_body', $page->cta_body) }}</textarea>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="cta_button_text">CTA Button Text</label>
                        <input type="text" id="cta_button_text" name="cta_button_text" class="form-control" value="{{ old('cta_button_text', $page->cta_button_text) }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="cta_button_link">CTA Button Link</label>
                        <input type="text" id="cta_button_link" name="cta_button_link" class="form-control" value="{{ old('cta_button_link', $page->cta_button_link) }}">
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

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        const editors = new Map();

        document.querySelectorAll('.rich-text').forEach((element) => {
            ClassicEditor.create(element, {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            }).then((editor) => {
                editors.set(element, editor);
            }).catch((error) => {
                console.error(error);
            });
        });

        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', () => {
                editors.forEach((editor, element) => {
                    element.value = editor.getData();
                });
            });
        }

        const bindPreview = (inputId, previewId) => {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            if (!input || !preview) {
                return;
            }
            input.addEventListener('change', () => {
                const file = input.files && input.files[0];
                if (!file) {
                    return;
                }
                const reader = new FileReader();
                reader.onload = (event) => {
                    preview.src = event.target.result;
                    preview.style.display = 'inline-block';
                };
                reader.readAsDataURL(file);
            });
        };

        bindPreview('image_one_file', 'image-one-preview');
        bindPreview('image_two_file', 'image-two-preview');
    </script>
@endsection
