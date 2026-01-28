@extends('adminlte::page')

@section('title', 'New Realtor Listing')

@section('content_header')
    <h1>New Realtor Listing</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Listing Details</h3>
    </div>
    <form action="{{ route('admin.pages.realtor-listings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @include('admin.pages.realtor-listings.form', ['listing' => null])
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
        const preview = document.getElementById('listing-image-preview');
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
