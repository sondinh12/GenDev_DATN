@extends('client.layout.master')

@section('title', 'Thanh toán thành công')

@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow p-4">
                <div class="mb-4 text-success">
                    <i class="bi bi-check-circle" style="font-size: 4rem;"></i>
                </div>
                <h2 class="mb-3">Thanh toán thành công!</h2>
                <p class="mb-4">Cảm ơn bạn đã đặt hàng. Chúng tôi đã gửi email xác nhận đơn hàng cho bạn.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    Quay về trang chủ
                </a>
            </div>
        </div>
    </div>
</div>
@endsection