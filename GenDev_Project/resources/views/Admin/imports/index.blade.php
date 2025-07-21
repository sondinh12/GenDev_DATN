@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý nguồn nhập hàng')

@section('content')
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <h2>Nguồn nhập</h2>
    <a href="{{route('admin.imports.create')}}" class="btn btn-outline-primary mb-3">Thêm</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên nhà cung cấp</th>
                <th>Ngày nhập</th>
                <th>Tổng tiền</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($imports as $import)
                <tr>
                    <td>{{$import->id}}</td>
                    <td>{{$import->supplier->name}}</td>
                    <td>{{$import->import_date}}</td>
                    <td>{{$import->total_cost}}</td>
                    <td>{{$import->created_at}}</td>
                    <td>
                        <a href="{{route('admin.imports.show',$import->id)}}" class="btn btn-primary">Xem</a>
                        @if ($import->status == 0)                          
                            <a href="{{route('admin.imports.edit',$import->id)}}" class="btn btn-info">Sửa</a>
                            <a href="{{route('admin.imports.destroy',$import->id)}}" class="btn btn-danger">Xóa</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $imports->links() }}
    </div>
@endsection