@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý nguồn nhập hàng')

@section('content')
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Nguồn nhập</h3>
            <form action="{{ route('admin.imports.index') }}" method="GET" style="max-width: 300px; width: 100%;">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control"
                    placeholder="Tìm theo tên nhà cung cấp..."
                        value="{{ request('keyword') }}">
                    <button type="submit" class="btn btn-outline-secondary">Tìm</button>
                </div>
            </form>
        </div>

        <div class="card-body py-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.imports.create') }}" class="btn btn-outline-primary mb-3">
                <i class="fas fa-plus me-1"></i> Thêm mới</a>
            <a href="{{ route('admin.imports.trash') }}" class="btn btn-outline-danger mb-3 float-end position-relative">
                <i class="fa fa-trash me-1"></i>Thùng rác</a>
        </div>

        <div class="card-body table-responsive">
        <table class="table table-bordered align-middle text-center">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên nhà cung cấp</th>
                <th scope="col">Ngày nhập</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col" class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($imports as $import)
                <tr>
                    <td>{{$import->id}}</td>
                    <td>{{$import->supplier->name}}</td>
                    <td>{{$import->import_date}}</td>
                    <td>{{ number_format($import->total_cost, 0, ',', '.') }} VNĐ</td>
                    <td>{{$import->created_at}}</td>
                    <td>
                        <a href="{{route('admin.imports.show',$import->id)}}" class="btn btn-sm btn-outline-warning me-1"><i class="fas fa-eye"></i> Xem</a>
                        @if ($import->status == 0)
                            <a href="{{route('admin.imports.edit',$import->id)}}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i> Sửa</a>
                            <form action="{{ route('admin.imports.destroy', $import->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa phiếu này không?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i> Xóa</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $imports->links() }}
    </div>
    </div>
@endsection
