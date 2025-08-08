@extends('Admin.layouts.master-without-page-title')

@section('content')
<div class="container-fluid px-4">
    <!-- Header với breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <h1 class="h4 mb-0 text-dark">
                <i class="fas fa-image text-primary me-2"></i>
                Quản Lý Banner
            </h1>
            <nav aria-label="breadcrumb" class="ms-3">
                <ol class="breadcrumb bg-transparent mb-0">
                </ol>
            </nav>
        </div>
    </div>

    <!-- Card chính -->
    <div class="card shadow-sm rounded-lg border-0 overflow-hidden">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center w-100">
                <!-- Nút Thùng Rác & Tạo Mới -->
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.banner.trash') }}" class="btn btn-sm btn-trash-custom me-2">
                        <i class="fas fa-trash-alt me-1"></i> Thùng rác
                        <span class="badge bg-danger text-white ms-1">{{ $trashCount }}</span>
                    </a>
                    <a href="{{ route('banner.create') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus me-1"></i> Tạo mới
                    </a>
                </div>
                
                <!-- Search & Filter -->
                <div class="d-flex align-items-center">
                    <!-- Search Box -->
                    <form action="{{ route('banner.index') }}" method="GET" class="input-group input-group-sm me-3 search-container" style="width: 250px;">
                        <input type="text" name="search" class="form-control form-control-sm search-input border-0" placeholder="Tìm banner..." aria-label="Search" value="{{ request()->query('search') }}">
                        <button class="btn btn-search-custom bg-white border-0" type="submit">
                            <i class="fas fa-search text-primary"></i>
                        </button>
                    </form>
                    
                    <!-- Filter Dropdown -->
                    <div class="dropdown">
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Tất cả</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Banner Thường</a></li>
                            <li><a class="dropdown-item" href="#">Banner Động</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center text-secondary" style="width:5%;">#</th>
                            <th class="text-secondary" style="width:30%;">Tiêu đề</th>
                            <th class="text-secondary" style="width:25%;">Hình ảnh</th>
                            <th class="text-secondary" style="width:15%;">Loại</th>
                            <th class="text-secondary" style="width:15%;">Trạng thái</th>
                            <th class="text-center text-secondary" style="width:10%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                        <tr>
                            <td class="text-center text-muted">{{ $banner->id }}</td>
                            <td class="fw-bold text-dark">{{ $banner->title }}</td>
                            <td>
                                @if ($banner->type === 'static' && $banner->image)
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/'.$banner->image) }}" class="img-thumbnail me-2" style="width:60px; height:40px; object-fit:cover;">
                                        <small class="text-muted">1 ảnh</small>
                                    </div>
                                @elseif ($banner->type === 'dynamic' && $banner->images)
                                    @php
                                        $imgs = json_decode($banner->images);
                                        $first = $imgs[0] ?? null;
                                    @endphp
                                    @if ($first)
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/'.$first) }}" class="img-thumbnail me-2" style="width:60px; height:40px; object-fit:cover;">
                                            <small class="text-muted">{{ count($imgs) }} ảnh</small>
                                        </div>
                                    @else
                                        <span class="text-muted">Không có ảnh</span>
                                    @endif
                                @else
                                    <span class="text-muted">Không có ảnh</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $banner->type==='static'?'bg-primary-light text-primary':'bg-info-light text-info' }} px-2 py-1 rounded-pill">
                                    <i class="fas {{ $banner->type==='static'?'fa-image':'fa-images' }} me-1"></i>
                                    {{ $banner->type==='static'?'Thường':'Động' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-success-light text-success px-2 py-1 rounded-pill">
                                    <i class="fas fa-check-circle me-1"></i>Đang hoạt động
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('banner.edit',$banner->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="fas fa-edit me-1"></i>Sửa
                                </a>
                                <form action="{{ route('banner.destroy',$banner->id) }}" method="POST" class="delete-form d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash-alt me-1"></i>Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Phân trang -->
            <div class="d-flex justify-content-end align-items-center px-4 py-3 border-top">
                {{ $banners->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Flash Message --}}
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif

{{-- Xác nhận khi xóa --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Xác nhận xóa',
                    text: 'Bạn chắc chắn muốn xóa banner này?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Xác nhận',
                    cancelButtonText: 'Hủy bỏ',
                    reverseButtons: true,
                    backdrop: `rgba(0,0,0,0.2)`
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection

@section('styles')
<style>
    /* Card styling */
    .card {
        border: 1px solid rgba(0,0,0,0.03);
        border-radius: 8px;
    }
    
    /* Table styling */
    .table thead th {
        border-bottom: 1px solid rgba(0,0,0,0.03);
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        color: #6c757d;
    }
    .table td {
        vertical-align: middle;
        border-top: 1px solid rgba(0,0,0,0.03);
    }
    
    /* Image thumbnail */
    .img-thumbnail {
        border: 1px solid #e9ecef;
        padding: 2px;
        background-color: #f8f9fa;
    }
    
    /* Badge styling */
    .badge {
        font-weight: 500;
        padding: 5px 10px;
    }
    .bg-primary-light { 
        background-color: rgba(13,110,253,0.1)!important; 
    }
    .bg-info-light { 
        background-color: rgba(13,202,240,0.1)!important; 
    }
    .bg-success-light { 
        background-color: rgba(25,135,84,0.1)!important; 
    }
    
    /* Button styling */
    .btn-sm {
        padding: 0.35rem 0.75rem;
        font-size: 0.825rem;
    }
    
    /* Breadcrumb styling */
    .breadcrumb {
        background-color: transparent;
        padding: 0;
        margin-bottom: 0;
        font-size: 0.9rem;
    }
    .breadcrumb-item a {
        color: #6c757d;
        text-decoration: none;
    }
    
    /* Trash button styling */
    .btn-trash-custom {
        background-color: transparent;
        color: #dc3545;
        border: none;
        transition: all 0.2s ease;
    }
    .btn-trash-custom:hover {
        background-color: #dc3545;
        color: white !important;
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.2);
    }
    .btn-trash-custom .badge {
        background-color: #ff6666 !important;
        border-radius: 10px;
        padding: 0 6px;
    }
    
    /* Search box styling */
    .search-container {
        border: 2px solid #007bff;
        border-radius: 20px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    .search-input {
        border: none;
        box-shadow: none;
        padding: 0.375rem 0.75rem;
        color: #333;
        background-color: #fff;
    }
    .search-input::placeholder {
        color: #6c757d;
        opacity: 1;
    }
    .btn-search-custom {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 0.375rem 0.75rem;
        transition: all 0.3s ease;
    }
    .btn-search-custom:hover {
        background-color: #0056b3;
    }
    .search-container:hover,
    .search-container:focus-within {
        border-color: #0056b3;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.2);
    }
    
    /* Filter button styling */
    .btn-filter-custom {
        background-color: #f8f9fa;
        color: #495057;
        border: none;
        border-radius: 20px;
        padding: 0.375rem 1rem;
        transition: all 0.3s ease;
    }
    .btn-filter-custom:hover {
        background-color: #e9ecef;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    
    /* Dropdown styling */
    .dropdown-menu {
        font-size: 0.875rem;
        min-width: 10rem;
    }
    .dropdown-item {
        padding: 0.25rem 1rem;
    }
</style>
@endsection