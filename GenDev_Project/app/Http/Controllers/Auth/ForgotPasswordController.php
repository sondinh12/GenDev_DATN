<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Mail\ResetOtpMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    public function sendResetOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $email = $request->email;
        $now = now();

        $existing = DB::table('tokens')->where('email', $email)->first();

        if ($existing && $existing->count >= 3 && $existing->created_at > $now->subMinutes(10)) {
            return back()->withErrors(['email' => 'Bạn đã yêu cầu OTP quá 3 lần trong 10 phút. Vui lòng thử lại sau.']);
        }

        $otp = rand(100000, 999999);

        if ($existing) {
            DB::table('tokens')
                ->where('email', $email)
                ->update([
                    'token' => $otp,
                    'expiry' => $now->addMinutes(5),
                    'count' => $existing->count + 1,
                    'created_at' => $now,
                ]);
        } else {
            DB::table('tokens')->insert([
                'email' => $email,
                'token' => $otp,
                'expiry' => $now->addMinutes(5),
                'count' => 1,
                'created_at' => $now,
            ]);
        }

        Mail::to($email)->send(new ResetOtpMail($otp));

        // ✅ Redirect sang trang nhập OTP + mật khẩu
        return redirect()->route('password.reset')->with([
            'success' => 'Mã OTP đã được gửi tới email của bạn.',
            'email' => $email, // Gửi sẵn email để autofill
        ]);
    }
    public function verifyResetOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric',
            'password' => 'required|min:6|confirmed',
        ]);

        $record = DB::table('tokens')
            ->where('email', $request->email)
            ->where('token', $request->otp)
            ->where('expiry', '>', now())
            ->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Mã OTP không hợp lệ hoặc đã hết hạn.']);
        }

        // Cập nhật mật khẩu
        DB::table('users')->where('email', $request->email)->update([
            'password' => bcrypt($request->password),
        ]);

        // Xoá token đã dùng
        $user = User::where('email', $request->email)->first();

        // ✅ Tự động đăng nhập
        Auth::login($user);

        // Xoá token đã dùng
        DB::table('tokens')->where('email', $request->email)->delete();

        return redirect()->route('home')->with('success', 'Bạn đã đặt lại mật khẩu và đăng nhập thành công!');

    }
}
