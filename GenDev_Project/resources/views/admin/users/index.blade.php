@extends('admin.layouts.master-without-page-title')

@section('title', 'Quản lý Người dùng')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Danh sách người dùng</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            {{-- Lặp qua người dùng --}}
        </tbody>
    </table>
</div>
@endsection
