@php $isEdit = isset($render); @endphp
<link rel="stylesheet" href="{{ asset('css/admin-enhanced.css') }}">

@if($errors->any())
<div class="alert alert-danger alert-enhanced">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ $isEdit ? route('renders.update', $render->id) : route('renders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div class="admin-form-group">
        <label for="title">Render Title</label>
        <input type="text" 
               id="title" 
               name="title" 
               class="form-control" 
               value="{{ old('title', $render->title ?? '') }}" 
               required
               placeholder="Enter render title">
    </div>

    <div class="admin-form-group">
        <label for="description">Description</label>
        <textarea id="description" 
                  name="description" 
                  class="form-control" 
                  rows="6"
                  placeholder="Describe this render...">{{ old('description', $render->description ?? '') }}</textarea>
    </div>

    <div class="admin-form-group">
        <label>PRT Render Images (Multiple) <span class="text-danger">*</span></label>
        <div id="dropzone" class="dropzone-container">
            <div class="dropzone-area" id="dropzoneArea">
                <i class="fas fa-cloud-upload-alt dropzone-icon"></i>
                <p class="dropzone-text">Drag and drop images here or click to browse</p>
                <p class="dropzone-hint">You can upload multiple images at once</p>
                <input type="file" 
                       id="images" 
                       name="images[]" 
                       class="dropzone-input" 
                       accept="image/*"
                       multiple
                       {{ $isEdit ? '' : 'required' }}>
            </div>
            <div id="imagePreview" class="dropzone-preview"></div>
        </div>
        @if($isEdit && isset($render) && $render->images->count() > 0)
            <div class="existing-images mt-3">
                <p class="text-muted mb-2"><strong>Existing Images:</strong></p>
                <div class="row">
                    @foreach($render->images as $img)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="{{ asset('storage/'.$img->image_link) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Render image">
                                <div class="card-body p-2">
                                    <button type="button" 
                                            class="admin-btn-danger btn-sm w-100" 
                                            onclick="deleteImage({{ $img->id }}, '{{ route('render-images.destroy', $img) }}')">
                                        <i class="fas fa-trash"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('renders.index') }}" class="admin-btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Cancel
        </a>
        <button type="submit" class="admin-btn-primary">
            <i class="fas fa-save mr-2"></i>{{ $isEdit ? 'Update Render' : 'Create Render' }}
        </button>
    </div>
</form>

@if($isEdit && isset($render) && $render->images->count() > 0)
    @foreach($render->images as $img)
        <form id="delete-image-form-{{ $img->id }}" action="{{ route('render-images.destroy', $img) }}" method="POST" style="display: none;">
            @csrf 
            @method('DELETE')
        </form>
    @endforeach
@endif

<style>
    .dropzone-container {
        margin-top: 10px;
    }

    .dropzone-area {
        border: 2px dashed #cbd5e0;
        border-radius: 12px;
        padding: 40px 20px;
        text-align: center;
        background: #f8f9fa;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }

    .dropzone-area:hover {
        border-color: #4299e1;
        background: #ebf8ff;
    }

    .dropzone-area.dragover {
        border-color: #4299e1;
        background: #bee3f8;
        transform: scale(1.02);
    }

    .dropzone-icon {
        font-size: 48px;
        color: #a0aec0;
        margin-bottom: 15px;
    }

    .dropzone-text {
        font-size: 16px;
        color: #4a5568;
        margin: 10px 0;
        font-weight: 500;
    }

    .dropzone-hint {
        font-size: 14px;
        color: #718096;
        margin: 5px 0 0 0;
    }

    .dropzone-input {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        cursor: pointer;
    }

    .dropzone-preview {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }

    .preview-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        background: white;
    }

    .preview-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        display: block;
    }

    .preview-item .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(220, 38, 38, 0.9);
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        transition: all 0.2s;
    }

    .preview-item .remove-btn:hover {
        background: rgba(220, 38, 38, 1);
        transform: scale(1.1);
    }

    .preview-item .file-name {
        padding: 8px;
        font-size: 12px;
        color: #4a5568;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropzoneArea = document.getElementById('dropzoneArea');
        const dropzoneInput = document.querySelector('.dropzone-input');
        const imagePreview = document.getElementById('imagePreview');
        let selectedFiles = [];

        // Click to browse
        dropzoneArea.addEventListener('click', () => {
            dropzoneInput.click();
        });

        // Drag and drop events
        dropzoneArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzoneArea.classList.add('dragover');
        });

        dropzoneArea.addEventListener('dragleave', () => {
            dropzoneArea.classList.remove('dragover');
        });

        dropzoneArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzoneArea.classList.remove('dragover');
            const files = Array.from(e.dataTransfer.files).filter(file => file.type.startsWith('image/'));
            handleFiles(files);
        });

        // File input change
        dropzoneInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            handleFiles(files);
        });

        function handleFiles(files) {
            files.forEach(file => {
                if (!file.type.startsWith('image/')) {
                    alert(`${file.name} is not an image file.`);
                    return;
                }

                // Check if file already exists
                if (selectedFiles.some(f => f.name === file.name && f.size === file.size)) {
                    return;
                }

                selectedFiles.push(file);
                previewImage(file);
            });

            // Update the file input
            updateFileInput();
        }

        function previewImage(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const previewItem = document.createElement('div');
                previewItem.className = 'preview-item';
                previewItem.dataset.fileName = file.name;

                previewItem.innerHTML = `
                    <img src="${e.target.result}" alt="${file.name}">
                    <button type="button" class="remove-btn" onclick="removeImage('${file.name}', ${file.size})">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="file-name">${file.name}</div>
                `;

                imagePreview.appendChild(previewItem);
            };
            reader.readAsDataURL(file);
        }

        function removeImage(fileName, fileSize) {
            selectedFiles = selectedFiles.filter(f => !(f.name === fileName && f.size === fileSize));
            
            const previewItems = imagePreview.querySelectorAll('.preview-item');
            previewItems.forEach(item => {
                if (item.dataset.fileName === fileName) {
                    item.remove();
                }
            });

            updateFileInput();
        }

        function updateFileInput() {
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => {
                dataTransfer.items.add(file);
            });
            dropzoneInput.files = dataTransfer.files;
        }

        // Make removeImage available globally
        window.removeImage = removeImage;
    });

    // Delete image function
    function deleteImage(imageId, deleteUrl) {
        if (confirm('Are you sure you want to remove this image? This action cannot be undone.')) {
            const form = document.getElementById('delete-image-form-' + imageId);
            if (form) {
                form.submit();
            }
        }
    }
</script>
