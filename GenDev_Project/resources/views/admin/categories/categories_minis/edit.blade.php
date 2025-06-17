@extends('admin.layouts.master-without-page-title')

@section('title', 'Sửa danh mục con')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">✏️ Sửa danh mục con cho {{ $categories->name }}</h4>
        <a href="{{ route('categories_minis.index', $categories->id) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại danh sách
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            {{-- Hiển thị lỗi validate --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Hiển thị thông báo thành công --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('categories_minis.update', ['category_id' => $categories->id, 'id' => $categoryMini->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Danh mục cha (hiển thị tên và lưu ID trong input ẩn) --}}
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Danh mục cha</label>
                    <input type="hidden" name="parent_id" value="{{ $categories->id }}">
                    <input type="text" class="form-control" value="{{ $categories->name }}" disabled>
                </div>

                {{-- Tên danh mục con --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Tên danh mục con</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $categoryMini->name) }}" required>
                </div>

                {{-- Ảnh --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh đại diện</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if($categoryMini->image)
                        <img src="{{ asset('storage/'.$categoryMini->image) }}" alt="Ảnh hiện tại" width="100" class="mt-2">
                    @endif
                </div>

                {{-- Nút submit --}}
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Cập nhật
                </button>
                <a href="{{ route('categories_minis.index', ['id'=> $categories->id]) }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Huỷ
                </a>
            </form>
        </div>
    </div>
</div>
@endsection