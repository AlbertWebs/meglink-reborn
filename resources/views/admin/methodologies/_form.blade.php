@php $isEdit = isset($methodology); @endphp
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

<form action="{{ $isEdit ? route('admin.methodologies.update', $methodology) : route('admin.methodologies.store') }}" method="POST">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="admin-form-group">
        <label for="step_number">Step Number <span class="text-danger">*</span></label>
        <input type="number" 
               id="step_number" 
               name="step_number" 
               class="form-control" 
               value="{{ old('step_number', $methodology->step_number ?? '') }}" 
               required
               min="1"
               placeholder="e.g., 01, 02, 03">
        <small class="form-text text-muted">The step number displayed on the card (e.g., 01, 02, 03)</small>
    </div>

    <div class="admin-form-group">
        <label for="title">Title <span class="text-danger">*</span></label>
        <input type="text" 
               id="title" 
               name="title" 
               class="form-control" 
               value="{{ old('title', $methodology->title ?? '') }}" 
               required
               placeholder="e.g., Concept Mood Board">
    </div>

    <div class="admin-form-group">
        <label for="description">Description <span class="text-danger">*</span></label>
        <textarea id="description" 
                  name="description" 
                  class="form-control" 
                  rows="5"
                  required
                  placeholder="Enter the description for this methodology step...">{{ old('description', $methodology->description ?? '') }}</textarea>
    </div>

    <div class="admin-form-group">
        <label for="icon">Icon Class <span class="text-danger">*</span></label>
        <input type="text" 
               id="icon" 
               name="icon" 
               class="form-control" 
               value="{{ old('icon', $methodology->icon ?? '') }}" 
               required
               placeholder="e.g., fas fa-palette">
        <small class="form-text text-muted">Font Awesome icon class (e.g., fas fa-palette, fas fa-ruler-combined)</small>
        <div class="mt-2">
            <strong>Icon Preview:</strong>
            <div class="icon-preview mt-2" style="font-size: 24px;">
                <i id="icon-preview" class="{{ old('icon', $methodology->icon ?? '') }}"></i>
            </div>
        </div>
    </div>

    <div class="admin-form-group">
        <label for="features">Features (Comma-separated)</label>
        <input type="text" 
               id="features" 
               name="features" 
               class="form-control" 
               value="{{ old('features', $methodology && $methodology->features ? implode(', ', $methodology->features) : '') }}" 
               placeholder="e.g., Visual Inspiration, Style Direction, Reference Images">
        <small class="form-text text-muted">Enter features separated by commas. These will appear as tags on the card.</small>
    </div>

    <div class="admin-form-group">
        <label for="order">Display Order</label>
        <input type="number" 
               id="order" 
               name="order" 
               class="form-control" 
               value="{{ old('order', $methodology->order ?? 0) }}" 
               min="0"
               placeholder="0">
        <small class="form-text text-muted">Lower numbers appear first. Default is 0.</small>
    </div>

    <div class="admin-form-group">
        <div class="form-check">
            <input type="checkbox" 
                   id="is_active" 
                   name="is_active" 
                   class="form-check-input" 
                   value="1"
                   {{ old('is_active', $methodology->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                Active (Show on website)
            </label>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('admin.methodologies.index') }}" class="admin-btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="admin-btn-primary">
            <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update Methodology Step' : 'Create Methodology Step' }}
        </button>
    </div>
</form>

<script>
    // Icon preview update
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('icon-preview');
    
    if (iconInput && iconPreview) {
        iconInput.addEventListener('input', function() {
            iconPreview.className = this.value || 'fas fa-question';
        });
    }
</script>
