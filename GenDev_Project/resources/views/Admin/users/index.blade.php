@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Người dùng')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <!-- Flash Message -->
                {{-- @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @elseif(session('notification'))
                    <div class="alert alert-warning">{{ session('notification') }}</div>
                @endif --}}

                <div class="card">
                    <div class="card-header bg-white py-3">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                            <h5 class="mb-0 flex-shrink-0">Danh sách người dùng</h5>
                            <form action="{{ route('admin.users.index') }}" method="GET"
                                class="d-flex align-items-center gap-2 flex-grow-1 justify-content-center"
                                style="min-width:300px;">
                                <div class="input-group" style="min-width:180px;">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Tìm kiếm theo tên..." value="{{ request('search') }}">
                                </div>
                                <select name="role" class="form-select" style="max-width:160px">
                                    <option value="">Tất cả vai trò</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ request('role') == $role->name ? 'selected' : '' }}>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                            <a href="#" class="btn btn-primary flex-shrink-0" data-bs-toggle="modal"
                                data-bs-target="#addUserModal">
                                <i class="fa fa-plus"></i> Thêm tài khoản
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                        <th>Trạng thái</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('storage/avatar/default-avatar.png') }}"
                                                        alt="{{ $user->name }}" class="rounded-circle me-2"
                                                        width="40" height="40" style="object-fit: cover;">
                                                    <div>
                                                        <div class="fw-medium">{{ $user->name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @php
                                                    $roleName = $user->getRoleNames()->first();
                                                    $roleObj = $roles->firstWhere('name', $roleName);
                                                    $label =
                                                        $roleObj && isset($roleObj->display_name)
                                                            ? $roleObj->display_name
                                                            : ($roleObj
                                                                ? ucfirst($roleObj->name)
                                                                : 'Không rõ');
                                                    // Tự động sinh màu cho role nếu không có trường color
                                                    $defaultColors = [
                                                        'admin' => 'success',
                                                        'nhân viên' => 'primary',
                                                        'người dùng' => 'secondary',
                                                    ];
                                                    $class =
                                                        $roleObj && isset($roleObj->color) && $roleObj->color
                                                            ? $roleObj->color
                                                            : $defaultColors[$roleName] ?? 'info';
                                                    // Lấy danh sách quyền của user (bao gồm cả theo role và riêng)
                                                    $userPermissions = $user
                                                        ->getAllPermissions()
                                                        ->pluck('name')
                                                        ->toArray();
                                                @endphp
                                                <span class="badge bg-{{ $class }}" data-bs-toggle="tooltip"
                                                    data-bs-html="true"
                                                    title="@if (count($userPermissions)) <div style='min-width:180px; text-align:left;'>
                                                            <div class='fw-bold mb-1 text-dark'>Quyền:</div>
                                                            <ul class='mb-0 ps-3'>
                                                                @foreach ($userPermissions as $perm)
                                                                    <li style='font-size:13px;'>{{ $perm }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @else
                                                        <span class='text-muted'>Không có quyền</span> @endif">
                                                    {{ $label }}
                                                </span>
                                            </td>
                                            {{-- script đã được đẩy xuống cuối file qua @push('scripts') --}}
                                            <td>
                                                @if ($user->status == 1)
                                                    <span class="badge bg-success">Hoạt động</span>
                                                @else
                                                    <span class="badge bg-danger">Khóa</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.users.show', $user->id) }}"
                                                    class="btn btn-sm btn-info" title="Xem chi tiết">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                @php $currentUser = auth()->user(); @endphp

                                                @if ($currentUser->hasRole('admin') && $currentUser->id !== $user->id)
                                                    <!-- Sửa vai trò -->
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editRoleModal-{{ $user->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endif

                                                @if ($currentUser->hasRole('admin') && $currentUser->id !== $user->id && !$user->hasRole('admin'))
                                                    @if ($user->status == 1)
                                                        <form action="{{ route('admin.users.ban', $user->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Bạn có chắc muốn cấm người dùng này?')">
                                                            @csrf
                                                            <button class="btn btn-warning btn-sm">
                                                                <i class="fas fa-user-slash"></i> Cấm
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('admin.users.unban', $user->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Bạn có chắc muốn gỡ cấm người dùng này?')">
                                                            @csrf
                                                            <button class="btn btn-success btn-sm">
                                                                <i class="fas fa-user-check"></i> Gỡ cấm
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Modal Sửa Vai Trò -->
                                        <div class="modal fade" id="editRoleModal-{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="editRoleModalLabel-{{ $user->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editRoleModalLabel-{{ $user->id }}">Sửa
                                                                quyền: {{ $user->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Đóng"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group mb-2">
                                                                <label for="role-{{ $user->id }}">Vai trò</label>
                                                                <select name="role" id="role-{{ $user->id }}"
                                                                    class="form-control">
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->name }}"
                                                                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                                            {{ ucfirst($role->name) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Quyền riêng (Permissions)</label>
                                                                <div class="row">
                                                                    @foreach ($permissions as $permission)
                                                                        <div class="col-6 col-md-4">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" name="permissions[]"
                                                                                    value="{{ $permission->name }}"
                                                                                    id="perm-{{ $user->id }}-{{ $permission->id }}"
                                                                                    {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="perm-{{ $user->id }}-{{ $permission->id }}">
                                                                                    {{ $permission->name }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Hủy</button>
                                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-muted">
                                                <i class="fas fa-users fa-2x mb-2"></i>
                                                <p>Không có dữ liệu người dùng.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer bg-white py-3">
                        <div class="d-flex justify-content-center">
                            {{ $users->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Thêm Tài Khoản -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Thêm tài khoản mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Giới tính</label>
                            <select name="gender" class="form-control" required>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" required minlength="8">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Vai trò</label>
                            <select name="role" class="form-control" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $role->name == 'user' ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select name="status" class="form-control" required>
                                <option value="1" selected>Hoạt động</option>
                                <option value="0">Khóa</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // Lấy mapping role -> permissions từ backend
        window.rolePermissionsMap = @json(
            \Spatie\Permission\Models\Role::with('permissions')->get()->mapWithKeys(function ($role) {
                    return [$role->name => $role->permissions->pluck('name')->toArray()];
                }));
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tooltip
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Tự động tích quyền khi chọn vai trò trong modal sửa user
            document.querySelectorAll('[id^="role-"]').forEach(function(select) {
                select.addEventListener('change', function() {
                    var userId = this.id.replace('role-', '');
                    var roleName = this.value;
                    var permList = window.rolePermissionsMap[roleName] || [];
                    // Bỏ tích hết
                    document.querySelectorAll('#editRoleModal-' + userId +
                        ' input[name="permissions[]"]').forEach(function(cb) {
                        cb.checked = false;
                    });
                    // Tích các quyền của role
                    permList.forEach(function(permName) {
                        var cb = document.querySelector('#editRoleModal-' + userId +
                            ' input[name="permissions[]"][value="' + permName + '"]');
                        if (cb) cb.checked = true;
                    });
                });
            });
        });
    </script>
@endpush
@push('scripts')
{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Flash Message --}}
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif

@if (session('notification'))
    <script>
        Swal.fire({
            icon: 'notification',
            title: 'Thành công!',
            text: '{{ session('notification') }}',
            confirmButtonColor: '#3085d6',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif
@endpush