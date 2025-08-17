@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Banner')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Danh sách Banner</h5>
            <form action="{{ route('banner.index') }}" method="GET" style="max-width: 300px; width: 100%;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm banner..."
                        value="{{ request()->query('search') }}">
                    <button type="submit" class="btn btn-outline-secondary">Tìm</button>
                </div>

                <div class="dropdown">
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Tất cả</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Banner Thường</a></li>
                        <li><a class="dropdown-item" href="#">Banner Động</a></li>
                    </ul>
                </div>
            </form>
        </div>

        <div class="card-body py-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('banner.create') }}" class="btn btn-outline-primary mb-3"><i class="fas fa-plus me-1"></i>Thêm
                mới banner</a>
            <a href="{{ route('admin.banner.trash') }}" class="btn btn-outline-danger mb-3 float-end position-relative">
                <i class="fa fa-trash me-1"></i>Thùng rác
                <span class="badge bg-danger text-white ms-1">{{ $trashCount }}</span>
            </a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center justify-content-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Loại</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            {{-- STT giảm dần --}}
                            <td class="text-center text-muted">
                                {{ $banners->total() - (($banners->currentPage() - 1) * $banners->perPage() + $loop->index) }}
                            </td>
                            <td class="fw-bold text-dark">{{ $banner->title }}</td>
                            <td>
                                @if ($banner->type === 'static' && $banner->image)
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $banner->image) }}" class="img-thumbnail me-2"
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
                                            <img src="{{ asset('storage/' . $first) }}" class="img-thumbnail me-2"
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
                                <span
                                    class="badge {{ $banner->type === 'static' ? 'bg-primary-light text-primary' : 'bg-info-light text-info' }} px-2 py-1 rounded-pill">
                                    <i class="fas {{ $banner->type === 'static' ? 'fa-image' : 'fa-images' }} me-1"></i>
                                    {{ $banner->type === 'static' ? 'Thường' : 'Động' }}
                                </span>
                            </td>
                            <td>
                                @switch($banner->status)
                                    @case('unused')
                                        <span class="badge bg-secondary text-white px-2 py-1 rounded-pill">Chưa sử dụng</span>
                                    @break

                                    @case('using')
                                        <span class="badge bg-success text-white px-2 py-1 rounded-pill">Đang sử dụng</span>
                                    @break

                                    @case('expired')
                                        <span class="badge bg-danger text-white px-2 py-1 rounded-pill">Đã hết hạn</span>
                                    @break
                                @endswitch
                            </td>
                            <td class="text-center">
                                @if ($banner->status !== 'using')
                                    <form action="{{ route('banner.use', $banner->id) }}" method="POST"
                                        class="use-form d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success me-2">
                                            <i class="fas fa-check me-1"></i>Sử dụng
                                        </button>
                                    </form>
                                @endif
                                {{-- Nút Sửa --}}
                                <a href="{{ route('banner.edit', $banner->id) }}"
                                    class="btn btn-sm btn-outline-primary me-2">
                                    <i class="fas fa-edit me-1"></i>Sửa
                                </a>
                                {{-- Nút Xóa --}}
                                <form action="{{ route('banner.destroy', $banner->id) }}" method="POST"
                                    class="delete-form d-inline">
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
            {{ $banners->appends(request()->query())->links('pagination::bootstrap-5') }}
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
                title: 'Không thể xóa!',
                text: '{{ session('error') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
    {{-- Xác nhận khi nhấn 'Sử dụng' và 'Xóa' --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Xác nhận sử dụng
            document.querySelectorAll('.use-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Xác nhận sử dụng',
                        text: 'Bạn chắc chắn muốn chọn banner này để sử dụng?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Có, sử dụng',
                        cancelButtonText: 'Hủy'
                    }).then(result => {
                        if (result.isConfirmed) form.submit();
                    });
                });
            });
            // Xác nhận xóa
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Xác nhận xóa',
                        text: 'Bạn chắc chắn muốn xóa banner này?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Xóa',
                        cancelButtonText: 'Hủy'
                    }).then(result => {
                        if (result.isConfirmed) form.submit();
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
            border: 1px solid rgba(0, 0, 0, 0.03);
            border-radius: 8px;
        }

        /* Table styling */
        .table thead th {
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            color: #6c757d;
        }

        .table td {
            vertical-align: middle;
            border-top: 1px solid rgba(0, 0, 0, 0.03);
        }

        .img-thumbnail {
            border: 1px solid #e9ecef;
            padding: 2px;
            background: #f8f9fa;
        }

        .badge {
            font-weight: 500;
            padding: 5px 10px;
        }

        .bg-primary-light {
            background-color: rgba(13, 110, 253, 0.1) !important;
        }

        .bg-info-light {
            background-color: rgba(13, 202, 240, 0.1) !important;
        }

        .btn-sm {
            padding: 0.35rem 0.75rem;
            font-size: 0.825rem;
        }

        .btn-trash-custom {
            background: transparent;
            color: #dc3545;
            border: none;
            transition: all .2s;
        }

        .btn-trash-custom:hover {
            background: #dc3545;
            color: #fff;
        }

        .search-container {
            border: 2px solid #007bff;
            border-radius: 20px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: all .3s;
        }

        .search-input {
            border: none;
            box-shadow: none;
            padding: .375rem .75rem;
            color: #333;
        }

        .btn-search-custom {
            background: #007bff;
            color: #fff;
            border: none;
            padding: .375rem .75rem;
            transition: all .3s;
        }

        .search-container:hover,
        .search-container:focus-within {
            border-color: #0056b3;
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.2);
        }
    </style>
@endsection
