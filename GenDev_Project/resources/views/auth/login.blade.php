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
        padding: 0.375rem 0.75rem;
    }

    .toggle-password:hover {
        background-color: #e9ecef;
    }

    .invalid-feedback {
        color: #dc3545;
        margin-top: 0.25rem;
        font-size: 0.875em;
        display: block !important;
    }
</style>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-primary">Đăng nhập</h3>
                        <p class="text-muted">Chào mừng bạn quay trở lại!</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Nhập email của bạn" required
                                autofocus>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mật khẩu -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
                                <span class="toggle-password">
                                    Hiện
                                </span>
                            </div>
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
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Đăng nhập
                            </button>

                            <!-- Social Login -->
                            <div class="text-center my-3">
                                <p class="text-muted">Hoặc đăng nhập với</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-outline-primary">
                                        Facebook
                                    </a>
                                    <a href="#" class="btn btn-outline-danger">
                                        Google
                                    </a>
                                    <a href="#" class="btn btn-outline-info">
                                        Twitter
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

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

@push('scripts')
<script>
    // Toggle password visibility
    document.querySelector('.toggle-password').addEventListener('click', function() {
        const passwordInput = document.querySelector('#password');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.textContent = 'Ẩn';
        } else {
            passwordInput.type = 'password';
            this.textContent = 'Hiện';
        }
    });
</script>
@endpush

@endsection