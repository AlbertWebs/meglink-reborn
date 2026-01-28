@extends('adminlte::page')

@section('title', 'Land Resources')

@section('content_header')
    <h1>Land Resources</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Land Resources Content</h3>
    </div>
    <form action="{{ route('admin.land-resources.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="title">Page Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $resource->title) }}">
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" id="seo_title" name="seo_title" class="form-control" value="{{ old('seo_title', $resource->seo_title) }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="seo_description">SEO Description</label>
                <textarea id="seo_description" name="seo_description" rows="2" class="form-control">{{ old('seo_description', $resource->seo_description) }}</textarea>
            </div>

            <hr>
            <h5 class="text-muted">Content Sections</h5>

            <div class="form-group">
                <label for="land_purchaser_notice">Land Purchaser Notice</label>
                <textarea id="land_purchaser_notice" name="land_purchaser_notice" rows="6" class="form-control rich-text">{{ old('land_purchaser_notice', $resource->land_purchaser_notice) }}</textarea>
                <small class="form-text text-muted">Explains prerequisites for land purchasers.</small>
            </div>

            <div class="form-group">
                <label for="land_seller">Land Seller Requirements</label>
                <textarea id="land_seller" name="land_seller" rows="6" class="form-control rich-text">{{ old('land_seller', $resource->land_seller) }}</textarea>
                <small class="form-text text-muted">What's required for land sellers.</small>
            </div>

            <div class="form-group">
                <label for="joint_ventures">Joint Ventures</label>
                <textarea id="joint_ventures" name="joint_ventures" rows="6" class="form-control rich-text">{{ old('joint_ventures', $resource->joint_ventures) }}</textarea>
                <small class="form-text text-muted">Information about joint venture opportunities.</small>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">
                <i class="fas fa-save mr-1"></i>Save Changes
            </button>
        </div>
    </form>
</div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        const editors = new Map();

        document.querySelectorAll('.rich-text').forEach((element) => {
            ClassicEditor.create(element, {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            }).then((editor) => {
                editors.set(element, editor);
            }).catch((error) => {
                console.error(error);
            });
        });

        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', () => {
                editors.forEach((editor, element) => {
                    element.value = editor.getData();
                });
            });
        }
    </script>
@endsection
