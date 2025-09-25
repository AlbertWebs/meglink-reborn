@php $isEdit = isset($portfolio); @endphp

<form action="{{ $isEdit ? route('admin.portfolios.update', $portfolio) : route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if($isEdit) @method('PUT') @endif

  <div class="form-group">
    <label>Title</label>
    <input name="title" class="form-control" value="{{ old('title', $portfolio->title ?? '') }}" required>
  </div>

  <div class="form-group">
    <label>Service (optional)</label>
    <select name="service_id" class="form-control">
      <option value="">-- none --</option>
      @foreach($services as $s)
        <option value="{{ $s->id }}" {{ (old('service_id', $portfolio->service_id ?? '') == $s->id) ? 'selected' : '' }}>{{ $s->title }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label>Content</label>
    <textarea name="content" class="form-control" rows="5">{{ old('content', $portfolio->content ?? '') }}</textarea>
  </div>

  <div class="form-group">
    <label>Main Image</label>
    <input type="file" name="image" class="form-control-file">
    @if($isEdit && $portfolio->image)
      <div class="mt-2"><img src="{{ asset('storage/'.$portfolio->image) }}" style="height:80px" alt=""></div>
    @endif
  </div>

  <div class="form-group">
    <label>Gallery Images</label>
    <input type="file" name="images[]" class="form-control-file" multiple>
    @if($isEdit)
      <div class="row mt-2">
        @foreach($portfolio->images as $img)
          <div class="col-3 text-center">
            <img src="{{ asset('storage/'.$img->image_link) }}" style="height:80px; display:block; margin:auto">
            <form action="{{ route('admin.portfolio-images.destroy', $img) }}" method="POST" style="margin-top:6px;">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Remove</button>
            </form>
          </div>
        @endforeach
      </div>
    @endif
  </div>

  <button class="btn btn-success">{{ $isEdit ? 'Update' : 'Create' }}</button>
</form>
