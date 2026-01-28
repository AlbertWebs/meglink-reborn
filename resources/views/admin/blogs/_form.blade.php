@php $isEdit = isset($blog); @endphp
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

<form action="{{ $isEdit ? route('admin.blog.update', $blog) : route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="admin-form-group">
        <label for="title">Blog Title</label>
        <input type="text" 
               id="title" 
               name="title" 
               class="form-control" 
               value="{{ old('title', $blog->title ?? '') }}" 
               required
               placeholder="Enter blog post title">
    </div>

    <div class="admin-form-group">
        <label for="content">Content</label>
        <textarea id="content" 
                  name="content" 
                  class="form-control rich-text" 
                  rows="10"
                  placeholder="Write your blog post content here...">{{ old('content', $blog->content ?? '') }}</textarea>
    </div>

    <div class="admin-form-group">
        <label for="image">Featured Image</label>
        <input type="file" 
               id="image" 
               name="image" 
               class="form-control-file" 
               accept="image/*"
               onchange="previewImage(this, 'image-preview')">
        @if($isEdit && $blog->image)
            <div class="image-preview-container">
                <p class="text-muted mb-2">Current Image:</p>
                <img id="image-preview" src="{{ asset('storage/'.$blog->image) }}" alt="Current image">
            </div>
        @else
            <div class="image-preview-container" style="display:none;">
                <p class="text-muted mb-2">Preview:</p>
                <img id="image-preview" src="" alt="Preview">
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('admin.blog.index') }}" class="admin-btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="admin-btn-primary">
            <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update Blog Post' : 'Create Blog Post' }}
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
