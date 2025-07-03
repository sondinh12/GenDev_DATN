@extends('client.layout.master')

@section('title', 'Thanh toán thất bại')

@section('content')
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        {{ session('error') }}
    </div>
@endif
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow p-4">
                <div class="mb-4 text-danger">
                    <i class="bi bi-x-circle" style="font-size: 4rem;"></i>
                </div>
                <h2 class="mb-3 text-danger">Thanh toán thất bại!</h2>
                <p class="mb-4">
                    Rất tiếc, giao dịch của bạn không thành công. Vui lòng kiểm tra lại thông tin hoặc thử thanh toán lại sau.
                </p>
                <a href="{{ route('checkout') }}" class="btn btn-warning me-2">
                    Thử thanh toán lại
                </a>
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    Quay về trang chủ
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
