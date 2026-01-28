@php $isEdit = isset($service); @endphp
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

<form action="{{ $isEdit ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="admin-form-group">
        <label for="title">Service Title</label>
        <input type="text" 
               id="title" 
               name="title" 
               class="form-control" 
               value="{{ old('title', $service->title ?? '') }}" 
               required
               placeholder="Enter service title">
    </div>

    <div class="admin-form-group">
        <label for="content">Description</label>
        <textarea id="content" 
                  name="content" 
                  class="form-control rich-text" 
                  rows="10"
                  placeholder="Describe this service...">{{ old('content', $service->content ?? '') }}</textarea>
    </div>

    <div class="admin-form-group">
        <label for="image">Service Image</label>
        <input type="file" 
               id="image" 
               name="image" 
               class="form-control-file" 
               accept="image/*"
               onchange="previewImage(this, 'service-image-preview')">
        @if($isEdit && $service->image)
            <div class="image-preview-container">
                <p class="text-muted mb-2">Current Image:</p>
                <img id="service-image-preview" src="{{ asset('storage/'.$service->image) }}" alt="Current image">
            </div>
        @else
            <div class="image-preview-container" style="display:none;">
                <p class="text-muted mb-2">Preview:</p>
                <img id="service-image-preview" src="" alt="Preview">
            </div>
        @endif
    </div>

    <div class="admin-form-group">
        <label for="meta">Meta Information (JSON - Optional)</label>
        <textarea id="meta" 
                  name="meta" 
                  class="form-control" 
                  rows="4"
                  placeholder='{"description":"...","keywords":"..."}'>@if(old('meta')){{ old('meta') }}@elseif(isset($service) && $service->meta){{ json_encode($service->meta) }}@endif</textarea>
        <small class="form-text text-muted">Optional JSON for SEO metadata</small>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('admin.services.index') }}" class="admin-btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="admin-btn-primary">
            <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update Service' : 'Create Service' }}
        </button>
    </div>
</form>

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
            container.style.display = 'none';
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
