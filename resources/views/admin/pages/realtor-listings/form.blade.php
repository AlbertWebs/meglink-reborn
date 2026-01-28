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
    <label for="title">Listing Title</label>
    <input type="text" 
           id="title" 
           name="title" 
           class="form-control" 
           value="{{ old('title', $listing->title ?? '') }}"
           required
           placeholder="Enter listing title">
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="admin-form-group">
            <label for="location">Location</label>
            <input type="text" 
                   id="location" 
                   name="location" 
                   class="form-control" 
                   value="{{ old('location', $listing->location ?? '') }}"
                   placeholder="e.g. Nairobi, Kilimani">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="admin-form-group">
            <label for="timeline">Timeline</label>
            <input type="text" 
                   id="timeline" 
                   name="timeline" 
                   class="form-control" 
                   value="{{ old('timeline', $listing->timeline ?? '') }}"
                   placeholder="e.g. 3 weeks">
        </div>
    </div>
</div>

<div class="admin-form-group">
    <label for="image_file">Listing Image</label>
    <input type="file" 
           id="image_file" 
           name="image_file" 
           class="form-control-file" 
           accept="image/*"
           onchange="previewImage(this, 'listing-image-preview')">
    @if(!empty($listing?->image))
        @php
            $imagePath = $listing->image;
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
            <img id="listing-image-preview" src="{{ $imageUrl }}" alt="Current image">
        </div>
    @else
        <div class="image-preview-container" style="display:none;">
            <p class="text-muted mb-2">Preview:</p>
            <img id="listing-image-preview" src="" alt="Preview">
        </div>
    @endif
</div>

<div class="admin-form-group">
    <label for="excerpt">Listing Overview (Excerpt)</label>
    <textarea id="excerpt" 
              name="excerpt" 
              rows="3" 
              class="form-control"
              placeholder="Brief overview of the listing...">{{ old('excerpt', $listing->excerpt ?? '') }}</textarea>
</div>

<div class="admin-form-group">
    <label for="body">Full Description</label>
    <textarea id="body" 
              name="body" 
              rows="10" 
              class="form-control rich-text"
              placeholder="Detailed listing description...">{{ old('body', $listing->body ?? '') }}</textarea>
</div>

<div class="admin-form-group">
    <label for="video_mp4_file">Video Tour (MP4)</label>
    <input type="file" 
           id="video_mp4_file" 
           name="video_mp4_file" 
           class="form-control-file" 
           accept="video/mp4"
           onchange="previewVideo(this, 'video-mp4-preview')">
    @if(!empty($listing?->video_mp4))
        @php
            $videoPath = $listing->video_mp4;
            if (\Illuminate\Support\Str::startsWith($videoPath, ['http://', 'https://'])) {
                $videoUrl = $videoPath;
            } elseif (\Illuminate\Support\Str::startsWith($videoPath, 'uploads/')) {
                $videoUrl = asset($videoPath);
            } else {
                $videoUrl = \Illuminate\Support\Facades\Storage::url($videoPath);
            }
        @endphp
        <div class="image-preview-container mt-2">
            <p class="text-muted mb-2">Current Video:</p>
            <video id="video-mp4-preview" controls style="max-width: 320px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12);">
                <source src="{{ $videoUrl }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @else
        <div class="image-preview-container mt-2" style="display:none;">
            <p class="text-muted mb-2">Preview:</p>
            <video id="video-mp4-preview" controls style="max-width: 320px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12);">
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @endif
</div>

<div class="admin-form-group">
    <label for="video_youtube">YouTube Link</label>
    <input type="url" 
           id="video_youtube" 
           name="video_youtube" 
           class="form-control" 
           value="{{ old('video_youtube', $listing->video_youtube ?? '') }}" 
           placeholder="https://www.youtube.com/watch?v=...">
    @if(!empty($listing?->video_youtube))
        @php
            $youtubeId = null;
            if (preg_match('~(youtu\\.be/|v=)([^&]+)~', $listing->video_youtube, $matches)) {
                $youtubeId = $matches[2];
            }
        @endphp
        @if($youtubeId)
            <div class="mt-2">
                <iframe
                    width="320"
                    height="180"
                    src="https://www.youtube.com/embed/{{ $youtubeId }}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12);"
                ></iframe>
            </div>
        @endif
    @endif
</div>

<div class="admin-form-group">
    <label for="closing_content">Closing Content</label>
    <textarea id="closing_content" 
              name="closing_content" 
              rows="10" 
              class="form-control rich-text"
              placeholder="Additional content displayed before 'Other Sample Listings'...">{{ old('closing_content', $listing->closing_content ?? '') }}</textarea>
    <small class="form-text text-muted">This content will appear as a full paragraph section just before the "Other Sample Listings" section on the listing detail page.</small>
</div>

<div class="d-flex justify-content-between align-items-center mt-4">
    <a href="{{ route('admin.pages.realtor-listings.index') }}" class="admin-btn-secondary">
        <i class="fas fa-arrow-left mr-2"></i>Cancel
    </a>
    <button type="submit" class="admin-btn-primary">
        <i class="fas fa-save mr-2"></i>{{ isset($listing) ? 'Update Listing' : 'Create Listing' }}
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
            if (!preview.src || (!preview.src.includes('storage') && !preview.src.includes('uploads'))) {
                container.style.display = 'none';
            }
        }
    }

    // Video preview function
    function previewVideo(input, previewId) {
        const preview = document.getElementById(previewId);
        const container = preview.parentElement;
        
        if (input.files && input.files[0]) {
            const url = URL.createObjectURL(input.files[0]);
            preview.querySelector('source').src = url;
            preview.load();
            container.style.display = 'block';
        } else {
            if (!preview.querySelector('source').src || (!preview.querySelector('source').src.includes('storage') && !preview.querySelector('source').src.includes('uploads'))) {
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
