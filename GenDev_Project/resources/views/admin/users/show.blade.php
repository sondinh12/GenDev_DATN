@extends('admin.layouts.master-without-page-title')

@section('title', 'Chi tiết người dùng')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Thông tin chi tiết người dùng</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left me-2"></i>Quay lại
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="position-relative d-inline-block">
                                @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar"
                                    class="img-fluid rounded-circle shadow-sm"
                                    style="max-width: 200px; border: 4px solid #fff;">
                                @else
                                <img src="{{ asset('storage/images/default-avatar.png') }}" alt="Default Avatar"
                                    class="img-fluid rounded-circle shadow-sm"
                                    style="max-width: 200px; border: 4px solid #fff;">
                                @endif
                                <div class="position-absolute bottom-0 end-0">
                                    @if($user->status == 1)
                                    <span class="badge bg-success rounded-circle p-2" title="Đang hoạt động">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    @else
                                    <span class="badge bg-danger rounded-circle p-2" title="Đã khóa">
                                        <i class="fas fa-ban"></i>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <h4 class="mt-3 mb-1">{{ $user->name }}</h4>
                            <p class="text-muted mb-0">
                                @if($user->role == 1)
                                <span class="badge bg-primary">Người dùng</span>
                                @elseif($user->role == 0)
                                <span class="badge bg-success">Admin</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="flex-shrink-0">
                                                    <i class="fas fa-id-card text-primary fa-fw"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 text-muted">ID</h6>
                                                    <p class="mb-0">{{ $user->id }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="flex-shrink-0">
                                                    <i class="fas fa-envelope text-primary fa-fw"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 text-muted">Email</h6>
                                                    <p class="mb-0">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="flex-shrink-0">
                                                    <i class="fas fa-phone text-primary fa-fw"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 text-muted">Số điện thoại</h6>
                                                    <p class="mb-0">{{ $user->phone ?? 'Chưa cập nhật' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="flex-shrink-0">
                                                    <i class="fas fa-venus-mars text-primary fa-fw"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 text-muted">Giới tính</h6>
                                                    <p class="mb-0">{{ $user->gender ?? 'Chưa cập nhật' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="flex-shrink-0">
                                                    <i class="fas fa-map-marker-alt text-primary fa-fw"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 text-muted">Địa chỉ</h6>
                                                    <p class="mb-0">{{ $user->address ?? 'Chưa cập nhật' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="flex-shrink-0">
                                                    <i class="fas fa-calendar-plus text-primary fa-fw"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 text-muted">Ngày tạo</h6>
                                                    <p class="mb-0">{{ $user->created_at->format('d/m/Y H:i:s') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="flex-shrink-0">
                                                    <i class="fas fa-calendar-check text-primary fa-fw"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0 text-muted">Cập nhật lần cuối</h6>
                                                    <p class="mb-0">{{ $user->updated_at->format('d/m/Y H:i:s') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection