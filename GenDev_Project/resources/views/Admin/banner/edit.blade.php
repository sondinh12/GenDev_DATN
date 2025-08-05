@extends('Admin.layouts.master-without-page-title')

@section('content')
<div class="container-fluid px-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0">
                <i class="fas fa-edit text-primary me-2"></i>
                CHỈNH SỬA BANNER
            </h4>
            <nav aria-label="breadcrumb" class="mt-2">
                <ol class="breadcrumb mb-0">

                </ol>
            </nav>
        </div>
        <a href="{{ route('banner.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Quay lại
        </a>
    </div>

    <!-- Error Messages -->
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-4">
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

    <!-- Edit Form -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-semibold">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" 
                                   value="{{ old('title', $banner->title) }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-semibold">Loại banner <span class="text-danger">*</span></label>
                            <select name="type" id="type" class="form-select" onchange="handleTypeChange()" required>
                                <option value="static" {{ $banner->type=='static'?'selected':'' }}>Banner Thường</option>
                                <option value="dynamic" {{ $banner->type=='dynamic'?'selected':'' }}>Banner Động</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Static Banner -->
                <div id="static-image" class="form-group mb-4">
                    <label class="form-label fw-semibold">Ảnh hiện tại</label>
                    <div class="mb-3">
                        @if($banner->image)
                            <img src="{{ asset('storage/'.$banner->image) }}" 
                                 class="img-thumbnail" style="width:200px; height:120px; object-fit:cover;">
                        @else
                            <span class="text-muted">Chưa có ảnh</span>
                        @endif
                    </div>
                    
                    <label class="form-label fw-semibold">Thay ảnh mới</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <!-- Dynamic Banner -->
                <div id="dynamic-images" class="form-group mb-4" style="display:none;">
                    <label class="form-label fw-semibold">Ảnh động hiện tại</label>
                    <div id="existing-images" class="mb-4">
                        @php $imgs = json_decode($banner->images) ?: []; @endphp
                        @forelse($imgs as $i => $img)
                            <div class="mb-3 p-3 border rounded d-flex align-items-start bg-light">
                                <img src="{{ asset('storage/'.$img) }}" 
                                     class="img-thumbnail me-3" style="width:150px; height:90px; object-fit:cover;">
                                <div class="flex-grow-1">
                                    <label class="form-label">Thay ảnh {{ $i+1 }}</label>
                                    <input type="file" name="replace_images[{{ $i }}]" 
                                           class="form-control mb-2" accept="image/*">
                                    <div class="form-check">
                                        <input type="checkbox" name="delete_images[]" value="{{ $i }}" 
                                               id="delete_{{ $i }}" class="form-check-input">
                                        <label for="delete_{{ $i }}" class="form-check-label text-danger">
                                            <i class="fas fa-trash-alt me-1"></i> Xóa ảnh này
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <span class="text-muted">Chưa có ảnh động</span>
                        @endforelse
                    </div>

                    <label class="form-label fw-semibold">Thêm ảnh động mới</label>
                    <div id="new-image-container" class="mb-3"></div>
                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addImageInput()">
                        <i class="fas fa-plus me-1"></i> Thêm ảnh
                    </button>
                    <small class="d-block text-muted mt-2">Nếu upload, sẽ thay thế ảnh động cũ theo logic controller.</small>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-1"></i> Lưu thay đổi
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
        document.getElementById('static-image').style.display = type === 'static' ? 'block' : 'none';
        document.getElementById('dynamic-images').style.display = type === 'dynamic' ? 'block' : 'none';

        if (type === 'dynamic' && document.getElementById('new-image-container').children.length === 0) {
            addImageInput();
        }
    }

    let newImageCount = 0;
    function addImageInput() {
        newImageCount++;
        const container = document.getElementById('new-image-container');
        const wrapper = document.createElement('div');
        wrapper.className = 'mb-3';
        wrapper.innerHTML = `
            <label class="form-label">Ảnh mới ${newImageCount}:</label>
            <input type="file" name="new_images[]" class="form-control" accept="image/*">
        `;
        container.appendChild(wrapper);
    }

    // Khởi động toggle đúng trạng thái khi load
    document.addEventListener('DOMContentLoaded', handleTypeChange);
</script>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 8px;
        border: 1px solid rgba(0, 0, 0, 0.03);
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
    .breadcrumb {
        background-color: transparent;
        padding: 0;
        font-size: 0.9rem;
    }
    .breadcrumb-item a {
        color: #6c757d;
        text-decoration: none;
    }
    .alert-heading {
        font-size: 1rem;
    }
</style>
@endsection