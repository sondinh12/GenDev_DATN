<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;      /* Xanh dương chủ đạo */
            --primary-hover: #1d4ed8;     /* Xanh dương đậm hơn khi hover */
            --secondary-color: #64748b;   /* Xám nhẹ cho chữ phụ */
            --success-color: #10b981;     /* Xanh lá (success) */
            --error-color: #ef4444;       /* Đỏ (error) */
            --bg-color: #f9fafb;          /* Nền sáng giống trang chủ */
            --card-shadow: 0 4px 10px rgba(0, 0, 0, 0.05); /* Bóng nhẹ */
        }


        body {
            background: var(--bg-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 1.5rem;
            background: #fff;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            background: rgba(255, 255, 255, 0.95);
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: #dc3545;
            background-color: #fff8f8;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
        }

        .toggle-password {
            background: none;
            border: none;
            color: #2575fc;
            cursor: pointer;
            user-select: none;
            padding: 0 0.75rem;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: #1250b5;
        }

        .invalid-feedback {
            color: #dc3545;
            margin-top: 0.25rem;
            font-size: 0.875em;
            display: block !important;
        }
        .btn-register {
        background: var(--primary-color);
        border: none;
        color: #fff;
        font-size: 1.1rem;
        font-weight: 600;
        padding: 10px 35px;
        border-radius: 50px;
        box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
        transition: all 0.3s ease;
        cursor: pointer;
        }

        .btn-register:hover {
            background: var(--primary-hover); 
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(37, 99, 235, 0.35);
        }

        .btn-register:active {
            transform: scale(0.97);
        }

        select.form-select:required:invalid {
        color: #67686b;
        }

        select.form-select option {
            color: #000;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="col-md-8 col-lg-7">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 style="font-size:2.5rem; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); ">Đăng ký</h3>
                        <p>Tham gia cùng chúng tôi để có trải nghiệm mua sắm tốt nhất</p>
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
                                    <label for="name" class="form-label">Họ và tên<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}"
                                            placeholder="Nhập họ và tên" required>
                                    </div>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email<span class="text-danger">*</label>
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
                                    <label for="password" class="form-label">Mật khẩu<span class="text-danger">*</label>
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" placeholder="Nhập mật khẩu" required>
                                        {{-- <button type="button" class="toggle-password" tabindex="-1">
                                            <i class="fas fa-eye"></i>
                                        </button> --}}
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Xác nhận mật khẩu -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm" class="form-label">Xác nhận mật khẩu<span
                                            class="text-danger">*</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password-confirm"
                                            name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                                        {{-- <button type="button" class="toggle-password" tabindex="-1">
                                            <i class="fas fa-eye"></i>
                                        </button> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Số điện thoại -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Số điện thoại<span
                                            class="text-danger">*</label>
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
                                    <label for="gender" class="form-label">Giới tính<span
                                            class="text-danger">*</label>
                                    <div class="input-group">
                                        <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                            name="gender" required>
                                            <option value="" disabled selected>-- Chọn giới tính --</option>
                                            <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam
                                            </option>
                                            <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ
                                            </option>
                                            <option value="Khác" {{ old('gender') == 'Khác' ? 'selected' : '' }}>Khác
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
                                    <label for="address" class="form-label">Địa chỉ<span
                                            class="text-danger">*</label>
                                    <div class="input-group">
                                        <input type="text"
                                            class="form-control @error('address') is-invalid @enderror" id="address"
                                            name="address" value="{{ old('address') }}"
                                            placeholder="Nhập địa chỉ của bạn" required>
                                    </div>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Điều khoản -->
                            <div class="col-12">
                                <div class="form-check ps-0">
                                    <input class="form-check-input me-2" type="checkbox" id="terms"
                                        style="margin-left: 1px" required>
                                    <label class="form-check-label" for="terms">Tôi đồng ý với <a href="#"
                                            class="text-primary">điều khoản sử dụng</a> và
                                        <a href="#" class="text-primary">chính sách bảo mật</a>
                                    </label>
                                </div>
                            </div>

                            <!-- Nút đăng ký -->
                            {{-- <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                                    Đăng ký
                                </button>
                            </div> --}}
                            <div class="col-12 text-center">
                                <button type="submit" class="btn-register">
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

    @push('scripts')
        <!-- Font Awesome CDN for password icons -->
        <script src="https://kit.fontawesome.com/4e7b8e7e2a.js" crossorigin="anonymous"></script>
        <script>
            // Toggle password visibility for all toggle-password buttons
            document.querySelectorAll('.toggle-password').forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    const passwordInput = this.parentElement.querySelector('input');
                    const icon = this.querySelector('i');
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });
        </script>
    @endpush

</body>

</html>
