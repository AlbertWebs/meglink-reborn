<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">

@if($errors->any())
<div class="alert alert-danger alert-enhanced">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="admin-form-group">
    <label for="title">Project Title</label>
    <input type="text" 
           id="title" 
           name="title" 
           class="form-control" 
           value="{{ old('title', $project->title ?? '') }}"
           required
           placeholder="Enter project title">
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="admin-form-group">
            <label for="location">Location</label>
            <input type="text" 
                   id="location" 
                   name="location" 
                   class="form-control" 
                   value="{{ old('location', $project->location ?? '') }}"
                   placeholder="e.g. Nairobi, Karen">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="admin-form-group">
            <label for="timeline">Timeline</label>
            <input type="text" 
                   id="timeline" 
                   name="timeline" 
                   class="form-control" 
                   value="{{ old('timeline', $project->timeline ?? '') }}"
                   placeholder="e.g. 6 months">
        </div>
    </div>
</div>

<div class="admin-form-group">
    <label for="image_file">Project Image</label>
    <input type="file" 
           id="image_file" 
           name="image_file" 
           class="form-control-file" 
           accept="image/*"
           onchange="previewImage(this, 'project-image-preview')">
    @if(!empty($project?->image))
        @php
            $imagePath = $project->image;
            if (\Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])) {
                $imageUrl = $imagePath;
            } elseif (\Illuminate\Support\Str::startsWith($imagePath, 'uploads/')) {
                $imageUrl = asset($imagePath);
            } else {
                $imageUrl = \Illuminate\Support\Facades\Storage::url($imagePath);
            }
        @endphp
        <div class="image-preview-container">
            <p class="text-muted mb-2">Current Image:</p>
            <img id="project-image-preview" src="{{ $imageUrl }}" alt="Current image">
        </div>
    @else
        <div class="image-preview-container" style="display:none;">
            <p class="text-muted mb-2">Preview:</p>
            <img id="project-image-preview" src="" alt="Preview">
        </div>
    @endif
</div>

<div class="admin-form-group">
    <label for="excerpt">Excerpt</label>
    <textarea id="excerpt" 
              name="excerpt" 
              rows="3" 
              class="form-control"
              placeholder="Brief summary of the project...">{{ old('excerpt', $project->excerpt ?? '') }}</textarea>
</div>

<div class="admin-form-group">
    <label for="body">Full Description</label>
    <textarea id="body" 
              name="body" 
              rows="10" 
              class="form-control rich-text"
              placeholder="Detailed project description...">{{ old('body', $project->body ?? '') }}</textarea>
</div>

<div class="d-flex justify-content-between align-items-center mt-4">
    <a href="{{ route('admin.pages.project-management-consultant-projects.index') }}" class="admin-btn-secondary">
        <i class="fas fa-arrow-left mr-2"></i>Cancel
    </a>
    <button type="submit" class="admin-btn-primary">
        <i class="fas fa-save mr-2"></i>{{ isset($project) ? 'Update Project' : 'Create Project' }}
    </button>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // Initialize CKEditor
    document.querySelectorAll('.rich-text').forEach((element) => {
        ClassicEditor.create(element, {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
        }).catch((error) => {
            console.error(error);
        });
    });

    // Image preview function
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const container = preview.parentElement;
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            if (!preview.src || !preview.src.includes('storage') && !preview.src.includes('uploads')) {
                container.style.display = 'none';
            }
        }
    }

    // Sync CKEditor content before form submit
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function() {
            document.querySelectorAll('.rich-text').forEach((element) => {
                if (element.ckeditorInstance) {
                    element.value = element.ckeditorInstance.getData();
                }
            });
        });
    }
</script>
