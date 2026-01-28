<div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $project->title ?? '') }}">
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $project->location ?? '') }}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="timeline">Timeline</label>
            <input type="text" id="timeline" name="timeline" class="form-control" value="{{ old('timeline', $project->timeline ?? '') }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="image_file">Project Image</label>
    <input type="file" id="image_file" name="image_file" class="form-control-file">
    @if(!empty($project?->image))
        @php
            $imagePath = $project->image;
            if (\Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])) {
                $imageUrl = $imagePath;
            } elseif (\Illuminate\Support\Str::startsWith($imagePath, 'uploads/')) {
                $imageUrl = asset($imagePath);
            } else {
                $imageUrl = \Illuminate\Support\Facades\Storage::url($imagePath);
            }
        @endphp
        <small class="form-text text-muted">Current: {{ $project->image }}</small>
        <div class="mt-2">
            <img
                id="project-image-preview"
                src="{{ $imageUrl }}"
                alt="Project image preview"
                style="max-width: 220px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12);"
            >
        </div>
    @else
        <div class="mt-2">
            <img
                id="project-image-preview"
                src=""
                alt="Project image preview"
                style="max-width: 220px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12); display: none;"
            >
        </div>
    @endif
</div>
<div class="form-group">
    <label for="excerpt">Excerpt</label>
    <textarea id="excerpt" name="excerpt" rows="2" class="form-control">{{ old('excerpt', $project->excerpt ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="body">Full Description</label>
    <textarea id="body" name="body" rows="6" class="form-control">{{ old('body', $project->body ?? '') }}</textarea>
</div>
