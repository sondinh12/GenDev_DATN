@extends('client.layout.master')

@section('content')
<style>
    .form-control.is-invalid {
        border-color: #dc3545;
        background-color: #fff8f8;
    }

    .form-select.is-invalid {
        border-color: #dc3545;
        background-color: #fff8f8;
    }

    .toggle-password {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        color: #6c757d;
        cursor: pointer;
        user-select: none;
    }

    .toggle-password:hover {
        background-color: #e9ecef;
    }

    .invalid-feedback {
        color: #dc3545;
        margin-top: 0.25rem;
        font-size: 0.875em;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-primary">Tạo tài khoản</h3>
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
                                <div class="form-group">
                                    <label for="name" class="form-label">Họ và tên</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" placeholder="Nhập họ và tên"
                                            required>
                                    </div>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="Nhập email của bạn" required>
                                    </div>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mật khẩu -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" placeholder="Nhập mật khẩu" required>
                                        <span class="toggle-password"
                                            style="cursor: pointer; padding: 0.375rem 0.75rem;">
                                            Hiện
                                        </span>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Xác nhận mật khẩu -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm" class="form-label">Xác nhận mật khẩu</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password-confirm"
                                            name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                                        <span class="toggle-password"
                                            style="cursor: pointer; padding: 0.375rem 0.75rem;">
                                            Hiện
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Số điện thoại -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone') }}"
                                            placeholder="Nhập số điện thoại" required>
                                    </div>
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Giới tính -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender" class="form-label">Giới tính</label>
                                    <div class="input-group">
                                        <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                            name="gender" required>
                                            <option value="">-- Chọn giới tính --</option>
                                            <option value="Nam" {{ old('gender')=='Nam' ? 'selected' : '' }}>Nam
                                            </option>
                                            <option value="Nữ" {{ old('gender')=='Nữ' ? 'selected' : '' }}>Nữ</option>
                                            <option value="Khác" {{ old('gender')=='Khác' ? 'selected' : '' }}>Khác
                                            </option>
                                        </select>
                                    </div>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Địa chỉ -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            id="address" name="address" value="{{ old('address') }}"
                                            placeholder="Nhập địa chỉ của bạn" required>
                                    </div>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Avatar -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="avatar" class="form-label">Ảnh đại diện</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                            id="avatar" name="avatar" accept="image/*">
                                    </div>
                                    @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Chọn ảnh đại diện của bạn (tối đa 2MB)</div>
                                </div>
                            </div>

                            <!-- Điều khoản -->
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Tôi đồng ý với <a href="#" class="text-primary">điều khoản sử dụng</a> và <a
                                            href="#" class="text-primary">chính sách bảo mật</a>
                                    </label>
                                </div>
                            </div>

                            <!-- Nút đăng ký -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    Đăng ký
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

@push('scripts')
<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const passwordInput = this.parentElement.querySelector('input');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.textContent = 'Ẩn';
            } else {
                passwordInput.type = 'password';
                this.textContent = 'Hiện';
            }
        });
    });
</script>
@endpush

@endsection
