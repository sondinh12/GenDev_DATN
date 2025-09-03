<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetOtpMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    public function sendResetOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Vui lòng nhập email.',
            'email.email'    => 'Email không hợp lệ.',
            'email.exists'   => 'Email chưa được đăng ký.',
        ]);

        $email = $request->email;
        $now = now();

        $existing = Token::where('email', $email)->first();

        if ($existing && $existing->count >= 3 && $existing->created_at > $now->copy()->subMinutes(10)) {
            return back()->withErrors(['email' => 'Bạn đã yêu cầu OTP quá 3 lần trong 10 phút. Vui lòng thử lại sau.']);
        }

        $otp = rand(100000, 999999);

        if ($existing) {
            $existing->update([
                'token' => $otp,
                'expiry' => $now->copy()->addMinutes(5),
                'count' => $existing->count + 1,
                'created_at' => $now,
            ]);
        } else {
            Token::create([
                'email' => $email,
                'token' => $otp,
                'expiry' => $now->copy()->addMinutes(5),
                'count' => 1,
                'created_at' => $now,
            ]);
        }

        Mail::to($email)->send(new ResetOtpMail($otp));

        return redirect()->route('password.resetForm')->with([
            'success' => 'Mã OTP đã được gửi tới email của bạn.',
            'email' => $email,
        ]);
    }

    public function verifyResetOtp(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'otp'      => 'required|digits:6',
            'password' => 'required|min:6|confirmed',
        ], [
            'otp.required'  => 'Vui lòng nhập mã OTP.',
            'otp.digits'    => 'Mã OTP phải gồm 6 chữ số.',
            'password.required'  => 'Vui lòng nhập mật khẩu.',
            'password.min'       => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);

        $record = Token::where('email', $request->email)
            ->where('token', $request->otp)
            ->where('expiry', '>', now())
            ->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Mã OTP không hợp lệ hoặc đã hết hạn.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        // Xoá token đã dùng
        $record->delete();

        // Tự động đăng nhập
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Bạn đã đặt lại mật khẩu và đăng nhập thành công!');
    }
}
