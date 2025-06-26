<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Xác Nhận Đơn Hàng</title>
    <style>
        .container { max-width: 600px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; }
        .header { background-color: #f8f8f8; padding: 20px; text-align: center; }
        .content { padding: 20px; }
        .footer { background-color: #f8f8f8; padding: 10px; text-align: center; font-size: 12px; }
        .order-details { border: 1px solid #ddd; padding: 15px; margin-top: 20px; }
        .order-details table { width: 100%; border-collapse: collapse; }
        .order-details th, .order-details td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Xác Nhận Đơn Hàng #{{ $order->id }}</h2>
        </div>
        <div class="content">
            <p>Xin chào {{ $order->name ?? 'Khách hàng' }},</p>
            <p>Cảm ơn bạn đã đặt hàng tại <strong>{{ config('app.name') }}</strong>! Dưới đây là chi tiết đơn hàng của bạn:</p>

            <div class="order-details">
                <h3>Thông Tin Đơn Hàng</h3>
                <table>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <th>Ngày đặt</th>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Tổng tiền</th>
                        <td>{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>{{$order->status_text}}</td>
                    </tr>
                </table>

                <h3>Sản Phẩm</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tiền Ship</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                <td>{{ number_format($order->shipping_fee,0,',',',')}} VNĐ</td>
                                <td>{{ number_format($item->price * $item->quantity + $order->shipping_fee, 0, ',', '.') }} VNĐ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Mọi quyền được bảo lưu.</p>
        </div>
    </div>
</body>
</html>