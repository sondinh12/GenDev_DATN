<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đơn hàng bị huỷ</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 30px;">
        <h2 style="color: #c0392b;">Đơn hàng của bạn đã bị huỷ</h2>

        <p>Chào {{ $order->name }},</p>

        <p>Chúng tôi rất tiếc phải thông báo rằng đơn hàng <strong>#{{ $order->transaction_code }}</strong> của bạn đã bị huỷ do quá thời gian thanh toán.</p>

        <hr style="margin: 20px 0;">

        <h4>Thông tin đơn hàng:</h4>
        <ul>
            <li><strong>Email:</strong> {{ $order->email }}</li>
            <li><strong>Số điện thoại:</strong> {{ $order->phone }}</li>
            <li><strong>Tổng tiền:</strong> {{ number_format($order->total, 0, ',', '.') }}₫</li>
            <li><strong>Phương thức thanh toán:</strong> {{ ucfirst($order->payment) }}</li>
            <li><strong>Thời hạn thanh toán:</strong> {{ $order->payment_expired_at ? $order->payment_expired_at->format('H:i d/m/Y') : 'Không xác định' }}</li>
        </ul>

        @if($order->orderDetails && $order->orderDetails->count())
            <h4>Sản phẩm đã đặt:</h4>
            <ul>
                @foreach ($order->orderDetails as $item)
                    <li>{{ $item->product->name }} x {{ $item->quantity }}</li>
                @endforeach
            </ul>
        @endif

        <hr style="margin: 20px 0;">
        <p>Bạn vẫn có thể đặt lại đơn hàng bằng cách truy cập vào tài khoản của mình trên trang web của chúng tôi.</p>

        <p style="margin-top: 30px;">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.<br>— {{ config('app.name') }}</p>
    </div>
</body>
</html>
