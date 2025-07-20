<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Get the post-login redirect path.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::user();
        if ($user && $user->hasAnyRole(['admin', 'staff'])) {
            return '/admin';
        }
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function attemptLogin(Request $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user) {

            // Chặn đăng nhập nếu user đã bị ban vĩnh viễn (status = 0)
            if ($user->status == 0) {
                return false;
            }

            if ($user->is_banned) {
                // Nếu đã hết hạn ban, tự động gỡ ban
                if ($user->banned_until && now()->gt($user->banned_until)) {
                    $user->is_banned = false;
                    $user->banned_until = null;
                    $user->violation_count = 0;
                    $user->save();
                    // Tải lại thông tin user sau khi cập nhật
                    $user = $user->fresh();
                } else {
                    // Nếu chưa hết hạn, không cho login
                    throw ValidationException::withMessages([
                        'email' => ['Tài khoản bị tạm khóa đến ' . Carbon::parse($user->banned_until)->format('d/m/Y H:i')],
                    ]);
                    return false;
                }
            }
        }

        // Tiến hành login nếu không bị ban
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }
}
