@extends('admin.layouts.master-without-page-title')

@section('title', 'Quản lý Người dùng')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Danh sách người dùng</h4>

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

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role == 1)
                        <span class="badge badge-primary">Người dùng</span>
                        @elseif($user->role == 0)
                        <span class="badge badge-success">Admin</span>
                        @endif
                    </td>
                    <td>
                        @if($user->status == 1)
                        <span class="badge badge-success">Hoạt động</span>
                        @else
                        <span class="badge badge-danger">Khóa</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Xem
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Không có dữ liệu</td>
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
@endsection