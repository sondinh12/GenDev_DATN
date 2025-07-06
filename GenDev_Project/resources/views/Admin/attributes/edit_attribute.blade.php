@extends('Admin.layouts.master')

@section('title', 'Sửa thuộc tính')

@section('topbar-title')
<div class="d-flex align-items-center">
    <i class="fas fa-tags me-2 fs-4 text-primary"></i>
    <span>Chỉnh sửa thuộc tính</span>
</div>
@endsection

@section('content')
<div class="container-fluid px-4">
    <!-- Header Card -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2 text-warning"></i>Chỉnh sửa thuộc tính
                </h5>
                <a href="{{ route('admin.attributes.index') }}" class="btn btn-outline-secondary rounded-pill px-3">
                    <i class="fas fa-arrow-left me-1"></i> Quay lại
                </a>
            </div>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST" id="main-attr-form">
                @csrf
                @method('PUT')
                
                <!-- Sửa tên thuộc tính cha -->
                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">
                        <i class="fas fa-tag me-1 text-primary"></i>Tên thuộc tính
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" id="name" class="form-control border-2 py-2" 
                           value="{{ $attribute->name }}" required>
                </div>

                <div class="py-3 mb-4">
                    <h5 class="fw-semibold mb-3">
                        <i class="fas fa-list-ol me-2 text-primary"></i>Giá trị thuộc tính
                    </h5>
                    
                    <div id="value-list" class="mb-3">
                        @foreach($attribute->values as $key => $value)
                            <div class="input-group mb-3 value-row align-items-center">
                                <input type="text" name="values[{{ $value->id }}]" 
                                       class="form-control border-2 py-2" 
                                       value="{{ $value->value }}" 
                                       required>
                                <button type="button" 
                                        class="btn btn-outline-danger rounded-pill ms-2 px-3"
                                        onclick="removeOldValue(this, {{ $value->id }})"
                                        data-bs-toggle="tooltip" title="Xóa giá trị">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    
                    <button type="button" 
                            class="btn btn-outline-primary rounded-pill px-3"
                            onclick="addValueInput()">
                        <i class="fas fa-plus me-1"></i> Thêm giá trị mới
                    </button>
                </div>

                <!-- Phần nút thao tác (đã bỏ border-top) -->
                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="{{ route('admin.attributes.index') }}" class="btn btn-light rounded-pill px-4">
                        <i class="fas fa-times me-1"></i> Hủy bỏ
                    </a>
                    <button type="submit" name="btn-submit" class="btn btn-success rounded-pill px-4">
                        <i class="fas fa-save me-1"></i> Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Thêm input cho giá trị mới
function addValueInput() {
    var html = `<div class="input-group mb-3 value-row align-items-center">
        <input type="text" name="new_values[]" 
               class="form-control border-2 py-2" 
               placeholder="Nhập giá trị mới..." 
               required>
        <button type="button" 
                class="btn btn-outline-danger rounded-pill ms-2 px-3"
                onclick="this.parentNode.remove()"
                data-bs-toggle="tooltip" title="Xóa giá trị">
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>`;
    document.getElementById('value-list').insertAdjacentHTML('beforeend', html);
    
    // Khởi tạo lại tooltip cho các phần tử mới
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

// Xóa giá trị cũ khỏi form và đánh dấu để xóa trên server
function removeOldValue(btn, valueId) {
    // Thêm 1 input ẩn để báo controller xóa value này
    var form = document.getElementById('main-attr-form');
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'delete_values[]';
    input.value = valueId;
    form.appendChild(input);
    // Xóa dòng hiển thị value trên form
    btn.parentNode.remove();
}

// Khởi tạo tooltip khi trang tải xong
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>

<style>
    .form-control {
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.1);
    }
    .card {
        border-radius: 0.5rem;
    }
    .btn {
        transition: all 0.3s ease;
    }
    .input-group {
        align-items: center;
    }
    .value-row {
        transition: all 0.3s ease;
    }
</style>
@endsection