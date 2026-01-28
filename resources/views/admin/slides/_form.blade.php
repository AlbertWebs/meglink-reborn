@php $isEdit = isset($slide); @endphp
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

<form action="{{ $isEdit ? route('admin.slides.update', $slide) : route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="admin-form-group">
        <label for="title">Slide Title</label>
        <input type="text" 
               id="title" 
               name="title" 
               class="form-control" 
               value="{{ old('title', $slide->title ?? '') }}"
               placeholder="Enter slide title">
    </div>

    <div class="admin-form-group">
        <label for="subtitle">Subtitle</label>
        <input type="text" 
               id="subtitle" 
               name="subtitle" 
               class="form-control" 
               value="{{ old('subtitle', $slide->subtitle ?? '') }}"
               placeholder="Enter slide subtitle">
    </div>

    <div class="admin-form-group">
        <label for="image">Slide Image</label>
        <input type="file" 
               id="image" 
               name="image" 
               class="form-control-file" 
               accept="image/*"
               {{ $isEdit ? '' : 'required' }}
               onchange="previewImage(this, 'slide-image-preview')">
        @if($isEdit && $slide->image)
            <div class="image-preview-container">
                <p class="text-muted mb-2">Current Image:</p>
                <img id="slide-image-preview" src="{{ asset('storage/' . $slide->image) }}" alt="Current image">
            </div>
        @else
            <div class="image-preview-container" style="display:none;">
                <p class="text-muted mb-2">Preview:</p>
                <img id="slide-image-preview" src="" alt="Preview">
            </div>
        @endif
    </div>

    <div class="admin-form-group">
        <div class="form-check">
            <input type="checkbox" 
                   name="is_active" 
                   class="form-check-input" 
                   id="is_active" 
                   {{ old('is_active', $slide->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                <strong>Active</strong> (Show this slide on the homepage)
            </label>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('admin.slides.index') }}" class="admin-btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="admin-btn-primary">
            <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update Slide' : 'Create Slide' }}
        </button>
    </div>
</form>

<script>
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
            if (!container.querySelector('img').src.includes('storage')) {
                container.style.display = 'none';
            }
        }
    }
</script>
