<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác nhận đơn hàng #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 24px;
            text-align: center;
        }
        .content {
            padding: 24px;
        }
        .footer {
            background-color: #eee;
            padding: 12px;
            text-align: center;
            font-size: 13px;
            color: #666;
        }
        .order-info, .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        .order-info th, .order-info td,
        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        .order-info th {
            width: 35%;
            background-color: #f9f9f9;
            text-align: left;
        }
        .product-table th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .total-row td {
            font-weight: bold;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Xác Nhận Đơn Hàng</h2>
        <p>Mã đơn hàng: #{{ $order->transaction_code }}</p>
    </div>

    <div class="content">
        <p>Chào {{ $order->name ?? 'quý khách' }},</p>
        <p>Cảm ơn bạn đã mua sắm tại <strong>{{ config('app.name') }}</strong>!</p>
        <p>Dưới đây là thông tin chi tiết đơn hàng của bạn:</p>

        @php
            $paymentStatusLabels = [
                'paid' => 'Đã thanh toán',
                'unpaid' => 'Chưa thanh toán',
                'cancelled' => 'Đã hủy',
            ];
            $orderStatusLabels = [
                'pending' => 'Chờ xử lý',
                'processing' => 'Đang xử lý',
                'shipping' => 'Đang giao',
                'shipped' => 'Đã giao',
                'completed' => 'Hoàn thành',
                'cancelled' => 'Đã hủy',
                'returned' => 'Hoàn hàng',
            ];
        @endphp

        <table class="order-info">
            <tr>
                <th>Ngày đặt hàng</th>
                <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Phương thức thanh toán</th>
                <td>{{ $order->payment === 'cod' ? 'Thanh toán khi nhận hàng (COD)' : 'Chuyển khoản ngân hàng' }}</td>
            </tr>
            <tr>
                <th>Trạng thái thanh toán</th>
                <td>{{ $paymentStatusLabels[$order->payment_status] ?? ucfirst($order->payment_status) }}</td>
            </tr>
            <tr>
                <th>Trạng thái đơn hàng</th>
                <td>{{ $orderStatusLabels[$order->status] ?? ucfirst($order->status) }}</td>
            </tr>
            <tr>
                <th>Địa chỉ giao hàng</th>
                <td>{{ $order->address }}, {{ $order->ward }}, {{ $order->city }}</td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td>{{ $order->phone }}</td>
            </tr>
        </table>

        <h3 style="margin-top: 30px;">Danh sách sản phẩm</h3>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderDetails as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                        <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} đ</td>
                    </tr>
                @endforeach

                @if($order->product_discount > 0)
                    <tr>
                        <td colspan="3">Giảm giá sản phẩm
                            @if($order->productCoupon)
                                (Mã: {{ $order->productCoupon->coupon_code }})
                            @endif
                        </td>
                        <td>-{{ number_format($order->product_discount, 0, ',', '.') }} đ</td>
                    </tr>
                @endif

                @if($order->shipping_discount > 0)
                    <tr>
                        <td colspan="3">Giảm giá vận chuyển
                            @if($order->shippingCoupon)
                                (Mã: {{ $order->shippingCoupon->coupon_code }})
                            @endif
                        </td>
                        <td>-{{ number_format($order->shipping_discount, 0, ',', '.') }} đ</td>
                    </tr>
                @endif

                <tr>
                    <td colspan="3">Phí vận chuyển</td>
                    <td>{{ number_format($order->shipping_fee, 0, ',', '.') }} đ</td>
                </tr>
                <tr class="total-row">
                    <td colspan="3">Tổng thanh toán</td>
                    <td>{{ number_format($order->total, 0, ',', '.') }} đ</td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top: 30px;">Chúng tôi sẽ thông báo cho bạn khi đơn hàng được xử lý và giao đến.</p>
        <p>Mọi thắc mắc xin liên hệ bộ phận CSKH của <strong>{{ config('app.name') }}</strong>.</p>

        <p>Trân trọng,<br><strong>{{ config('app.name') }} Team</strong></p>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} {{ config('app.name') }} - Mọi quyền được bảo lưu.
    </div>
</div>
</body>
</html>
