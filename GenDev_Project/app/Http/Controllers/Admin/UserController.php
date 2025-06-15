<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserBanned;
use App\Mail\UserUnbanned;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $users = $query->paginate(10);
        auth()->loginUsingId(2);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $currentUser = Auth::user();

        // Chỉ admin mới được phép sửa role
        if ($currentUser->role !== 0) {
            abort(403, 'Bạn không có quyền thay đổi vai trò người dùng.');
        }

        // Không cho phép admin sửa chính mình
        if ($currentUser->id === $user->id) {
            return redirect()->back()->with('error', 'Bạn không thể tự thay đổi vai trò của chính mình.');
        }

        // Validate và cập nhật role
        $request->validate([
            'role' => 'required|in:0,1,2',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Đã cập nhật vai trò người dùng.');
    }
    public function ban(User $user)
    {
        $currentUser = Auth::user();

        if ($currentUser->id === $user->id) {
            return redirect()->back()->with('error', 'Bạn không thể tự ban chính mình.');
        }

        if ($currentUser->role >= $user->role) {
            return redirect()->back()->with('error', 'Bạn không có quyền ban người dùng này.');
        }

        $user->status = 0;
        $user->save();

        // Gửi email thông báo bị ban
        Mail::to($user->email)->send(new UserBanned($user));

        return redirect()->back()->with('success', 'Đã ban người dùng thành công.');
    }

    public function unban(User $user)
    {
        $currentUser = Auth::user();

        if ($currentUser->role >= $user->role && $user->status === 1) {
            return redirect()->back()->with('error', 'Bạn không có quyền mở ban người dùng này.');
        }

        $user->status = 1;
        $user->save();

        // Gửi email thông báo mở ban
        Mail::to($user->email)->send(new UserUnbanned($user));

        return redirect()->back()->with('success', 'Đã mở ban người dùng thành công.');
    }
}
