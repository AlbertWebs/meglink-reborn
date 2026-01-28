@php $isEdit = isset($team); @endphp
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

<form action="{{ $isEdit ? route('admin.teams.update', $team) : route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="row">
        <div class="col-md-6">
            <div class="admin-form-group">
                <label for="name">Team Member Name</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       class="form-control" 
                       value="{{ old('name', $team->name ?? '') }}" 
                       required
                       placeholder="Enter team member name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="admin-form-group">
                <label for="designation">Designation/Title</label>
                <input type="text" 
                       id="designation" 
                       name="designation" 
                       class="form-control" 
                       value="{{ old('designation', $team->designation ?? '') }}"
                       required
                       placeholder="e.g. CEO, Designer, etc.">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="admin-form-group">
                <label for="instagram">Instagram URL</label>
                <input type="url" 
                       id="instagram" 
                       name="instagram" 
                       class="form-control" 
                       value="{{ old('instagram', $team->instagram ?? '') }}"
                       placeholder="https://instagram.com/username">
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-form-group">
                <label for="twitter">Twitter URL</label>
                <input type="url" 
                       id="twitter" 
                       name="twitter" 
                       class="form-control" 
                       value="{{ old('twitter', $team->twitter ?? '') }}"
                       placeholder="https://twitter.com/username">
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-form-group">
                <label for="linkedin">LinkedIn URL</label>
                <input type="url" 
                       id="linkedin" 
                       name="linkedin" 
                       class="form-control" 
                       value="{{ old('linkedin', $team->linkedin ?? '') }}"
                       placeholder="https://linkedin.com/in/username">
            </div>
        </div>
    </div>

    <div class="admin-form-group">
        <label for="image">Team Member Photo</label>
        <input type="file" 
               id="image" 
               name="image" 
               class="form-control-file" 
               accept="image/*"
               onchange="previewImage(this, 'team-image-preview')">
        @if($isEdit && $team->image)
            <div class="image-preview-container">
                <p class="text-muted mb-2">Current Image:</p>
                <img id="team-image-preview" src="{{ asset('storage/'.$team->image) }}" alt="Current image">
            </div>
        @else
            <div class="image-preview-container" style="display:none;">
                <p class="text-muted mb-2">Preview:</p>
                <img id="team-image-preview" src="" alt="Preview">
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('admin.teams.index') }}" class="admin-btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="admin-btn-primary">
            <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update Team Member' : 'Create Team Member' }}
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
