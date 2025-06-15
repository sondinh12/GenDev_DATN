@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Người dùng')

@section('content')
    <div class="container-fluid">
        <h4 class="mb-3">Danh sách người dùng</h4>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @elseif(session('notification'))
            <div class="alert alert-warning">{{ session('notification') }}</div>
        @endif

        <!-- Search Form -->
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('admin.users.index') }}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên..."
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Users Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
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
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @php
                                    $roleLabel = match ($user->role) {
                                        0 => ['label' => 'Admin', 'class' => 'success'],
                                        1 => ['label' => 'Staff', 'class' => 'primary'],
                                        2 => ['label' => 'Người dùng', 'class' => 'secondary'],
                                        default => ['label' => 'Không rõ', 'class' => 'dark'],
                                    };
                                @endphp
                                <span class="badge badge-{{ $roleLabel['class'] }}">{{ $roleLabel['label'] }}</span>
                            </td>
                            <td>
                                @if($user->status == 1)
                                    <span class="badge badge-success">Hoạt động</span>
                                @else
                                    <span class="badge badge-danger">Khóa</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Xem
                                </a>

                                @php
                                    $currentUser = auth()->user();
                                @endphp
                                @if(auth()->user()->role === 0 && auth()->id() !== $user->id)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editRoleModal-{{ $user->id }}">
                                        <i class="fas fa-edit"></i> Sửa quyền
                                    </button>
                                @endif

                                @if($currentUser->id !== $user->id && $currentUser->role < $user->role)
                                    @if($user->status == 1)
                                        <form action="{{ route('admin.users.ban', $user->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Bạn có chắc muốn cấm người dùng này?')">
                                            @csrf
                                            <button class="btn btn-warning btn-sm">
                                                <i class="fas fa-user-slash"></i> Cấm
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.users.unban', $user->id) }}" method="POST" class="d-inline"
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
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Không có dữ liệu người dùng.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $users->appends(request()->query())->links() }}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editRoleModal-{{ $user->id }}" tabindex="-1"
        aria-labelledby="editRoleModalLabel-{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRoleModalLabel-{{ $user->id }}">Sửa quyền: {{ $user->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="role-{{ $user->id }}">Vai trò</label>
                            <select name="role" id="role-{{ $user->id }}" class="form-control">
                                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Staff</option>
                                <option value="2" {{  $user->role == 2 ? 'selected' : '' }}>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection