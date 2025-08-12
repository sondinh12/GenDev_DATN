@extends('Admin.layouts.master')

@section('content')
<div class="container-fluid px-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="fas fa-image text-primary me-2"></i>
                    THÊM BANNER MỚI
                </h4>
                <a href="{{ route('banner.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Quay lại
                </a>
            </div>
            <nav aria-label="breadcrumb" class="mt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('banner.index') }}">Banner</a></li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </nav>
        </div>
    </div>

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <h5 class="alert-heading mb-3">
            <i class="fas fa-exclamation-circle me-2"></i>
            Có lỗi xảy ra!
        </h5>
        <ul class="mb-0">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-semibold">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề banner" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-semibold">Loại banner <span class="text-danger">*</span></label>
                            <select name="type" id="type" class="form-select" onchange="handleTypeChange()" required>
                                <option value="static">Banner Thường</option>
                                <option value="dynamic">Banner Động</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Banner Tĩnh --}}
                <div class="form-group mb-4" id="static-image">
                    <label class="form-label fw-semibold">Ảnh banner</label>
                    <div class="file-upload-container">
                        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(this, 'static-preview')">
                        <div class="mt-2">
                            <img id="static-preview" src="#" alt="Preview" class="img-thumbnail d-none" style="max-height: 150px;">
                        </div>
                    </div>
                </div>

                {{-- Banner Động --}}
                <div class="form-group mb-4" id="dynamic-images" style="display: none;">
                    <label class="form-label fw-semibold">Ảnh động</label>
                    <div id="image-container" class="mb-3">
                        {{-- ảnh động sẽ được thêm ở đây --}}
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="addImageInput()">
                        <i class="fas fa-plus me-1"></i> Thêm ảnh
                    </button>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-1"></i> Lưu lại
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleTypeChange() {
        const type = document.getElementById('type').value;
        const staticDiv = document.getElementById('static-image');
        const dynamicDiv = document.getElementById('dynamic-images');
        const container = document.getElementById('image-container');

        if (type === 'dynamic') {
            staticDiv.style.display = 'none';
            dynamicDiv.style.display = 'block';

            // Nếu chưa có ảnh nào thì thêm ít nhất 1 input
            if (container.children.length === 0) {
                addImageInput();
            }
        } else {
            staticDiv.style.display = 'block';
            dynamicDiv.style.display = 'none';
            container.innerHTML = '';
        }
    }

    let imageCount = 0;
    function addImageInput() {
        imageCount++;
        const container = document.getElementById('image-container');
        const wrapper = document.createElement('div');
        wrapper.className = 'image-input-wrapper mb-3';
        wrapper.innerHTML = `
            <div class="d-flex align-items-center mb-2">
                <label class="form-label me-2 mb-0">Ảnh ${imageCount}:</label>
                <button type="button" class="btn btn-sm btn-outline-danger ms-auto" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <input type="file" name="images[]" accept="image/*" class="form-control" onchange="previewImage(this, 'dynamic-preview-${imageCount}')">
            <div class="mt-2">
                <img id="dynamic-preview-${imageCount}" src="#" alt="Preview" class="img-thumbnail d-none" style="max-height: 100px;">
            </div>
        `;
        container.appendChild(wrapper);
    }

    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }
            
            reader.readAsDataURL(file);
        }
    }

    // Gọi khi trang load lại (giữ loại nếu lỗi)
    document.addEventListener('DOMContentLoaded', handleTypeChange);
</script>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 8px;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .img-thumbnail {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        padding: 4px;
    }
    .image-input-wrapper {
        padding: 15px;
        border: 1px dashed #dee2e6;
        border-radius: 6px;
        background-color: #f8fafc;
    }
    .breadcrumb {
        background-color: transparent;
        padding: 0;
        margin-bottom: 0;
    }
    .breadcrumb-item.active {
        color: #6c757d;
    }
</style>
@endsection