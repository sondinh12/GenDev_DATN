<!DOCTYPE html>
<html>

<head>
    <title>Đặt lại mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Đặt lại mật khẩu</h2>
        <p>Xin chào,</p>
        <p>Chúng tôi nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
        <p>Vui lòng nhấp vào nút bên dưới để đặt lại mật khẩu của bạn:</p>

        <a href="{{ $resetUrl }}" class="button">Đặt lại mật khẩu</a>

        <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>
        <p>Link đặt lại mật khẩu sẽ hết hạn sau 24 giờ.</p>

        <div class="footer">
            <p>Email này được gửi tự động, vui lòng không trả lời email này.</p>
            <p>Nếu bạn cần hỗ trợ, vui lòng liên hệ với chúng tôi qua email hỗ trợ.</p>
        </div>
    </div>
</body>

</html>