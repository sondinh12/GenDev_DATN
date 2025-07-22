@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Người dùng')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <!-- Flash Message -->
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @elseif(session('notification'))
            <div class="alert alert-warning">{{ session('notification') }}</div>
            @endif

            <div class="card">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Danh sách người dùng</h5>
                        </div>
                        <div class="col-auto">
                            <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Tìm kiếm theo tên..." value="{{ request('search') }}">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
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
                                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('storage/images/default-avatar.png') }}"
                                                alt="{{ $user->name }}" class="rounded-circle me-2" width="40"
                                                height="40" style="object-fit: cover;">
                                            <div>
                                                <div class="fw-medium">{{ $user->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @php
                                        $roleName = $user->getRoleNames()->first();
                                        $roleLabel = match($roleName) {
                                        'admin' => ['label' => 'Admin', 'class' => 'success'],
                                        'staff' => ['label' => 'Nhân viên', 'class' => 'primary'],
                                        'user' => ['label' => 'Người dùng', 'class' => 'secondary'],
                                        default => ['label' => 'Không rõ', 'class' => 'dark'],
                                        };
                                        @endphp
                                        <span class="badge bg-{{ $roleLabel['class'] }}">{{ $roleLabel['label']
                                            }}</span>
                                    </td>
                                    <td>
                                        @if($user->status == 1)
                                        <span class="badge bg-success">Hoạt động</span>
                                        @else
                                        <span class="badge bg-danger">Khóa</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-info"
                                            title="Xem chi tiết">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        @php $currentUser = auth()->user(); @endphp

                                        @if($currentUser->hasRole('admin') && $currentUser->id !== $user->id)
                                        <!-- Sửa vai trò -->
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editRoleModal-{{ $user->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endif

                                        @if($currentUser->hasRole('admin') && $currentUser->id !== $user->id &&
                                        !$user->hasRole('admin'))
                                        @if($user->status == 1)
                                        <form action="{{ route('admin.users.ban', $user->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Bạn có chắc muốn cấm người dùng này?')">
                                            @csrf
                                            <button class="btn btn-warning btn-sm">
                                                <i class="fas fa-user-slash"></i> Cấm
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{ route('admin.users.unban', $user->id) }}" method="POST"
                                            class="d-inline"
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
                                                    <h5 class="modal-title" id="editRoleModalLabel-{{ $user->id }}">Sửa
                                                        quyền: {{ $user->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Đóng"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="role-{{ $user->id }}">Vai trò</label>
                                                        <select name="role" id="role-{{ $user->id }}" class="form-control">
                                                            <option value="0" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                                                            <option value="1" {{ $user->hasRole('staff') ? 'selected' : '' }}>Nhân viên</option>
                                                            <option value="2" {{ $user->hasRole('user') ? 'selected' : '' }}>Người dùng</option>
                                                        </select>
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
@endsection