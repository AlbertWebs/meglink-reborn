@php $isEdit = isset($testimonial); @endphp
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

<form action="{{ $isEdit ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="admin-form-group">
        <label for="name">Client Name</label>
        <input type="text" 
               id="name" 
               name="name" 
               class="form-control" 
               value="{{ old('name', $testimonial->name ?? '') }}" 
               required
               placeholder="Enter client name">
    </div>

    <div class="admin-form-group">
        <label for="position">Position/Title</label>
        <input type="text" 
               id="position" 
               name="position" 
               class="form-control" 
               value="{{ old('position', $testimonial->position ?? '') }}"
               placeholder="e.g. CEO, Homeowner, etc.">
    </div>

    <div class="admin-form-group">
        <label for="stars">Rating (Stars)</label>
        <select id="stars" name="stars" class="form-control" required>
            @for($i=1;$i<=5;$i++)
                <option value="{{ $i }}" {{ old('stars', $testimonial->stars ?? 5) == $i ? 'selected' : '' }}>
                    {{ $i }} {{ $i == 1 ? 'Star' : 'Stars' }}
                </option>
            @endfor
        </select>
    </div>

    <div class="admin-form-group">
        <label for="content">Testimonial Content</label>
        <textarea id="content" 
                  name="content" 
                  class="form-control" 
                  rows="6"
                  placeholder="What did the client say about your service?">{{ old('content', $testimonial->content ?? '') }}</textarea>
    </div>

    <div class="admin-form-group">
        <label for="image">Client Photo</label>
        <input type="file" 
               id="image" 
               name="image" 
               class="form-control-file" 
               accept="image/*"
               onchange="previewImage(this, 'testimonial-image-preview')">
        @if($isEdit && $testimonial->image)
            <div class="image-preview-container">
                <p class="text-muted mb-2">Current Image:</p>
                <img id="testimonial-image-preview" src="{{ asset('storage/'.$testimonial->image) }}" alt="Current image">
            </div>
        @else
            <div class="image-preview-container" style="display:none;">
                <p class="text-muted mb-2">Preview:</p>
                <img id="testimonial-image-preview" src="" alt="Preview">
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('admin.testimonials.index') }}" class="admin-btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="admin-btn-primary">
            <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update Testimonial' : 'Create Testimonial' }}
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
            container.style.display = 'none';
        }
    }
</script>
