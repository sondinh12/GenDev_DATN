@extends('client.layout.master')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar Profile -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="position-relative d-inline-block mb-3">
                        <img src="{{ asset($user->avatar ?? 'images/default-avatar.png') }}" alt="Avatar"
                            class="rounded-circle border border-3 border-primary shadow" width="150" height="150">
                        <div class="position-absolute bottom-0 end-0">
                            <button class="btn btn-light btn-sm rounded-circle shadow-sm" data-bs-toggle="tooltip"
                                title="Thay đổi ảnh">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                    </div>
                    <h4 class="mb-1">{{ $user->name }}</h4>
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <span class="badge bg-{{ $user->status == 1 ? 'success' : 'danger' }}">
                            <i class="fas fa-circle me-1"></i>
                            {{ $user->status == 1 ? 'Hoạt động' : 'Khóa' }}
                        </span>
                        <span class="badge bg-info">
                            <i class="fas fa-user-shield me-1"></i>
                            {{ $user->role == 1 ? 'Người dùng' : 'Quản trị' }}
                        </span>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-edit me-2"></i>Chỉnh sửa thông tin
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-key me-2"></i>Đổi mật khẩu
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body p-4">
                    <h6 class="text-muted mb-3">Thống kê</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Đơn hàng</span>
                        <span class="fw-bold">0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Sản phẩm yêu thích</span>
                        <span class="fw-bold">0</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Đánh giá</span>
                        <span class="fw-bold">0</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-user-circle text-primary me-2"></i>
                            Thông tin cá nhân
                        </h5>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-download me-2"></i>Tải thông
                                        tin</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-print me-2"></i>In thông tin</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="bg-light rounded p-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    <span class="fw-bold">Email:</span>
                                </div>
                                <p class="mb-0 ms-4">{{ $user->email }}</p>
                                @if(!$user->email_verified_at)
                                <div class="ms-4 mt-2">
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-envelope me-1"></i>Xác thực email
                                    </button>
                                </div>
                                @else
                                <div class="ms-4 mt-2">
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i>Đã xác thực
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bg-light rounded p-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-phone text-primary me-2"></i>
                                    <span class="fw-bold">Số điện thoại:</span>
                                </div>
                                <p class="mb-0 ms-4">{{ $user->phone }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bg-light rounded p-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <span class="fw-bold">Địa chỉ:</span>
                                </div>
                                <p class="mb-0 ms-4">{{ $user->address ?? 'Chưa cập nhật' }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bg-light rounded p-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-venus-mars text-primary me-2"></i>
                                    <span class="fw-bold">Giới tính:</span>
                                </div>
                                <p class="mb-0 ms-4">{{ $user->gender }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="mt-5">
                        <h6 class="text-muted mb-3">Hoạt động gần đây</h6>
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-marker bg-primary"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Đăng ký tài khoản</h6>
                                    <small class="text-muted">{{ $user->created_at->format('d/m/Y H:i') }}</small>
                                </div>
                            </div>
                            @if($user->email_verified_at)
                            <div class="timeline-item">
                                <div class="timeline-marker bg-success"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Xác thực email</h6>
                                    <small class="text-muted">{{ $user->email_verified_at->format('d/m/Y H:i')
                                        }}</small>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh sửa thông tin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editProfileForm">
                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="tel" class="form-control" value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <textarea class="form-control" rows="3">{{ $user->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giới tính</label>
                        <select class="form-select">
                            <option value="Nam" {{ $user->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                            <option value="Nữ" {{ $user->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                            <option value="Khác" {{ $user->gender == 'Khác' ? 'selected' : '' }}>Khác</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </div>
    </div>
</div>

<style>
    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline-item {
        position: relative;
        padding-bottom: 1.5rem;
    }

    .timeline-item:last-child {
        padding-bottom: 0;
    }

    .timeline-marker {
        position: absolute;
        left: -30px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
    }

    .timeline-item:not(:last-child):before {
        content: '';
        position: absolute;
        left: -23px;
        top: 15px;
        height: calc(100% - 15px);
        width: 2px;
        background: #e9ecef;
    }
</style>

@endsection