@extends('Admin.layouts.master-without-page-title')

@section('title', 'Nhà cung cấp')

@section('content')
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
                        <a href="{{route('admin.suppliers.show',$supplier->id)}}" class="btn btn-primary">Xem</a>
                        <a href="{{route('admin.suppliers.edit',$supplier->id)}}" class="btn btn-info">Sửa</a>
                        <a href="{{route('admin.suppliers.destroy',$supplier->id)}}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection