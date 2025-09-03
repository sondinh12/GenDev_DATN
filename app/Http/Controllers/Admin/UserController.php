<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserBanned;
use App\Mail\UserUnbanned;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%");
        }

        if ($request->filled('role')) {
            $role = $request->get('role');
            // Lấy user id theo role từ bảng model_has_roles
            $userIds = DB::table('model_has_roles')
                ->where('role_id', function ($q) use ($role) {
                    $q->select('id')->from('roles')->where('name', $role)->limit(1);
                })
                ->pluck('model_id');
            $query->whereIn('id', $userIds);
        }

        $users = $query->paginate(10)->appends($request->all());
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();

        // auth()->loginUsingId(1);

        return view('admin.users.index', compact('users', 'roles', 'permissions'));
    }
    public function store(Request $request)
    {
        // Lấy danh sách role name từ DB, tự động map index
        $roles = Role::orderBy('id')->pluck('name')->toArray();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^\\d{8,20}$/',
            'gender' => 'required|in:Nam,Nữ,Khác',
            'password' => 'required|string|min:8',
            'role' => 'required|in:' . implode(',', $roles),
            'status' => 'required|in:0,1',
        ]);

        $roleIndex = array_search($request->role, $roles); // Lưu số thứ tự role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'role' => $roleIndex,
        ]);

        // Gán vai trò Spatie
        $user->assignRole($request->role);

        return redirect()->route('admin.users.index')->with('success', 'Thêm tài khoản thành công!');
    }
    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.users.show', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        $currentUser = Auth::user();
        // Đảm bảo $currentUser là instance của User có trait HasRoles
        if (method_exists($currentUser, 'hasRole')) {
            if (!$currentUser->hasRole('admin')) {
                abort(403, 'Bạn không có quyền thay đổi vai trò người dùng.');
            }
        } else {
            abort(403, 'Không xác định được quyền người dùng.');
        }

        // Không cho phép admin sửa chính mình
        if ($currentUser->id === $user->id) {
            return redirect()->back()->with('error', 'Bạn không thể tự thay đổi vai trò của chính mình.');
        }



        // Lấy danh sách role name từ DB, tự động map index
        $roles = Role::orderBy('id')->pluck('name')->toArray();
        $request->validate([
            'role' => 'required|in:' . implode(',', $roles),
            // permissions là optional, là mảng các tên quyền
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        $roleIndex = array_search($request->role, $roles);
        $user->syncRoles($request->role);
        $user->role = $roleIndex;
        $user->save();

        // Xử lý gán quyền riêng cho user
        if ($request->has('permissions')) {
            $user->syncPermissions($request->permissions);
        } else {
            // Nếu không chọn quyền riêng, xóa hết quyền riêng (chỉ giữ quyền theo role)
            $user->syncPermissions([]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Đã cập nhật vai trò và quyền người dùng.');
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
