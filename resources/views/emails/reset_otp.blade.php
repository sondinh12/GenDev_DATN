<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt lại mật khẩu - Mã OTP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 540px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 32px;
        }
        .title {
            color: #333;
            text-align: center;
            font-size: 20px;
            margin-bottom: 12px;
        }
        .otp {
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            color: #ff3e3e;
            letter-spacing: 8px;
            margin: 24px 0;
        }
        .message {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            text-align: center;
        }
        .footer {
            text-align: center;
            font-size: 13px;
            color: #999;
            margin-top: 24px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2 class="title">Xác thực đặt lại mật khẩu</h2>
        <p class="message">Bạn hoặc ai đó đã yêu cầu đặt lại mật khẩu cho tài khoản của bạn. Đây là mã OTP dùng để xác minh:</p>

        <div class="otp">{{ $otp }}</div>

        <p class="message">Mã OTP có hiệu lực trong <strong>5 phút</strong>. Vui lòng không chia sẻ mã này cho bất kỳ ai.</p>

        <p class="footer">Nếu bạn không yêu cầu đặt lại mật khẩu, bạn có thể bỏ qua email này.</p>
    </div>
</body>
</html>
