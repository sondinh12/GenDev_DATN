<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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

        body {
            background: var(--bg-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 1.5rem;
            background: #fff;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            background: rgba(255, 255, 255, 0.95);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            @if(session('register_success'))
                            <i class="fa fa-check-circle text-success fa-3x mb-3"></i>
                            <h3 class="fw-bold text-success">Đăng ký thành công!</h3>
                            <p class="text-muted">Cảm ơn bạn đã đăng ký tài khoản tại GenDev</p>
                            @php session()->forget('register_success'); @endphp
                            @else
                            <h3 style="font-size:2rem; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);">Xác thực tài khoản</h3>
                            @endif
                        </div>

                        <div class="alert alert-info mb-4">
                            <i class="fa fa-info-circle me-2"></i>
                            Vui lòng xác thực địa chỉ email của bạn để tiếp tục sử dụng tài khoản
                        </div>

                        @if (session('success'))
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
                                    Nhấn vào đây để yêu cầu gửi lại
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
</body>
</html>