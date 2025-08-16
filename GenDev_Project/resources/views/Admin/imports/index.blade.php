@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý nguồn nhập hàng')

@section('content')
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <form action="{{ route('admin.imports.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control"
                placeholder="Tìm theo tên nhà cung cấp..."
                value="{{ request('keyword') }}">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
    </form>
    <h2>Nguồn nhập</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.imports.create') }}" class="btn btn-outline-primary">➕ Thêm</a>

        <a href="{{ route('admin.imports.trash') }}" class="btn btn-outline-secondary">🗑 Thùng rác</a>
    </div>
    
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
                            <form action="{{ route('admin.imports.destroy', $import->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa phiếu này không?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">🗑 Xóa</button>
                            </form>
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