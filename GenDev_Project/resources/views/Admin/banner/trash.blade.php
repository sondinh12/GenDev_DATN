@extends('Admin.layouts.master-without-page-title')

@section('content')
<div class="container-fluid px-4">
    <!-- Header với breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <h1 class="h4 mb-0 text-dark">
                <i class="fas fa-trash-alt text-danger me-2"></i>
                Thùng Rác Banner
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
                <!-- Nút Quay Lại & Tổng -->
                <div class="d-flex align-items-center">
                    <a href="{{ route('banner.index') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-arrow-left me-1"></i> Quay lại
                    </a>
                    <span class="ms-3 text-muted">Tổng: {{ $trashCount }} banner</span>
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
                            <th class="text-secondary" style="width:15%;">Xóa lúc</th>
                            <th class="text-center text-secondary" style="width:10%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                        <tr>
                            <td class="text-center text-muted">
                                {{ $loop->iteration + ($banners->currentPage()-1)*$banners->perPage() }}
                            </td>
                            <td class="fw-bold text-dark">{{ $banner->title }}</td>
                            <td>
                                @if ($banner->type === 'static' && $banner->image)
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/'.$banner->image) }}"
                                             class="img-thumbnail me-2"
                                             style="width:60px; height:40px; object-fit:cover;">
                                        <small class="text-muted">1 ảnh</small>
                                    </div>
                                @elseif ($banner->type === 'dynamic' && $banner->images)
                                    @php
                                        $imgs = json_decode($banner->images);
                                        $first = $imgs[0] ?? null;
                                    @endphp
                                    @if ($first)
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/'.$first) }}"
                                                 class="img-thumbnail me-2"
                                                 style="width:60px; height:40px; object-fit:cover;">
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
                            <td class="text-secondary">
                                {{ $banner->deleted_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="text-center">
                                <!-- Khôi phục: GET link -->
                                <a href="{{ route('admin.banner.restore', $banner->id) }}"
                                   class="btn btn-sm btn-outline-success me-2 restore-link">
                                    <i class="fas fa-undo me-1"></i>Khôi phục
                                </a>

                                <!-- Xóa vĩnh viễn: DELETE form -->
                                <form action="{{ route('admin.banner.forceDelete', $banner->id) }}"
                                      method="POST"
                                      class="delete-form d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash-alt me-1"></i>Xóa vĩnh viễn
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
                {{ $banners->links('pagination::bootstrap-5') }}
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

{{-- Xác nhận khi khôi phục hoặc xóa --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Xác nhận khôi phục
        document.querySelectorAll('.restore-link').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Xác nhận khôi phục',
                    text: 'Bạn chắc chắn muốn khôi phục banner này?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Xác nhận',
                    cancelButtonText: 'Hủy bỏ',
                    reverseButtons: true,
                    backdrop: `rgba(0,0,0,0.2)`
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link.href;
                    }
                });
            });
        });

        // Xác nhận xóa vĩnh viễn
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Xác nhận xóa',
                    text: 'Bạn chắc chắn muốn xóa vĩnh viễn banner này?',
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
    .card {
        border: 1px solid rgba(0,0,0,0.03);
        border-radius: 8px;
    }
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
    .img-thumbnail {
        border: 1px solid #e9ecef;
        padding: 2px;
        background-color: #f8f9fa;
    }
    .badge {
        font-weight: 500;
        padding: 5px 10px;
    }
    .bg-primary-light { background-color: rgba(13,110,253,0.1)!important; }
    .bg-info-light    { background-color: rgba(13,202,240,0.1)!important; }
    .bg-danger-light  { background-color: rgba(220,53,69,0.1)!important; }
    .btn-sm {
        padding: 0.35rem 0.75rem;
        font-size: 0.825rem;
    }
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
</style>
@endsection
