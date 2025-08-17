@extends('client.layout.master')

@section('content')

    <div class="login-container">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 style="font-size:2.5rem; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);  color: #0063d1;">Đăng nhập</h3>
                        <p>Chào mừng bạn quay trở lại!</p>
                    </div>
                    @if ($errors->has('email'))
                    <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 shadow"
                        role="alert"
                        id="autoDismissAlert"
                        style="z-index:9999; min-width:300px; max-width:90vw;">
                        <i class="fas fa-exclamation-triangle me-2"></i> {{ $errors->first('email') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf
                        <!-- Email -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label">Email<span class="text-danger">*</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Nhập email của bạn" required
                                autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Mật khẩu -->
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Mật khẩu<span class="text-danger">*</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                                {{-- <button type="button" class="toggle-password" tabindex="-1">
                                    <i class="fas fa-eye"></i>
                                </button> --}}
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check ps-0">
                                <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" style="margin-left: 2px"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Ghi nhớ đăng nhập
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary text-decoration-none">
                                    Quên mật khẩu?
                                </a>
                            @endif
                        </div>
                        <!-- Login Button -->
                        <div class="col-12 text-center">
                                <button type="submit" class="btn-login" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;">
                                    Đăng nhập
                                </button>
                            </div>
                    </form>
                    <!-- Register Link -->
                    <div class="text-center mt-4 register-link">
                        <p class="mb-0">Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        .login-container {
            width: 1200px;
            /* min-height: 90vh; */
            margin: 30px auto;
            align-items: center;
            justify-content: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
        }

        .card {
            border-radius: 1.5rem;
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
            color: #6a11cb;
        }

        .invalid-feedback {
            color: #dc3545;
            margin-top: 0.25rem;
            font-size: 0.875em;
            display: block !important;
        }

        .btn-primary {
            background: #2575fc;
            border: none;
            font-weight: 600;
            color: #fff;
            transition: box-shadow 0.2s, background 0.2s;
            box-shadow: 0 2px 8px rgba(31, 38, 135, 0.08);
        }

        .btn-primary:hover {
            background: #1250b5;
            box-shadow: 0 4px 16px rgba(31, 38, 135, 0.12);
            color: #fff;
        }

        .social-btns .btn {
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin: 0 0.25rem;
            border: none;
            transition: background 0.2s, color 0.2s;
        }

        .btn-facebook {
            background: #3b5998;
            color: #fff;
        }

        .btn-facebook:hover {
            background: #2d4373;
        }

        .btn-google {
            background: #db4437;
            color: #fff;
        }

        .btn-google:hover {
            background: #a33324;
        }

        .btn-twitter {
            background: #1da1f2;
            color: #fff;
        }

        .btn-twitter:hover {
            background: #0d8ddb;
        }

        .register-link a {
            font-weight: 600;
            text-decoration: underline;
            color: #2575fc;
        }

        .register-link a:hover {
            color: #1b34ef;
        }

        .btn-login {
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

        .btn-login:hover {
            background: var(--primary-hover); 
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(37, 99, 235, 0.35);
        }

        .btn-login:active {
            transform: scale(0.97);
        }

    </style>

    @push('scripts')
        <!-- Font Awesome CDN for social icons -->
        <script src="https://kit.fontawesome.com/4e7b8e7e2a.js" crossorigin="anonymous"></script>
        <script>
            // Toggle password visibility
            document.querySelector('.toggle-password').addEventListener('click', function() {
                const passwordInput = document.querySelector('#password');
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
            // Báo tự động ẩn thông báo sau 2.5 giây
            document.addEventListener("DOMContentLoaded", function () {
            setTimeout(function () {
                let alert = document.getElementById('autoDismissAlert');
                if (alert) {
                    alert.classList.remove('show');
                    alert.classList.add('hide');
                    setTimeout(() => alert.remove(), 300);
                }
            }, 2500);
        });
        </script>
    @endpush
@endsection