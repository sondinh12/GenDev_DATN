<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thông báo cấm tạm thời</title>
</head>
<body>
    <h2>Xin chào {{ $user->name }},</h2>

    <p>Do bạn đã vi phạm chính sách đánh giá <strong>nhiều lần</strong>, tài khoản của bạn đã bị <strong>cấm tạm thời</strong>.</p>

    <p>⛔ Thời gian cấm kéo dài đến: <strong>{{ \Carbon\Carbon::parse($user->banned_until)->format('H:i d/m/Y') }}</strong></p>

    <p>Trong thời gian này, bạn sẽ không thể sử dụng các chức năng bình luận hoặc đánh giá.</p>

    <p>Vui lòng chờ hết thời gian cấm để tiếp tục sử dụng hệ thống.</p>

    <p>Trân trọng,<br>
    Đội ngũ quản trị</p>
</body>
</html>
