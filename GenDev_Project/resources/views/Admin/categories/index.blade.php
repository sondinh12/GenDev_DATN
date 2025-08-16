@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Danh mục')

@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Danh sách Danh mục</h5>
            <form method="GET" style="max-width: 300px; width: 100%;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm danh mục sản phẩm..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-secondary">Tìm</button>
                </div>
            </form>
        </div>
        <div class="card-body py-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary mb-3"><i class="fas fa-plus me-1"></i>Thêm mới sản phẩm</a>
            <a href="{{ route('categories.trash') }}" class="btn btn-outline-danger mb-3 float-end position-relative">
                <i class="fa fa-trash me-1"></i>Thùng rác
                @if(isset($trashedCount) && $trashedCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $trashedCount }}
                    </span>
                @endif
            </a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $cate)
                        <tr>
                            <td>{{ $cate->id }}</td>
                            <td>{{ $cate->name }}</td>
                            <td>
                                <span class="badge {{ $cate->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $cate->status == 1 ? 'Hoạt động' : 'Ngừng hoạt động' }}
                                </span>
                            </td>
                            <td>
                                <img src="{{ asset('storage/' . $cate->image) }}" alt="{{ $cate->name }}" width="60"
                                    class="rounded border">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('categories.edit', $cate->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>

                                <form action="{{ route('categories.destroy', $cate->id) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục {{ $cate->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i> Xoá
                                    </button>
                                </form>

                                <a href="{{ route('admin.categories_minis.index', ['id' => $cate->id]) }}"
                                    class="btn btn-sm btn-info">
                                    <i class="fas fa-sitemap"></i> Danh mục con
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $categories->links() }}
        </div>
    </div>

@endsection
