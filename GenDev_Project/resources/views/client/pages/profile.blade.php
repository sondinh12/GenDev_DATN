@extends('client.layout.master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show text-center mx-auto" id="profile-error-alert"
            style="position: fixed; top: 30px; left: 50%; transform: translateX(-50%); z-index: 9999; min-width: 340px; max-width: 90vw;">
            <i class="fas fa-exclamation-triangle me-1"></i> Đã có lỗi xảy ra:<br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <script>
            setTimeout(function() {
                $('#profile-error-alert').alert('close');
            }, 4000);
        </script>
    @endif

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Profile Header -->
                <div class="card border-0 shadow-lg mb-4" style="border-radius: 20px; overflow: hidden;">
                    <div class="card-header bg-gradient-primary text-white py-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar-wrapper me-4">
                                <div class="avatar-circle">
                                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('storage/avatar/default-avatar.png') }}"
                                        alt="Avatar" class="avatar-img">
                                    <div class="avatar-overlay">
                                        <form id="avatarForm" method="POST" action="{{ route('profile.update_avatar') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label class="avatar-upload-btn">
                                                <i class="fas fa-camera"></i>
                                                <input type="file" name="avatar" accept="image/*"
                                                    style="display: none;">
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="mb-1 fw-bold">{{ $user->name }}</h3>
                                <p class="mb-0 opacity-75">{{ $user->email }}</p>
                                <div class="mt-2">
                                    @if ($user->email_verified_at)
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-check-circle text-success me-1"></i>Đã xác thực
                                        </span>
                                    @else
                                        <span class="badge bg-warning">
                                            <i class="fas fa-exclamation-triangle me-1"></i>Chưa xác thực
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Navigation Tabs -->
                <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px;">
                    <div class="card-body p-3">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#profile-info" role="tab">
                                    <i class="fas fa-user me-2"></i>Thông tin cá nhân
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#security" role="tab">
                                    <i class="fas fa-shield-alt me-2"></i>Bảo mật
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#preferences" role="tab">
                                    <i class="fas fa-cog me-2"></i>Cài đặt
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tab Content -->
                @php
                    // Determine which tab should be active based on validation errors
                    $activeTab = 'profile-info';
                    if (
                        $errors->has('current_password') ||
                        $errors->has('password') ||
                        $errors->has('password_confirmation')
                    ) {
                        $activeTab = 'security';
                    }
                    // Add more checks for preferences if needed
                @endphp
                <div class="tab-content">
                    <!-- Profile Info Tab -->
                    <div class="tab-pane fade show @if ($activeTab == 'profile-info') active @endif" id="profile-info"
                        role="tabpanel">
                        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                            <div class="card-header bg-light border-0 py-3">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-user-edit me-2"></i>Chỉnh sửa thông tin
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ route('profile.update') }}">
                                    @csrf @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">Họ và tên</label>
                                            <div class="input-group">
                                                <input type="text" name="name"
                                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                    value="{{ old('name', $user->name) }}" placeholder="Nhập họ tên">
                                            </div>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">Email</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control form-control-lg"
                                                    value="{{ $user->email }}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">Số điện thoại</label>
                                            <div class="input-group">
                                                <input type="tel" name="phone"
                                                    class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                                    value="{{ old('phone', $user->phone) }}"
                                                    placeholder="Nhập số điện thoại">
                                            </div>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">Giới tính</label>
                                            <div class="input-group">
                                                <select
                                                    class="form-control form-select-lg @error('gender') is-invalid @enderror"
                                                    name="gender" style="min-height: 48px;">
                                                    <option value="Nam"
                                                        {{ old('gender', $user->gender) == 'Nam' ? 'selected' : '' }}>Nam
                                                    </option>
                                                    <option value="Nữ"
                                                        {{ old('gender', $user->gender) == 'Nữ' ? 'selected' : '' }}>Nữ
                                                    </option>
                                                    <option value="Khác"
                                                        {{ old('gender', $user->gender) == 'Khác' ? 'selected' : '' }}>Khác
                                                    </option>
                                                </select>
                                            </div>
                                            @error('gender')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label class="form-label fw-semibold">Thành phố</label>
                                            <div class="input-group">
                                                <input type="text" name="city"
                                                    class="form-control form-control-lg @error('city') is-invalid @enderror"
                                                    value="{{ old('city', $user->city) }}" placeholder="Nhập thành phố">
                                            </div>
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">Phường/Xã</label>
                                            <input type="text" name="ward"
                                                class="form-control form-control-lg @error('ward') is-invalid @enderror"
                                                value="{{ old('ward', $user->ward) }}" placeholder="Nhập phường/xã">
                                            @error('ward')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-semibold">Mã bưu chính</label>
                                            <input type="text" name="postcode"
                                                class="form-control form-control-lg @error('postcode') is-invalid @enderror"
                                                value="{{ old('postcode', $user->postcode) }}"
                                                placeholder="Nhập mã bưu chính">
                                            @error('postcode')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label class="form-label fw-semibold">Địa chỉ chi tiết</label>
                                            <textarea name="address" class="form-control form-control-lg @error('address') is-invalid @enderror" rows="3"
                                                placeholder="Nhập địa chỉ chi tiết">{{ old('address', $user->address) }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary btn-lg px-5 py-2 fw-bold">
                                            <i class="fas fa-save me-2"></i>Cập nhật thông tin
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Security Tab -->
                    <div class="tab-pane fade @if ($activeTab == 'security') show active @endif" id="security"
                        role="tabpanel">
                        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                            <div class="card-header bg-light border-0 py-3">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-lock me-2"></i>Đổi mật khẩu
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ route('profile.change_password.update') }}">
                                    @csrf


                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Mật khẩu hiện tại</label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control form-control-lg @error('current_password') is-invalid @enderror"
                                                name="current_password" placeholder="Nhập mật khẩu hiện tại" required>
                                        </div>
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Mật khẩu mới</label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" placeholder="Nhập mật khẩu mới" required>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Xác nhận mật khẩu mới</label>
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" placeholder="Nhập lại mật khẩu mới" required>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary btn-lg px-5 py-2 fw-bold">
                                            <i class="fas fa-sync-alt me-2"></i>Đổi mật khẩu
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Preferences Tab -->
                    <div class="tab-pane fade" id="preferences" role="tabpanel">
                        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                            <div class="card-header bg-light border-0 py-3">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-cog me-2"></i>Cài đặt tài khoản
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="d-flex justify-content-between align-items-center p-3 border rounded">
                                            <div>
                                                <h6 class="mb-1">Email thông báo</h6>
                                                <small class="text-muted">Nhận thông báo qua email</small>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked disabled>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-6 mb-4">
                                        <div class="d-flex justify-content-between align-items-center p-3 border rounded">
                                            <div>
                                                <h6 class="mb-1">SMS thông báo</h6>
                                                <small class="text-muted">Nhận SMS khi có đơn hàng</small>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="d-flex justify-content-between align-items-center p-3 border rounded">
                                            <div>
                                                <h6 class="mb-1">Hiển thị trạng thái</h6>
                                                <small class="text-muted">Hiển thị khi đang online</small>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" checked>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="d-flex justify-content-between align-items-center p-3 border rounded">
                                            <div>
                                                <h6 class="mb-1">Chế độ riêng tư</h6>
                                                <small class="text-muted">Ẩn thông tin cá nhân</small>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        :root {
            --primary-blue: #1569d1;
            --primary-gradient: linear-gradient(135deg, #1569d1 0%, #1569d1 100%);
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --border-radius: 15px;
        }

        .bg-gradient-primary {
            background: var(--primary-gradient) !important;
        }

        .avatar-wrapper {
            position: relative;
        }

        .avatar-circle {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease;
        }

        .avatar-circle:hover .avatar-img {
            transform: scale(1.05);
        }

        .avatar-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            cursor: pointer;
        }

        .avatar-circle:hover .avatar-overlay {
            opacity: 1;
        }

        .avatar-upload-btn {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .avatar-upload-btn:hover {
            background: white;
        }

        .nav-pills .nav-link {
            border-radius: 25px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 5px;
        }

        .nav-pills .nav-link.active {
            background: var(--primary-blue) !important;
            color: #fff !important;
            box-shadow: 0 4px 15px rgba(21, 105, 209, 0.2);
        }

        .form-control,
        .form-select {
            border: 1px solid #e0e6ed;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .input-group-text {
            background-color: #f8f9fa;
            border: 1px solid #e0e6ed;
            border-right: none;
            border-radius: 10px 0 0 10px;
        }

        .form-control-lg {
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--primary-blue) !important;
            border: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #125bb3 !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(21, 105, 209, 0.2);
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow);
        }

        @media (max-width: 768px) {
            .avatar-circle {
                width: 100px;
                height: 100px;
            }

            .nav-pills .nav-link {
                font-size: 0.9rem;
                padding: 10px 15px;
            }
        }

        .invalid-feedback {
            color: #dc3545;
            margin-top: 0.25rem;
            font-size: 0.875em;
            display: block !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(function() {
            // Activate correct tab if error
            var activeTab = @json($activeTab);
            if (activeTab !== 'profile-info') {
                var tabSelector = '[href="#' + activeTab + '"]';
                $(tabSelector).tab('show');
            }

            // Enhanced tab switching for Bootstrap 4
            $('[data-toggle="pill"]').on('show.bs.tab', function(e) {
                var target = $($(e.target).attr('href'));
                target.css('opacity', '0');
                setTimeout(function() {
                    target.css({
                        opacity: 1,
                        transition: 'opacity 0.3s ease'
                    });
                }, 150);
            });

            // Auto-submit avatar with preview
            $('input[name="avatar"]').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.avatar-img').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                    setTimeout(function() {
                        $('#avatarForm').submit();
                    }, 500);
                }
            });

            // Form validation enhancement
            $('form').on('submit', function() {
                var submitBtn = $(this).find('button[type="submit"]');
                submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Đang xử lý...');
                submitBtn.prop('disabled', true);
            });
        });
    </script>
@endpush
