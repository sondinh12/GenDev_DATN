<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPasswordMail;

trait SendsPasswordResetEmails
{
    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->email;
        $token = Str::random(64);
        $expiry = now()->addHours(24); // Token expires in 24 hours

        // Store token in database
        DB::table('tokens')->insert([
            'email' => $email,
            'token' => $token,
            'expiry' => $expiry,
            'count' => 0,
            'created_at' => now()
        ]);

        // Send email
        Mail::to($email)->send(new ResetPasswordMail($token));

        return back()->with('status', 'Chúng tôi đã gửi email hướng dẫn đặt lại mật khẩu cho bạn!');
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $tokenData = DB::table('tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->where('expiry', '>', now())
            ->first();

        if (!$tokenData) {
            return back()->withErrors(['email' => 'Token không hợp lệ hoặc đã hết hạn.']);
        }

        // Update password
        DB::table('users')
            ->where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        // Delete used token
        DB::table('tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->delete();

        return redirect()->route('login')->with('status', 'Mật khẩu của bạn đã được đặt lại thành công!');
    }
}
