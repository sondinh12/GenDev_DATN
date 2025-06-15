@extends('client.layout.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fa fa-check-circle text-success fa-3x mb-3"></i>
                        <h3 class="fw-bold text-success">Đăng ký thành công!</h3>
                        <p class="text-muted">Cảm ơn bạn đã đăng ký tài khoản tại GenDev</p>
                    </div>

                    <div class="alert alert-info mb-4">
                        <i class="fa fa-info-circle me-2"></i>
                        Vui lòng xác thực địa chỉ email của bạn để tiếp tục sử dụng tài khoản
                    </div>

                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-check-circle me-2"></i>
                        Một liên kết xác thực mới đã được gửi đến địa chỉ email của bạn.
                    </div>
                    @endif

                    <div class="text-center">
                        <p class="mb-4">
                            Trước khi tiếp tục, vui lòng kiểm tra email của bạn để xác thực tài khoản.
                        </p>

                        <p class="mb-4">
                            Nếu bạn không nhận được email xác thực,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 text-primary">
                                nhấn vào đây để yêu cầu gửi lại
                            </button>
                        </form>
                        </p>

                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                                <i class="fa fa-home me-2"></i>Về trang chủ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection