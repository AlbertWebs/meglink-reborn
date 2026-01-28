@php $isEdit = isset($render); @endphp
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

<form action="{{ $isEdit ? route('renders.update', $render->id) : route('renders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="admin-form-group">
        <label for="title">Render Title</label>
        <input type="text" 
               id="title" 
               name="title" 
               class="form-control" 
               value="{{ old('title', $render->title ?? '') }}" 
               required
               placeholder="Enter render title">
    </div>

    <div class="admin-form-group">
        <label for="description">Description</label>
        <textarea id="description" 
                  name="description" 
                  class="form-control" 
                  rows="6"
                  required
                  placeholder="Describe this render...">{{ old('description', $render->description ?? '') }}</textarea>
    </div>

    <div class="admin-form-group">
        <label for="image">Render Image</label>
        <input type="file" 
               id="image" 
               name="image" 
               class="form-control-file" 
               accept="image/*"
               {{ $isEdit ? '' : 'required' }}
               onchange="previewImage(this, 'render-image-preview')">
        @if($isEdit && $render->image)
            <div class="image-preview-container">
                <p class="text-muted mb-2">Current Image:</p>
                <img id="render-image-preview" src="{{ asset('storage/' . $render->image) }}" alt="Current image">
            </div>
        @else
            <div class="image-preview-container" style="display:none;">
                <p class="text-muted mb-2">Preview:</p>
                <img id="render-image-preview" src="" alt="Preview">
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('renders.index') }}" class="admin-btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="admin-btn-primary">
            <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update Render' : 'Create Render' }}
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
