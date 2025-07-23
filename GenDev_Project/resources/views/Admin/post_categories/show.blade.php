@extends('Admin.layouts.master-without-page-title')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Chi tiết danh mục bài viết</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên danh mục:</label>
                        <div>{{ $category->name }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Ngày tạo:</label>
                        <div>{{ $category->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('post-categories.index') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 