@extends('adminlte::page')

@section('title', 'Edit Portfolio')

@section('content_header')
    <h1>Edit Portfolio - {{ $portfolio->title }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{ $portfolio->title }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Service</label>
                    <select name="service_id" class="form-control" required>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ $portfolio->service_id == $service->id ? 'selected' : '' }}>
                                {{ $service->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control" rows="5">{{ $portfolio->content }}</textarea>
                </div>

                <div class="form-group">
                    <label>Meta</label>
                    <input type="text" name="meta" value="{{ $portfolio->meta }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Featured Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($portfolio->image)
                        <img src="{{ asset('storage/'.$portfolio->image) }}" width="100" class="mt-2">
                    @endif
                </div>

                <div class="form-group">
                    <label>Additional Portfolio Images</label>
                    <input type="file" name="images[]" class="form-control" multiple>

                    <div class="mt-3 d-flex flex-wrap">
                        @foreach($portfolio->images as $img)
                            <div class="position-relative m-2">
                                <img src="{{ asset('storage/'.$img->image_link) }}" width="100" style="border:1px solid #ddd;">
                                <form action="{{ route('portfolio-images.destroy', $img->id) }}" method="POST" class="position-absolute top-0 end-0">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">x</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Update Portfolio</button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@stop
