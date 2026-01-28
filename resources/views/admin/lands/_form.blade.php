@php $isEdit = isset($land); @endphp
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

<form action="{{ $isEdit ? route('lands.update', $land) : route('lands.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="admin-form-group">
        <label for="title">Land Title</label>
        <input type="text" 
               id="title" 
               name="title" 
               class="form-control" 
               value="{{ old('title', $land->title ?? '') }}" 
               required
               placeholder="Enter land listing title">
    </div>

    <div class="admin-form-group">
        <label for="type">Listing Type</label>
        <select id="type" name="type" class="form-control" required>
            <option value="sale" {{ old('type', $land->type ?? '') == 'sale' ? 'selected' : '' }}>For Sale</option>
            <option value="joint_venture" {{ old('type', $land->type ?? '') == 'joint_venture' ? 'selected' : '' }}>Joint Venture</option>
        </select>
    </div>

    <div class="admin-form-group">
        <label for="description">Description</label>
        <textarea id="description" 
                  name="description" 
                  class="form-control rich-text" 
                  rows="8"
                  required
                  placeholder="Describe the land property...">{{ old('description', $land->description ?? '') }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="admin-form-group">
                <label for="location">Location</label>
                <input type="text" 
                       id="location" 
                       name="location" 
                       class="form-control" 
                       value="{{ old('location', $land->location ?? '') }}"
                       required
                       placeholder="e.g. Nairobi, Karen">
            </div>
        </div>
        <div class="col-md-6">
            <div class="admin-form-group">
                <label for="price">Price (KES)</label>
                <input type="number" 
                       id="price" 
                       name="price" 
                       class="form-control" 
                       value="{{ old('price', $land->price ?? '') }}"
                       required
                       placeholder="Enter price in KES"
                       min="0"
                       step="0.01">
            </div>
        </div>
    </div>

    <div class="admin-form-group">
        <label for="images">Property Images</label>
        <input type="file" 
               id="images" 
               name="images[]" 
               class="form-control-file" 
               multiple
               accept="image/*">
        <small class="form-text text-muted">You can select multiple images at once.</small>
        @if($isEdit && $land->images && is_array($land->images) && count($land->images) > 0)
            <div class="mt-3">
                <p class="text-muted mb-2">Existing Images:</p>
                <div class="row">
                    @foreach($land->images as $img)
                        <div class="col-md-3 mb-2">
                            <img src="{{ asset('storage/'.$img) }}" alt="Land image" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; border: 2px solid #e9ecef;">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('lands.index') }}" class="admin-btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="admin-btn-primary">
            <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update Land Listing' : 'Create Land Listing' }}
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
