@component('mail::message')
# Xin chào {{ $user->name ?? '' }}!

Cảm ơn bạn đã đăng ký tài khoản tại **GenDev**.

Vui lòng nhấn vào nút bên dưới để xác thực địa chỉ email của bạn:

@component('mail::button', ['url' => $actionUrl, 'color' => 'primary'])
Xác thực Email
@endcomponent

Nếu bạn không tạo tài khoản này, vui lòng bỏ qua email này.

Trân trọng,<br>
{{ config('app.name') }}

---

Nếu bạn gặp sự cố khi nhấn nút, hãy sao chép và dán liên kết sau vào trình duyệt:<br>
[{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent