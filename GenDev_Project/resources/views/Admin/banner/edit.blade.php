@extends('Admin.layouts.master-without-page-title')

@section('content')
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Flash error nếu có (modal, phải bấm OK) --}}
    @if (session('error'))
        <script>
          Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: '{{ session("error") }}',
            showConfirmButton: true
          });
        </script>
    @endif

    {{-- Flash success nếu có (toast) --}}
    @if (session('success'))
        <script>
          Swal.fire({
            icon: 'success',
            title: 'Thành công',
            text: '{{ session("success") }}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
        </script>
    @endif
<div class="container-fluid px-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0">
                <i class="fas fa-edit text-primary me-2"></i>
                CHỈNH SỬA BANNER
            </h4>
        </div>
        <a href="{{ route('banner.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Quay lại
        </a>
    </div>
    <!-- Edit Form -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-4">
                    {{-- Tiêu đề --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label fw-semibold">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $banner->title) }}"
                                   placeholder="Nhập tiêu đề banner">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Loại banner --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label fw-semibold">Loại banner <span class="text-danger">*</span></label>
                            <select name="type"
                                    id="type"
                                    class="form-select @error('type') is-invalid @enderror"
                                    onchange="handleTypeChange()"
                                    required>
                                <option value="static"  {{ old('type', $banner->type)=='static'  ? 'selected' : '' }}>
                                    Banner Thường
                                </option>
                                <option value="dynamic" {{ old('type', $banner->type)=='dynamic' ? 'selected' : '' }}>
                                    Banner Động
                                </option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Trạng thái --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label fw-semibold">Trạng thái <span class="text-danger">*</span></label>
                            <select name="status"
                                    class="form-select @error('status') is-invalid @enderror"
                                    required>
                                <option value="unused"  {{ old('status', $banner->status)=='unused'  ? 'selected' : '' }}>
                                    Chưa được sử dụng
                                </option>
                                <option value="using"   {{ old('status', $banner->status)=='using'   ? 'selected' : '' }}>
                                    Đang được sử dụng
                                </option>
                                <option value="expired" {{ old('status', $banner->status)=='expired' ? 'selected' : '' }}>
                                    Đã hết hạn
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Static Banner --}}
                <div id="static-image" class="mb-4">
                    <label class="form-label fw-semibold">Ảnh hiện tại</label>
                    <div class="mb-3">
                        @if($banner->image)
                            <img src="{{ asset('storage/'.$banner->image) }}"
                                 class="img-thumbnail"
                                 style="width:200px; height:120px; object-fit:cover;">
                        @else
                            <span class="text-muted">Chưa có ảnh</span>
                        @endif
                    </div>
                    <label class="form-label fw-semibold">Thay ảnh mới</label>
                    <input type="file"
                           name="image"
                           class="form-control @error('image') is-invalid @enderror"
                           accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Dynamic Banner --}}
                <div id="dynamic-images" class="mb-4" style="display:none;">
                    <label class="form-label fw-semibold">Ảnh động hiện tại</label>
                    <div id="existing-images" class="mb-4">
                        @php $imgs = json_decode($banner->images) ?: []; @endphp
                        @forelse($imgs as $i => $img)
                            <div class="mb-3 p-3 border rounded d-flex bg-light">
                                <img src="{{ asset('storage/'.$img) }}"
                                     class="img-thumbnail me-3"
                                     style="width:150px; height:90px; object-fit:cover;">
                                <div class="flex-grow-1">
                                    <label class="form-label">Thay ảnh {{ $i+1 }}</label>
                                    <input type="file"
                                           name="replace_images[{{ $i }}]"
                                           class="form-control mb-2 @error('replace_images.'.$i) is-invalid @enderror"
                                           accept="image/*">
                                    @error('replace_images.'.$i)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-check">
                                        <input type="checkbox"
                                               name="delete_images[]"
                                               value="{{ $i }}"
                                               id="delete_{{ $i }}"
                                               class="form-check-input">
                                        <label for="delete_{{ $i }}"
                                               class="form-check-label text-danger">
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
                    <button type="button"
                            class="btn btn-outline-primary btn-sm"
                            onclick="addImageInput()">
                        <i class="fas fa-plus me-1"></i> Thêm ảnh
                    </button>
                    @error('new_images.*')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <small class="d-block text-muted mt-2">
                        Nếu upload, sẽ thay thế ảnh động cũ theo logic controller.
                    </small>
                </div>

                {{-- Submit --}}
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit"
                            class="btn btn-primary px-4">
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
    // Hiển thị đúng form phần static/dynamic
    function handleTypeChange() {
        const type = document.getElementById('type').value;
        document.getElementById('static-image').style.display = (type==='static')  ? 'block' : 'none';
        document.getElementById('dynamic-images').style.display = (type==='dynamic') ? 'block' : 'none';
        if (type==='dynamic' && !document.getElementById('new-image-container').hasChildNodes()) {
            addImageInput();
        }
    }
    // Thêm input file cho ảnh động mới
    let newImageCount = 0;
    function addImageInput() {
        newImageCount++;
        const wrapper = document.createElement('div');
        wrapper.className = 'mb-3';
        wrapper.innerHTML = `
            <label class="form-label">Ảnh mới ${newImageCount}:</label>
            <input type="file"
                   name="new_images[]"
                   class="form-control"
                   accept="image/*">
        `;
        document.getElementById('new-image-container').appendChild(wrapper);
    }

    document.addEventListener('DOMContentLoaded', () => {
        handleTypeChange();

        // Ngăn không cho xóa nếu còn <2 ảnh
        const total = {{ count($imgs) }};
        document.querySelectorAll('input[name="delete_images[]"]').forEach(cb => {
            cb.addEventListener('change', function() {
                const toDelete = document.querySelectorAll('input[name="delete_images[]"]:checked').length;
                if (total - toDelete < 2) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Không thể xóa',
                        text: 'Banner động phải có ít nhất 2 ảnh.',
                        showConfirmButton: true
                    });
                    this.checked = false;
                }
            });
        });
    });
</script>
@endsection

@section('styles')
<style>
    .img-thumbnail { background-color: #f8f9fa; border:1px solid #e9ecef; padding:4px; }
    .form-label { font-weight:500; }
    .border { border-color: rgba(0,0,0,0.05)!important; }
</style>
@endsection
