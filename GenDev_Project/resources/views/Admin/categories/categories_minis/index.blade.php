@extends('Admin.layouts.master-without-page-title')

@section('title', 'Danh mục con')

@section('content')

{{-- @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}

<div class="card">
    <div style="margin-left: 20px; margin-top: 20px;">
        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại danh mục
        </a>
    </div>

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mt-3 mb-3">
            📁 Danh mục con của: <strong class="text-primary">{{ $categories->name }}</strong>
        </h4>
        <form method="GET" style="max-width: 300px; width: 100%;">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm danh mục con..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary">Tìm</button>
            </div>
        </form>
    </div> <br>
    

    <div class="card-body py-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.categories_minis.create',[ 'id'=>$categories->id]) }}" class="btn btn-outline-primary mb-3"><i
                    class="fas fa-plus me-1"></i>Thêm danh mục con</a>

        <a href="{{ route('categories_mini.trash', ['category_id' => $category_id]) }}" class="btn btn-outline-danger position-relative">
            <i class="fa fa-trash me-1"></i> Thùng rác
            @if(isset($trashedCount) && $trashedCount > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.9em;">
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
                            <a href="{{ route('categories_minis.edit', ['category_id' => $categories->id, 'id' => $mini->id]) }}" class="btn btn-sm btn-warning me-1"><i class="fas fa-edit"></i> Sửa</a>

                            <form action="{{ route('categories_minis.destroy', ['category_id' => $category_id, 'id' => $mini->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục con {{ addslashes($mini->name) }} này không?')">
                                    <i class="fa fa-trash"></i> Xoá
                                </button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $minis->links() }}
    </div>
</div>

@endsection
@push('scripts')
{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Flash Message --}}
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif
@endpush
