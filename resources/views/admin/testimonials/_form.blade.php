@php $isEdit = isset($testimonial); @endphp

<form action="{{ $isEdit ? route('admin.testimonials.update',$testimonial) : route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if($isEdit) @method('PUT') @endif

  <div class="form-group">
    <label>Name</label>
    <input name="name" class="form-control" value="{{ old('name', $testimonial->name ?? '') }}" required>
  </div>

  <div class="form-group">
    <label>Position</label>
    <input name="position" class="form-control" value="{{ old('position', $testimonial->position ?? '') }}">
  </div>

  <div class="form-group">
    <label>Stars</label>
    <select name="stars" class="form-control" required>
      @for($i=1;$i<=5;$i++)
        <option value="{{ $i }}" {{ old('stars', $testimonial->stars ?? 5) == $i ? 'selected' : '' }}>{{ $i }}</option>
      @endfor
    </select>
  </div>

  <div class="form-group">
    <label>Content</label>
    <textarea name="content" class="form-control" rows="4">{{ old('content', $testimonial->content ?? '') }}</textarea>
  </div>

  <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control-file">
    @if($isEdit && $testimonial->image)
      <img src="{{ asset('storage/'.$testimonial->image) }}" height="80" class="mt-2">
    @endif
  </div>

  <button class="btn btn-success">{{ $isEdit ? 'Update' : 'Create' }}</button>
</form>
