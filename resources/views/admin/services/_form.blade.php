@php
  $isEdit = isset($service);
@endphp

<form action="{{ $isEdit ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if($isEdit) @method('PUT') @endif

  <div class="form-group">
    <label>Title</label>
    <input name="title" value="{{ old('title', $service->title ?? '') }}" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Content</label>
    <textarea name="content" class="form-control" rows="6">{{ old('content', $service->content ?? '') }}</textarea>
  </div>

  <div class="form-group">
    <label>Main Image</label>
    <input type="file" name="image" class="form-control-file">
    @if($isEdit && $service->image)
      <div class="mt-2"><img src="{{ asset('storage/'.$service->image) }}" style="height:80px"></div>
    @endif
  </div>

  <div class="form-group">
    <label>Meta (JSON)</label>
    <textarea name="meta" class="form-control" rows="3">@if(old('meta')){{ old('meta') }}@elseif(isset($service) && $service->meta){{ json_encode($service->meta) }}@endif</textarea>
    <small class="form-text text-muted">Optional JSON for SEO (e.g. {"description":"...","keywords":"..."})</small>
  </div>

  <button class="btn btn-success">{{ $isEdit ? 'Update' : 'Create' }}</button>
</form>
