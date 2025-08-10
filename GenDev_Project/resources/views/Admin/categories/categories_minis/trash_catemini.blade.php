@extends('Admin.layouts.master-without-page-title')

@section('title', 'Thùng rác danh mục con')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Thùng rác danh mục</h4>
            <a href="{{ route('admin.categories_minis.index', $category_id) }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục con</th>
                        <th>Ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashed as $mini)
                        <tr>
                            <td>{{ $mini->id }}</td>
                            <td>{{ $mini->name }}</td>
                            <td>
                                @if ($mini->image)
                                    <img src="{{ asset('storage/' . $mini->image) }}" alt="{{ $mini->name }}"
                                        width="60">
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('categories_mini.restore', $mini->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                                </form>
                                <form action="{{ route('categories_mini.forceDelete', $mini->id) }}" method="POST"
                                    style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục con {{ addslashes($mini->name) }} này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa vĩnh viễn</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Không có danh mục con nào trong thùng rác.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
