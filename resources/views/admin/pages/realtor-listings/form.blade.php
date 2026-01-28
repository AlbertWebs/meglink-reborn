<div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $listing->title ?? '') }}">
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $listing->location ?? '') }}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="timeline">Timeline</label>
            <input type="text" id="timeline" name="timeline" class="form-control" value="{{ old('timeline', $listing->timeline ?? '') }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="image_file">Listing Image</label>
    <input type="file" id="image_file" name="image_file" class="form-control-file">
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
        <small class="form-text text-muted">Current: {{ $listing->image }}</small>
        <div class="mt-2">
            <img
                id="listing-image-preview"
                src="{{ $imageUrl }}"
                alt="Listing image preview"
                style="max-width: 220px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12);"
            >
        </div>
    @else
        <div class="mt-2">
            <img
                id="listing-image-preview"
                src=""
                alt="Listing image preview"
                style="max-width: 220px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12); display: none;"
            >
        </div>
    @endif
</div>
<div class="form-group">
    <label for="excerpt">Excerpt</label>
    <textarea id="excerpt" name="excerpt" rows="2" class="form-control">{{ old('excerpt', $listing->excerpt ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="body">Full Description</label>
    <textarea id="body" name="body" rows="6" class="form-control">{{ old('body', $listing->body ?? '') }}</textarea>
</div>
