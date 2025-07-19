@extends('client.layout.master')

@section('content')
    <style>
        body {
            min-height: 100vh;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
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
            color: #6a11cb;
        }
    </style>

    <div class="login-container">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-primary" style="font-size:2rem;">Đăng nhập</h3>
                        <p class="text-muted mb-0">Chào mừng bạn quay trở lại!</p>
                    </div>
                    @if ($errors->has('email'))
                    <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 shadow"
                        role="alert"
                        id="autoDismissAlert"
                        style="z-index:9999; min-width:300px; max-width:90vw;">
                        <i class="fas fa-exclamation-triangle me-2"></i> {{ $errors->first('email') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf
                        <!-- Email -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Nhập email của bạn" required
                                autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Mật khẩu -->
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                                <button type="button" class="toggle-password" tabindex="-1">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" style="margin-left: 2px"
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
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                Đăng nhập
                            </button>
                        </div>
                        <!-- Social Login -->
                    </form>
                    <!-- Register Link -->
                    <div class="text-center mt-4 register-link">
                        <p class="mb-0">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
