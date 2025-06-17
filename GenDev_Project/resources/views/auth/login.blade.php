@extends('client.layout.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Đăng nhập</h3>
                        <p class="text-muted">Chào mừng bạn quay trở lại!</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                            <label for="email">Email</label>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mật khẩu -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Mật khẩu" required>
                            <label for="password">Mật khẩu</label>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                    old('remember') ? 'checked' : '' }}>
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
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Đăng nhập
                            </button>
                        </div>
                    </form>

                    <!-- Social Login -->
                    <div class="text-center mt-4">
                        <p class="text-muted">Hoặc đăng nhập với</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="#" class="btn btn-outline-dark">
                                <i class="fab fa-apple"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center mt-4">
                        <p class="mb-0">Chưa có tài khoản? <a href="{{ route('register') }}" class="text-primary">Đăng
                                ký ngay</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-floating>.form-control {
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

    .btn-outline-primary,
    .btn-outline-danger,
    .btn-outline-dark {
        width: 40px;
        height: 40px;
        padding: 0;
        line-height: 40px;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover,
    .btn-outline-danger:hover,
    .btn-outline-dark:hover {
        transform: translateY(-2px);
    }

    .card {
        border-radius: 15px;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(33, 150, 243, 0.25);
    }
</style>

@endsection