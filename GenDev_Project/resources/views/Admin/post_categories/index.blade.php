@extends('Admin.layouts.master-without-page-title')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">@if(isset($isTrash) && $isTrash) Thùng rác danh mục bài viết @else Danh sách danh mục bài viết @endif</h2>
        <div>
            @if(isset($isTrash) && $isTrash)
                <a href="{{ route('post-categories.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
            @else
                <a href="{{ route('post-categories.trash') }}" class="btn btn-danger me-2">Thùng rác</a>
                <a href="{{ route('post-categories.create') }}" class="btn btn-success">+ Thêm danh mục</a>
            @endif
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped align-middle table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $index => $category)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at ? $category->created_at->format('d/m/Y') : '' }}</td>
                        <td>
                            @if(isset($isTrash) && $isTrash)
                                <form action="{{ route('post-categories.restore', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm me-1">Khôi phục</button>
                                </form>
                                <form action="{{ route('post-categories.forceDelete', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa vĩnh viễn danh mục này?')">Xóa vĩnh viễn</button>
                                </form>
                            @else
                                <a href="{{ route('post-categories.show', $category->id) }}" class="btn btn-info btn-sm me-1">Xem</a>
                                <a href="{{ route('post-categories.edit', $category->id) }}" class="btn btn-warning btn-sm me-1">Sửa</a>
                                <form action="{{ route('post-categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $categories->links() }}
    </div>
</div>
@endsection 