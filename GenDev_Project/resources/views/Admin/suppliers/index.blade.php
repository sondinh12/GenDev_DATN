@extends('Admin.layouts.master-without-page-title')

@section('title', 'Nhà cung cấp')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
    <form action="{{ route('admin.suppliers.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control"
                placeholder="Nhập tên nhà cung cấp..."
                value="{{ request('keyword') }}">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
    </form>
    <h2>Nhà cung cấp</h2>
    <a href="{{route('admin.suppliers.create')}}" class="btn btn-outline-primary mb-3">Thêm</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Hành động</th>
            </tr>
        </thead>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Danh sách nhà cung cấp</h3>
            <form action="{{ route('admin.suppliers.index') }}" method="GET" style="max-width: 300px; width: 100%;">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" 
                        placeholder="Nhập tên nhà cung cấp..."
                        value="{{ request('keyword') }}">
                    <button type="submit" class="btn btn-outline-secondary">Tìm</button>
                </div>
            </form>
        </div>

        <div class="card-body py-3 d-flex justify-content-between align-items-center">
            <a href="{{route('admin.suppliers.create')}}" class="btn btn-outline-primary mb-3">
                <i class="fas fa-plus me-1"></i>Thêm mới nhà cung cấp</a>
        </div>

        <div class="card-body table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th scope="col" class="text-center">Hành động</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{$supplier->id}}</td>
                        <td>{{$supplier->name}}</td>
                        <td>{{$supplier->email}}</td>
                        <td>{{$supplier->phone}}</td>
                        <td>{{$supplier->address}}</td>
                        <td>{{$supplier->created_at}}</td>
                        <td>{{$supplier->updated_at}}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{route('admin.suppliers.edit', $supplier->id)}}" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="fas fa-edit"></i> Sửa</a>
                                <form action="{{route('admin.suppliers.destroy', $supplier->id)}}" method="post"
                                    onclick="return confirm('Bạn chác chắn muốn xóa chứ')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger me-1">
                                        <i class="fas fa-trash-alt"></i> Xoá</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

@endsection