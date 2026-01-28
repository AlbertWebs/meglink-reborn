@extends('adminlte::page')

@section('title', 'Project Management Consultants')

@section('content_header')
    <h1><i class="fas fa-clipboard-list mr-2"></i>Project Management Consultants</h1>
@stop

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">
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
<div class="card admin-form-card">
    <div class="card-header">
        <h3><i class="fas fa-clipboard-list mr-2"></i>Page Content</h3>
        <small class="text-white-50">Controls the public page content and SEO.</small>
    </div>
    <form action="{{ route('admin.pages.project-management-consultants.update') }}" method="POST" enctype="multipart/form-data">
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
            <h5 class="text-muted mb-4">Expertise - Professional Disciplines</h5>
            <div class="form-group">
                <label for="table_title">Section Title</label>
                <input type="text" id="table_title" name="table_title" class="form-control" value="{{ old('table_title', $page->table_title) }}">
            </div>
            <div class="form-group">
                <label for="table_intro">Section Intro Paragraph</label>
                <textarea id="table_intro" name="table_intro" rows="3" class="form-control rich-text">{{ old('table_intro', $page->table_intro) }}</textarea>
                <small class="form-text text-muted">This appears as the subtitle under "Professional Disciplines"</small>
            </div>
            <hr class="my-4">
            <h6 class="mb-3">Disciplines (Edit images and paragraphs below)</h6>
            @php
                $scopeRows = collect(explode("\n", (string) $page->table_rows))
                    ->map(function ($row) {
                        $parts = array_map('trim', explode('|', $row));
                        // Ensure we have at least 2 elements (title and description)
                        if (count($parts) < 2) {
                            $parts[] = '';
                        }
                        return $parts;
                    })
                    ->filter(function ($row) {
                        return !empty($row[0]);
                    })
                    ->values();
                $disciplineImages = collect(explode("\n", (string) $page->discipline_images))
                    ->map(function ($row) {
                        return trim($row);
                    })
                    ->filter()
                    ->values();
            @endphp
            <div id="disciplines-container">
                @forelse($scopeRows as $index => $row)
                    <div class="card mb-3 discipline-item" data-index="{{ $index }}">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Discipline {{ $index + 1 }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discipline Title</label>
                                        <input type="text" 
                                               name="discipline_titles[]" 
                                               class="form-control" 
                                               value="{{ old("discipline_titles.$index", $row[0] ?? '') }}"
                                               placeholder="e.g., Architects">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discipline Image</label>
                                        <input type="file" 
                                               name="discipline_image_files[]" 
                                               class="form-control-file discipline-image-input"
                                               accept="image/*"
                                               data-index="{{ $index }}">
                                        @if(isset($disciplineImages[$index]) && $disciplineImages[$index])
                                            <small class="form-text text-muted d-block mt-1">Current: {{ $disciplineImages[$index] }}</small>
                                            <div class="mt-2">
                                                <img src="{{ $resolveImage($disciplineImages[$index]) }}" 
                                                     alt="Discipline {{ $index + 1 }} preview"
                                                     class="discipline-preview"
                                                     data-index="{{ $index }}"
                                                     style="max-width: 200px; border-radius: 8px; border: 1px solid rgba(16, 19, 24, 0.12);">
                                            </div>
                                        @else
                                            <div class="mt-2">
                                                <img src="" 
                                                     alt="Discipline {{ $index + 1 }} preview"
                                                     class="discipline-preview"
                                                     data-index="{{ $index }}"
                                                     style="max-width: 200px; border-radius: 8px; border: 1px solid rgba(16, 19, 24, 0.12); display: none;">
                                            </div>
                                        @endif
                                        <input type="hidden" 
                                               name="discipline_image_paths[]" 
                                               value="{{ old("discipline_image_paths.$index", $disciplineImages[$index] ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Discipline Description (Paragraph)</label>
                                <textarea name="discipline_descriptions[]" 
                                          class="form-control" 
                                          rows="3"
                                          placeholder="Enter the description paragraph for this discipline...">{{ old("discipline_descriptions.$index", $row[1] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>No disciplines added yet. Click "Add Another Discipline" to get started.
                    </div>
                @endforelse
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-sm btn-secondary" id="add-discipline">
                    <i class="fas fa-plus mr-1"></i>Add Another Discipline
                </button>
                <button type="button" class="btn btn-sm btn-danger" id="remove-discipline">
                    <i class="fas fa-minus mr-1"></i>Remove Last Discipline
                </button>
            </div>
            <!-- Hidden fields to maintain backward compatibility -->
            <input type="hidden" id="table_rows" name="table_rows" value="{{ old('table_rows', $page->table_rows) }}">
            <input type="hidden" id="discipline_images" name="discipline_images" value="{{ old('discipline_images', $page->discipline_images) }}">
            <hr>
            <h5 class="text-muted">Engagement Highlights</h5>
            <div class="form-group">
                <label for="highlights_title">Highlights Title</label>
                <input type="text" id="highlights_title" name="highlights_title" class="form-control" value="{{ old('highlights_title', $page->highlights_title) }}">
            </div>
            <div class="form-group">
                <label for="highlights_items">Highlights Items</label>
                <textarea id="highlights_items" name="highlights_items" rows="4" class="form-control">{{ old('highlights_items', $page->highlights_items) }}</textarea>
                <small class="form-text text-muted">One highlight per line.</small>
            </div>
            <hr>
            <h5 class="text-muted">Delivery Metrics</h5>
            <div class="form-group">
                <label for="metrics_title">Metrics Title</label>
                <input type="text" id="metrics_title" name="metrics_title" class="form-control" value="{{ old('metrics_title', $page->metrics_title) }}">
            </div>
            <div class="form-group">
                <label for="metrics_items">Metrics Items</label>
                <textarea id="metrics_items" name="metrics_items" rows="4" class="form-control">{{ old('metrics_items', $page->metrics_items) }}</textarea>
                <small class="form-text text-muted">One metric per line. Format: Label|Value</small>
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
            <button type="submit" class="admin-btn-primary">
                <i class="fas fa-save mr-2"></i>Save Page
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

        // Handle discipline image previews
        document.querySelectorAll('.discipline-image-input').forEach((input) => {
            input.addEventListener('change', function() {
                const index = this.getAttribute('data-index');
                const preview = document.querySelector(`.discipline-preview[data-index="${index}"]`);
                const file = this.files && this.files[0];
                if (file && preview) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        preview.src = event.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        // Add new discipline
        let disciplineIndex = {{ max(0, $scopeRows->count()) }};
        document.getElementById('add-discipline')?.addEventListener('click', function() {
            const container = document.getElementById('disciplines-container');
            const newItem = document.createElement('div');
            newItem.className = 'card mb-3 discipline-item';
            newItem.setAttribute('data-index', disciplineIndex);
            newItem.innerHTML = `
                <div class="card-header bg-light">
                    <h6 class="mb-0">Discipline ${disciplineIndex + 1}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Discipline Title</label>
                                <input type="text" 
                                       name="discipline_titles[]" 
                                       class="form-control" 
                                       placeholder="e.g., Architects">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Discipline Image</label>
                                <input type="file" 
                                       name="discipline_image_files[]" 
                                       class="form-control-file discipline-image-input"
                                       accept="image/*"
                                       data-index="${disciplineIndex}">
                                <input type="hidden" name="discipline_image_paths[]" value="">
                                <div class="mt-2">
                                    <img src="" 
                                         alt="Discipline ${disciplineIndex + 1} preview"
                                         class="discipline-preview"
                                         data-index="${disciplineIndex}"
                                         style="max-width: 200px; border-radius: 8px; border: 1px solid rgba(16, 19, 24, 0.12); display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Discipline Description (Paragraph)</label>
                        <textarea name="discipline_descriptions[]" 
                                  class="form-control" 
                                  rows="3"
                                  placeholder="Enter the description paragraph for this discipline..."></textarea>
                    </div>
                </div>
            `;
            container.appendChild(newItem);
            
            // Bind preview for new input
            const newInput = newItem.querySelector('.discipline-image-input');
            newInput.addEventListener('change', function() {
                const index = this.getAttribute('data-index');
                const preview = document.querySelector(`.discipline-preview[data-index="${index}"]`);
                const file = this.files && this.files[0];
                if (file && preview) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        preview.src = event.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            disciplineIndex++;
        });

        // Remove last discipline
        document.getElementById('remove-discipline')?.addEventListener('click', function() {
            const container = document.getElementById('disciplines-container');
            const items = container.querySelectorAll('.discipline-item');
            if (items.length > 0) {
                items[items.length - 1].remove();
                disciplineIndex = Math.max(0, disciplineIndex - 1);
            }
        });

        // Update hidden fields before form submission
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function() {
                // Update editors
                editors.forEach((editor, element) => {
                    element.value = editor.getData();
                });
                
                // Build table_rows and discipline_images from form data
                const titles = Array.from(document.querySelectorAll('input[name="discipline_titles[]"]')).map(i => i.value.trim());
                const descriptions = Array.from(document.querySelectorAll('textarea[name="discipline_descriptions[]"]')).map(t => t.value.trim());
                const imagePaths = Array.from(document.querySelectorAll('input[name="discipline_image_paths[]"]')).map(i => i.value.trim());
                
                // Only update if we have at least one discipline with a title
                const validRows = titles.map((title, i) => {
                    if (title) {
                        return `${title}|${descriptions[i] || ''}`;
                    }
                    return null;
                }).filter(row => row !== null);
                
                if (validRows.length > 0) {
                    document.getElementById('table_rows').value = validRows.join('\n');
                    const validImages = imagePaths.filter((p, i) => p && titles[i]).join('\n');
                    document.getElementById('discipline_images').value = validImages;
                }
            });
        }
    </script>
@endsection
