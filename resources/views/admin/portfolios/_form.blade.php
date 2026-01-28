@php $isEdit = isset($portfolio); @endphp
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

<form action="{{ $isEdit ? route('admin.portfolios.update', $portfolio) : route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="admin-form-group">
        <label for="title">Portfolio Title</label>
        <input type="text" 
               id="title" 
               name="title" 
               class="form-control" 
               value="{{ old('title', $portfolio->title ?? '') }}" 
               required
               placeholder="Enter portfolio title">
    </div>

    <div class="admin-form-group">
        <label for="service_id">Service (Optional)</label>
        <select id="service_id" name="service_id" class="form-control">
            <option value="">-- Select Service --</option>
            @foreach($services as $s)
                <option value="{{ $s->id }}" {{ (old('service_id', $portfolio->service_id ?? '') == $s->id) ? 'selected' : '' }}>
                    {{ $s->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="admin-form-group">
        <label for="content">Description</label>
        <textarea id="content" 
                  name="content" 
                  class="form-control rich-text" 
                  rows="8"
                  placeholder="Describe this portfolio project...">{{ old('content', $portfolio->content ?? '') }}</textarea>
    </div>

    <div class="admin-form-group">
        <label for="image">Main Image</label>
        <input type="file" 
               id="image" 
               name="image" 
               class="form-control-file" 
               accept="image/*"
               onchange="previewImage(this, 'main-image-preview')">
        @if($isEdit && $portfolio->image)
            <div class="image-preview-container">
                <p class="text-muted mb-2">Current Image:</p>
                <img id="main-image-preview" src="{{ asset('storage/'.$portfolio->image) }}" alt="Current image">
            </div>
        @else
            <div class="image-preview-container" style="display:none;">
                <p class="text-muted mb-2">Preview:</p>
                <img id="main-image-preview" src="" alt="Preview">
            </div>
        @endif
    </div>

    <div class="admin-form-group">
        <label for="gallery_images">Gallery Images (Multiple)</label>
        <input type="file" 
               id="gallery_images" 
               name="images[]" 
               class="form-control-file" 
               multiple
               accept="image/*">
        <small class="form-text text-muted">You can select multiple images at once.</small>
        @if($isEdit && $portfolio->images->count() > 0)
            <div class="row mt-3">
                @foreach($portfolio->images as $img)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('storage/'.$img->image_link) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Gallery image">
                            <div class="card-body p-2">
                                <form action="{{ route('admin.portfolio-images.destroy', $img) }}" method="POST" onsubmit="return confirm('Remove this image?');">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn-danger btn-sm w-100">
                                        <i class="fas fa-trash"></i> Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('admin.portfolio.index') }}" class="admin-btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="admin-btn-primary">
            <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update Portfolio' : 'Create Portfolio' }}
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
