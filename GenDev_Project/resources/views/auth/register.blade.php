@extends('client.layout.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Tạo tài khoản</h3>
                        <p class="text-muted">Tham gia cùng chúng tôi để có trải nghiệm mua sắm tốt nhất</p>
                    </div>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf

                        <div class="row g-3">
                            <!-- Họ và tên -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" placeholder="Họ và tên"
                                        required>
                                    <label for="name">Họ và tên</label>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                    <label for="email">Email</label>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mật khẩu -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Mật khẩu" required>
                                    <label for="password">Mật khẩu</label>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Xác nhận mật khẩu -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password-confirm"
                                        name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
                                    <label for="password-confirm">Xác nhận mật khẩu</label>
                                </div>
                            </div>

                            <!-- Số điện thoại -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại"
                                        required>
                                    <label for="phone">Số điện thoại</label>
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Giới tính -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                        name="gender" required>
                                        <option value="">-- Chọn giới tính --</option>
                                        <option value="Nam" {{ old('gender')=='Nam' ? 'selected' : '' }}>Nam</option>
                                        <option value="Nữ" {{ old('gender')=='Nữ' ? 'selected' : '' }}>Nữ</option>
                                        <option value="Khác" {{ old('gender')=='Khác' ? 'selected' : '' }}>Khác</option>
                                    </select>
                                    <label for="gender">Giới tính</label>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Địa chỉ -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}" placeholder="Địa chỉ"
                                        required>
                                    <label for="address">Địa chỉ</label>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Avatar -->
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Ảnh đại diện</label>
                                    <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                        id="avatar" name="avatar" accept="image/*">
                                    <div class="form-text">Chọn ảnh đại diện của bạn (tối đa 2MB)</div>
                                    @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Điều khoản -->
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Tôi đồng ý với <a href="#">điều khoản sử dụng</a> và <a href="#">chính sách bảo
                                            mật</a>
                                    </label>
                                </div>
                            </div>

                            <!-- Nút đăng ký -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-user-plus me-2"></i>Đăng ký
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">Đã có tài khoản? <a href="{{ route('login') }}" class="text-primary">Đăng
                                nhập</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-floating>.form-control,
    .form-floating>.form-select {
        height: calc(3.5rem + 2px);
        line-height: 1.25;
    }

    .form-floating>label {
        padding: 1rem 0.75rem;
    }

    .form-floating>.form-control:focus~label,
    .form-floating>.form-control:not(:placeholder-shown)~label {
        transform: scale(.85) translateY(-0.5rem) translateX(0.15rem);
    }

    .btn-primary {
        background: linear-gradient(45deg, #2196F3, #1976D2);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
    }

    .card {
        border-radius: 15px;
    }

    .form-control:focus,
    .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(33, 150, 243, 0.25);
    }
</style>

@endsection