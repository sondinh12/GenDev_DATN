@extends('admin.layouts.master-without-page-title')

@section('title', 'Quản lý Danh mục')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📂 Danh sách danh mục</h4>
        <a href="{{route('categories.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Thêm danh mục</a>
    </div>
    
    <form method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tim kiem...."
            value="{{request('search')}}">
            <button type="submit" class="btn btn-outline-secondary">Tim kiem</button>
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Status</th>
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
                                    <img src="{{asset('storage/'.$cate->image)}}" alt="{{ $cate->name }}" width="60" class="rounded border">
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-warning me-1">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger me-1">
                                        <i class="fas fa-trash-alt"></i> Xoá
                                    </a>
                                    <a href="{{ route('admin.categories_minis.index',['id'=>$cate->id]) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-sitemap"></i> Danh mục con
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $categories->links() }}
    </div>
</div>
@endsection