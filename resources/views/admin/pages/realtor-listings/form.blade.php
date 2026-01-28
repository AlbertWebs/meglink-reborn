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
    <textarea id="body" name="body" rows="6" class="form-control rich-text">{{ old('body', $listing->body ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="video_mp4_file">Video Tour (MP4)</label>
    <input type="file" id="video_mp4_file" name="video_mp4_file" class="form-control-file" accept="video/mp4">
    @if(!empty($listing?->video_mp4))
        <small class="form-text text-muted">Current: {{ $listing->video_mp4 }}</small>
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
        <div class="mt-2">
            <video controls style="max-width: 320px; border-radius: 10px; border: 1px solid rgba(16, 19, 24, 0.12);">
                <source src="{{ $videoUrl }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="video_youtube">YouTube Link</label>
    <input type="url" id="video_youtube" name="video_youtube" class="form-control" value="{{ old('video_youtube', $listing->video_youtube ?? '') }}" placeholder="https://www.youtube.com/watch?v=...">
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
<div class="form-group">
    <label for="closing_content">Closing Content (Displayed before "Other Sample Listings")</label>
    <textarea id="closing_content" name="closing_content" rows="8" class="form-control rich-text">{{ old('closing_content', $listing->closing_content ?? '') }}</textarea>
    <small class="form-text text-muted">This content will appear as a full paragraph section just before the "Other Sample Listings" section on the listing detail page.</small>
</div>
