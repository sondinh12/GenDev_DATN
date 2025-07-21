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
                            <a href="{{route('admin.suppliers.edit', $supplier->id)}}" class="btn btn-info">Sửa</a>
                            <form action="{{route('admin.suppliers.destroy', $supplier->id)}}" method="post"
                                onclick="return confirm('Bạn chác chắn muốn xóa chứ')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection