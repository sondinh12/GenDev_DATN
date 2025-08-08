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
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('banner.index') }}">Banner</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data" novalidate>
                @csrf

                <div class="row mb-4">
                    <!-- Tiêu đề -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label fw-semibold">Tiêu đề <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Nhập tiêu đề banner"
                                value="{{ old('title') }}"
                            >
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Loại -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label fw-semibold">Loại banner <span class="text-danger">*</span></label>
                            <select
                                name="type"
                                id="type"
                                class="form-select @error('type') is-invalid @enderror"
                                onchange="handleTypeChange()"
                                required
                            >
                                <option value="static" {{ old('type')=='static'? 'selected':'' }}>Banner Thường</option>
                                <option value="dynamic" {{ old('type')=='dynamic'? 'selected':'' }}>Banner Động</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Trạng thái -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label fw-semibold">Trạng thái <span class="text-danger">*</span></label>
                            <select
                                name="status"
                                class="form-select @error('status') is-invalid @enderror"
                                required
                            >
                                <option value="unused" {{ old('status')=='unused'? 'selected':'' }}>Chưa được sử dụng</option>
                                <option value="using"  {{ old('status')=='using'?  'selected':'' }}>Đang được sử dụng</option>
                                <option value="expired"{{ old('status')=='expired'?'selected':'' }}>Đã hết hạn</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Banner tĩnh --}}
                <div class="form-group mb-4" id="static-image">
                    <label class="form-label fw-semibold">Ảnh banner</label>
                    <input
                        type="file"
                        name="image"
                        class="form-control @error('image') is-invalid @enderror"
                        accept="image/*"
                        onchange="previewImage(this,'static-preview')"
                    >
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="mt-2">
                        <img id="static-preview" src="#" alt="Preview"
                             class="img-thumbnail d-none" style="max-height:150px;">
                    </div>
                </div>

                {{-- Banner động --}}
                <div class="form-group mb-4" id="dynamic-images" style="display:none;">
                    <label class="form-label fw-semibold">Ảnh động</label>
                    <div id="image-container" class="mb-3">
                        {{-- JS sẽ thêm các input ở đây --}}
                    </div>
                    {{-- lỗi images --}}
                    @error('images')
                        <div class="text-danger small mb-2">{{ $message }}</div>
                    @enderror
                    {{-- lỗi từng ảnh --}}
                    @if($errors->has('images.*'))
                        @foreach($errors->get('images.*') as $idx => $msgs)
                            @foreach($msgs as $msg)
                                <div class="text-danger small mb-1">Ảnh #{{ $idx+1 }}: {{ $msg }}</div>
                            @endforeach
                        @endforeach
                    @endif

                    <button type="button" class="btn btn-outline-primary btn-sm"
                            onclick="addImageInput()">
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
    // Chuyển hiển thị giữa static và dynamic
    function handleTypeChange() {
        const type = document.getElementById('type').value;
        document.getElementById('static-image').style.display = type==='static' ? 'block' : 'none';
        document.getElementById('dynamic-images').style.display = type==='dynamic' ? 'block' : 'none';
        if (type==='dynamic' && !document.querySelector('#image-container').hasChildNodes()) {
            addImageInput();
        }
    }

    // Thêm input cho dynamic
    let imageCount = 0;
    function addImageInput() {
        imageCount++;
        const wrap = document.createElement('div');
        wrap.className = 'image-input-wrapper mb-3 p-3 border rounded bg-light';
        wrap.innerHTML = `
            <div class="d-flex align-items-center mb-2">
                <strong class="me-2">Ảnh ${imageCount}:</strong>
                <button type="button" class="btn-close ms-auto" aria-label="Xóa"
                        onclick="this.closest('.image-input-wrapper').remove()"></button>
            </div>
            <input type="file" name="images[]"
                   accept="image/*"
                   class="form-control mb-2"
                   onchange="previewImage(this,'dynamic-preview-${imageCount}')">
            <div>
                <img id="dynamic-preview-${imageCount}" src="#" alt="Preview"
                     class="img-thumbnail d-none" style="max-height:100px;">
            </div>
        `;
        document.getElementById('image-container').appendChild(wrap);
    }

    // Preview ảnh
    function previewImage(input, previewId) {
        const img = document.getElementById(previewId);
        const file = input.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            img.src = e.target.result;
            img.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }

    // Giữ lại lựa chọn khi reload
    document.addEventListener('DOMContentLoaded', handleTypeChange);
</script>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 8px;
        border: 1px solid rgba(0,0,0,0.05);
    }
    .form-label {
        font-weight: 500;v
    }
    .img-thumbnail {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        padding: 4px;
    }
    .image-input-wrapper {
        position: relative;
    }
</style>
@endsection

