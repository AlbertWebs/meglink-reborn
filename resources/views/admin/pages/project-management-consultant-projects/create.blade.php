@extends('adminlte::page')

@section('title', 'New PMC Project')

@section('content_header')
    <h1>New PMC Project</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Project Details</h3>
    </div>
    <form action="{{ route('admin.pages.project-management-consultant-projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @include('admin.pages.project-management-consultant-projects.form', ['project' => null])
        </div>
        <div class="card-footer">
            <button class="btn btn-primary"><i class="fas fa-save mr-1"></i>Save</button>
        </div>
    </form>
</div>
@endsection

@section('js')
    <script>
        const imageInput = document.getElementById('image_file');
        const preview = document.getElementById('project-image-preview');
        if (imageInput && preview) {
            imageInput.addEventListener('change', () => {
                const file = imageInput.files && imageInput.files[0];
                if (!file) {
                    return;
                }
                const reader = new FileReader();
                reader.onload = (event) => {
                    preview.src = event.target.result;
                    preview.style.display = 'inline-block';
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
@endsection
