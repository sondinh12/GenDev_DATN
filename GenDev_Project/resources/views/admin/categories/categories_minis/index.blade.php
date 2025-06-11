@extends('admin.layouts.master-without-page-title')

@section('title', 'Danh mục con')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại danh mục
            </a>
        </div>
        <a href="{{ route('categories_minis.create',$categories->id) }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Thêm danh mục con
        </a>
    </div>

    <h4 class="mt-3 mb-3">
        📁 Danh mục con của: <strong class="text-primary">{{ $categories->name }}</strong>
    </h4>

    <form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..."
            value="{{ $_GET['search'] ?? '' }}">
        <button type="submit" class="btn btn-outline-secondary">Tìm kiếm</button>
    </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tên danh mục con</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($minis as $mini)
                            <tr>
                                <td>{{ $mini->id }}</td>
                                <td>{{ $mini->name }}</td>
                                <td>
                                    <img src="{{asset('storage/'.$mini->image)}}" alt="{{ $mini->name }}" width="60" class="rounded border">
                                </td>
                                <td>
                                    @if ($mini->status)
                                        <span class="badge bg-success">Hiển thị</span>
                                    @else
                                        <span class="badge bg-secondary">Ẩn</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i> Sửa</a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $minis->links() }}
    </div>
</div>
@endsection
