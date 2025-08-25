@extends('client.layout.master')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="my-2">🔐 Đặt lại mật khẩu</h4>
                </div>

                <div class="card-body p-4">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('password.verifyOtp') }}">
                        @csrf
                        @method ('PUT')
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">📧 Email</label>
                            <input type="email" name="email" class="form-control" value="{{ session('email') ?? old('email') }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="otp" class="form-label fw-bold">🔢 Mã OTP</label>
                            <input type="text" name="otp" class="form-control @error('otp') is-invalid @enderror" placeholder="Nhập mã OTP">
                            @error('otp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">🔑 Mật khẩu mới</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu mạnh">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold">🔁 Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu">
                        </div>

                        <div class="d-grid text-center">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill ">
                                <i class="fas fa-lock me-2"></i> Đặt lại mật khẩu
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-light text-center small text-muted rounded-bottom-4">
                    📌 Mã OTP có hiệu lực <strong>5 phút</strong> và chỉ dùng <strong>một lần</strong>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
<style>
    .invalid-feedback{
        color: red
    }
</style>
