@extends('client.layout.master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show position-fixed"
            style="top: 70px; right: 20px; z-index: 9999;">
            <i class="fas fa-exclamation-triangle me-1"></i> Đã có lỗi xảy ra:<br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container d-flex justify-content-center py-4" style="min-height: 80vh;">
        <div class="card w-100" style="max-width: 900px; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.07);">
            <div class="row g-0">
                <!-- Sidebar -->
                <div class="col-md-3 bg-white d-flex flex-column align-items-center pt-4"
                    style="border-radius: 18px 0 0 18px;">
                    <!-- Avatar -->
                    <div class="position-relative mb-3">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('storage/avatar/default-avatar.png') }}"
                            alt class="rounded-circle border border-primary mx-auto d-block"
                            style="width: 90px; height: 90px; object-fit: cover;">
                        <form id="avatarForm" method="POST" action="{{ route('profile.update_avatar') }}"
                            enctype="multipart/form-data">@csrf
                            <label class="btn btn-outline-primary btn-sm rounded-circle position-absolute"
                                style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; margin: 0 auto;"
                                title="Tải ảnh mới">
                                <i class="fa fa-camera"></i>
                                <input type="file" class="account-settings-fileinput" form="avatarForm" name="avatar"
                                    accept="image/*" style="display: none;">
                            </label>
                        </form>
                        <div class="text-center mb-3" style="margin-top: -20px">
                            <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                        </div>
                    </div>



                    <!-- Menu tab -->
                    <div class="w-100 px-3">
                        <a class="btn w-100 mb-2 fw-bold tab-link active" data-tab="account-general">Thông tin chung</a>
                        <a class="btn w-100 fw-bold tab-link" data-tab="account-change-password">Đổi mật khẩu</a>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-md-9 bg-white p-4" style="border-radius: 0 18px 18px 0;">
                    <div class="tab-content" id="account-general">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <!-- Name -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Họ và tên</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                                @if (!$user->email_verified_at)
                                    <div class="alert alert-warning mt-2 py-1 px-2">
                                        <span>Email chưa xác thực.</span>
                                        <button type="submit" form="resendEmailForm" class="btn btn-link p-0 ms-2">Gửi lại
                                            xác
                                            thực</button>
                                    </div>
                                @else
                                    <span class="badge bg-success mt-2"><i class="fa fa-check-circle me-1"></i>Đã xác
                                        thực</span>
                                @endif
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                            </div>

                            <!-- Gender -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Giới tính</label>
                                <select class="form-select" name="gender">
                                    <option value="Nam" {{ $user->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                                    <option value="Nữ" {{ $user->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                    <option value="Khác" {{ $user->gender == 'Khác' ? 'selected' : '' }}>Khác</option>
                                </select>
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Thành phố</label>
                                <input type="text" name="city" class="form-control" value="{{ $user->city }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Phường/Xã</label>
                                <input type="text" name="ward" class="form-control" value="{{ $user->ward }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Mã bưu chính</label>
                                <input type="text" name="postcode" class="form-control" value="{{ $user->postcode }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                            </div>

                            <!-- Save button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold rounded-pill">Lưu thay
                                    đổi</button>
                            </div>
                        </form>
                        <form id="resendEmailForm" method="POST" action="{{ route('verification.resend') }}">@csrf
                        </form>
                    </div>

                    <div class="tab-content d-none" id="account-change-password">
                        <form method="POST" action="{{ route('profile.change_password.update') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Mật khẩu hiện tại</label>
                                <input type="password" class="form-control" name="current_password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Mật khẩu mới</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold rounded-pill">Đổi mật
                                    khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .tab-link:hover,
        .tab-link.active {
            background-color: #f0f4ff;
            color: #0d6efd;
            transition: background 0.2s, color 0.2s;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.querySelectorAll('.tab-link').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.tab-link').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.add(
                    'd-none'));

                this.classList.add('active');
                document.getElementById(this.getAttribute('data-tab')).classList.remove('d-none');
            });
        });

        // Auto submit avatar form
        document.querySelectorAll('.account-settings-fileinput').forEach(input => {
            input.addEventListener('change', function() {
                this.closest('form').submit();
            });
        });
    </script>
@endpush
