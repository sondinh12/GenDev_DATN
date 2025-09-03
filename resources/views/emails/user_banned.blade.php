<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông báo khóa tài khoản</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f0f2f5; font-family: 'Segoe UI', sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f0f2f5; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #dc3545; padding: 20px 30px; color: #ffffff; text-align: center;">
                            <h1 style="margin: 0; font-size: 24px;">Tài khoản của bạn đã bị khóa</h1>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px; color: #333;">
                            <p style="font-size: 16px;">Xin chào <strong>{{ $user->name }}</strong>,</p>
                            <p style="font-size: 16px; line-height: 1.6;">
                                Chúng tôi rất tiếc phải thông báo rằng tài khoản của bạn đã bị <strong style="color: #dc3545;">khóa tạm thời</strong> do vi phạm chính sách sử dụng hoặc theo yêu cầu từ bộ phận quản trị.
                            </p>
                            <p style="font-size: 16px; line-height: 1.6;">
                                Nếu bạn cho rằng đây là một sự nhầm lẫn, bạn có thể <strong>liên hệ với chúng tôi</strong> để được hỗ trợ và xem xét lại.
                            </p>
                            <!-- CTA Button -->
                            <p style="text-align: center; margin: 30px 0;">
                                <a href="mailto:support@example.com" style="background-color: #28a745; color: #fff; text-decoration: none; padding: 12px 25px; border-radius: 6px; font-size: 16px;">
                                    Liên hệ hỗ trợ
                                </a>
                            </p>
                            <p style="font-size: 14px; color: #888;">
                                * Lưu ý: Bạn sẽ không thể truy cập các chức năng chính cho đến khi tài khoản được kích hoạt trở lại.
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8f9fa; padding: 20px 30px; text-align: center; font-size: 13px; color: #999;">
                            Email này được gửi tự động. Vui lòng không trả lời trực tiếp thư này.<br>
                            © {{ date('Y') }} Hệ thống quản trị | Mọi quyền được bảo lưu
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
