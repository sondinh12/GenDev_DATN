<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd('Middleware chạy rồi nhé!');
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return $next($request); // Bỏ qua ban với admin
            }

            if ($user->is_banned) {
                if ($user->banned_until && now()->gt($user->banned_until)) {
                    // Gỡ ban tự động
                    $user->is_banned = false;
                    $user->banned_until = null;
                    $user->violation_count = 0;
                    $user->save();
                } else {
                    Auth::logout();
                    return redirect()->route('login')->withErrors('Tài khoản bị tạm khóa đến ' . $user->banned_until->format('d/m/Y H:i'));
                }
            }
        } 
        return $next($request);
    }
}  