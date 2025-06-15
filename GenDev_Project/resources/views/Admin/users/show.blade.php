@extends('admin.layouts.master-without-page-title')

@section('title', 'Chi tiết người dùng')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin chi tiết người dùng</h4>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary float-right">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            @if($user->avatar)
                            <img src="{{ asset($user->avatar) }}" alt="Avatar" class="img-fluid rounded-circle"
                                style="max-width: 200px;">
                            @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar"
                                class="img-fluid rounded-circle" style="max-width: 200px;">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 200px;">ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Họ và tên</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại</th>
                                    <td>{{ $user->phone ?? 'Chưa cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ</th>
                                    <td>{{ $user->address ?? 'Chưa cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Giới tính</th>
                                    <td>{{ $user->gender ?? 'Chưa cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Vai trò</th>
                                    <td>
                                        @if($user->role == 1)
                                        <span class="badge badge-primary">Người dùng</span>
                                        @elseif($user->role == 2)
                                        <span class="badge badge-success">Admin</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Trạng thái</th>
                                    <td>
                                        @if($user->status == 1)
                                        <span class="badge badge-success">Hoạt động</span>
                                        @else
                                        <span class="badge badge-danger">Khóa</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Ngày tạo</th>
                                    <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Cập nhật lần cuối</th>
                                    <td>{{ $user->updated_at->format('d/m/Y H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection