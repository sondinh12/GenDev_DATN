@extends('client.layout.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="my-2">🔐 Yêu cầu mã OTP</h4>
                </div>

                <div class="card-body p-4">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">📧 Địa chỉ Email</label>
                            <input type="email" id="email" name="email" class="form-control shadow-sm @error('email') is-invalid @enderror" placeholder="Nhập email của bạn"  autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid text-center">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                                <i class="fas fa-paper-plane me-2"></i> Gửi mã OTP
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center small text-muted bg-light rounded-bottom-4">
                    📩 Bạn sẽ nhận được mã OTP qua email, hiệu lực trong <strong>5 phút</strong>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
