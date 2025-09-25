@php $isEdit = isset($blog); @endphp

<form action="{{ $isEdit ? route('admin.blog.update', $blog) : route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if($isEdit) @method('PUT') @endif

  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title ?? '') }}" required>
  </div>

  <div class="form-group">
    <label>Content</label>
    <textarea name="content" class="form-control" rows="6">{{ old('content', $blog->content ?? '') }}</textarea>
  </div>

  <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control-file">
    @if($isEdit && $blog->image)
      <img src="{{ asset('storage/'.$blog->image) }}" height="80" class="mt-2">
    @endif
  </div>

  <button class="btn btn-success">{{ $isEdit ? 'Update' : 'Create' }}</button>
</form>
