@extends('adminlte::page')

@section('title', 'Add Portfolio')

@section('content_header')
    <h1>Add New Portfolio</h1>
@stop
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Service</label>
                    <select name="service_id" class="form-control" required>
                        <option value="">-- Select Service --</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control" id="content" rows="5"></textarea>
                </div>

                {{--  --}}
                <script>
                    ClassicEditor
                        .create(document.querySelector('#content'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>

                {{--  --}}


                <div class="form-group">
                    <label>Meta</label>
                    <input type="text" name="meta" class="form-control">
                </div>

                <div class="form-group">
                    <label>Featured Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label>Additional Portfolio Images (Multiple)</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>

                <button type="submit" class="btn btn-success">Save Portfolio</button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@stop
