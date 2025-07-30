<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tài khoản đã được mở khóa</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f0f2f5; font-family: 'Segoe UI', sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f0f2f5; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #28a745; padding: 20px 30px; color: #ffffff; text-align: center;">
                            <h1 style="margin: 0; font-size: 24px;">Tài khoản đã được mở khóa</h1>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px; color: #333;">
                            <p style="font-size: 16px;">Chào <strong>{{ $user->name }}</strong>,</p>
                            <p style="font-size: 16px; line-height: 1.6;">
                                Chúng tôi xin thông báo rằng <strong>tài khoản của bạn đã được kích hoạt trở lại</strong>. Bạn đã có thể đăng nhập và sử dụng đầy đủ các tính năng trên hệ thống như trước đây.
                            </p>
                            <p style="font-size: 16px; line-height: 1.6;">
                                Cảm ơn bạn đã kiên nhẫn trong thời gian chờ xử lý. Nếu có bất kỳ thắc mắc hoặc cần hỗ trợ thêm, đừng ngần ngại liên hệ với chúng tôi.
                            </p>
                            <!-- CTA Button -->
                            <p style="text-align: center; margin: 30px 0;">
                                <a href="{{ route('login') }}" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 12px 25px; border-radius: 6px; font-size: 16px;">
                                    Đăng nhập ngay
                                </a>
                            </p>
                            <p style="font-size: 14px; color: #888;">
                                * Nếu bạn không thực hiện yêu cầu này, vui lòng liên hệ với quản trị viên ngay lập tức.
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8f9fa; padding: 20px 30px; text-align: center; font-size: 13px; color: #999;">
                            Đây là email tự động. Vui lòng không trả lời lại thư này.<br>
                            © {{ date('Y') }} Hệ thống quản trị | Mọi quyền được bảo lưu
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
