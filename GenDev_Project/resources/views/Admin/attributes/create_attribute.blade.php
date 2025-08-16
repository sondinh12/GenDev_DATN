@extends('Admin.layouts.master')

@section('title')
    Tạo thuộc tính
@endsection

@section('topbar-title')
    <div class="d-flex align-items-center">
        <i class="fas fa-tags me-2 fs-4 text-primary"></i>
        <span>Tạo thuộc tính mới</span>
    </div>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <!-- Header Card -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-plus-circle me-2 text-success"></i>Thêm thuộc tính mới
                    </h5>
                    {{-- <a href="{{ route('admin.attributes.index') }}" class="btn btn-outline-secondary rounded-pill px-3">
                        <i class="fas fa-arrow-left me-1"></i> Quay lại
                    </a> --}}
                </div>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger border-0 bg-light-danger">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle me-2 fs-4"></i>
                            <div>
                                <h6 class="fw-semibold mb-1">Có lỗi xảy ra!</h6>
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.attributes.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold">
                                    <i class="fas fa-tag me-1 text-primary"></i>Tên thuộc tính
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" id="name" class="form-control border-2 py-2"
                                    value="{{ old('name') }}" placeholder="Nhập tên thuộc tính">
                                <div class="form-text">Ví dụ: Màu sắc, Kích thước, Chất liệu</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="values" class="form-label fw-semibold">
                                    <i class="fas fa-list-ol me-1 text-primary"></i>Giá trị thuộc tính
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="values" id="values" class="form-control border-2 py-2"
                                    value="{{ old('values') }}" placeholder="Nhập các giá trị cách nhau bởi dấu phẩy">
                                <div class="form-text">Ví dụ: Đỏ,Xanh,Vàng hoặc S,M,L,XL</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top">
                        <a href="{{ route('admin.attributes.index') }}" class="btn btn-light rounded-pill px-4">
                            <i class="fas fa-times me-1"></i> Hủy bỏ
                        </a>
                        <button type="submit" class="btn btn-success rounded-pill px-4">
                            <i class="fas fa-save me-1"></i> Lưu thuộc tính
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

        .alert {
            border-radius: 0.5rem;
        }
    </style>
@endsection
