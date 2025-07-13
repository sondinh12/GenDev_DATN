@extends('client.layout.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="error-page">
                <div class="error-code">
                    <h1 class="display-1 text-primary">404</h1>
                </div>
                <div class="error-message">
                    <h2 class="h4 mb-3">Trang không tìm thấy</h2>
                    <p class="text-muted mb-4">
                        Rất tiếc, trang bạn đang tìm kiếm không tồn tại hoặc đã được di chuyển.
                    </p>
                </div>
                <div class="error-actions">
                    <a href="{{ route('home') }}" class="btn btn-primary me-3">
                        <i class="fas fa-home me-2"></i>Về trang chủ
                    </a>
                    <a href="{{ route('shop') }}" class="btn btn-outline-primary">
                        <i class="fas fa-shopping-bag me-2"></i>Xem sản phẩm
                    </a>
                </div>
                <div class="mt-5">
                    <h5 class="mb-3">Có thể bạn quan tâm:</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-mobile-alt fa-2x text-primary mb-2"></i>
                                    <h6>Điện thoại</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-laptop fa-2x text-primary mb-2"></i>
                                    <h6>Laptop</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-headphones fa-2x text-primary mb-2"></i>
                                    <h6>Phụ kiện</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .error-page {
        padding: 60px 0;
    }

    .error-code h1 {
        font-size: 8rem;
        font-weight: 700;
        margin-bottom: 20px;
        background: linear-gradient(45deg, #2196F3, #00BCD4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .error-message h2 {
        color: #333;
        font-weight: 600;
    }

    .error-actions .btn {
        padding: 12px 24px;
        border-radius: 25px;
        font-weight: 500;
    }

    .card {
        transition: transform 0.3s ease;
        border-radius: 15px;
    }

    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection