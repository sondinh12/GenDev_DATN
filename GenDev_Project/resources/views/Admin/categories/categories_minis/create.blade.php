@extends('Admin.layouts.master-without-page-title')

@section('title', 'Thêm danh mục con')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">➕ Thêm danh mục con mới cho {{ $categories->name }}</h4>
        <a href="{{ route('admin.categories_minis.index',$categories->id) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại danh sách
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            {{-- Hiển thị lỗi validate --}}
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}


            {{-- Hiển thị thông báo thành công
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}

            <form action="{{ route('admin.categories_minis.store',['id' => $categories->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Danh mục cha (hiển thị tên và lưu ID trong input ẩn) --}}
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Danh mục cha</label>
                    <input type="hidden" name="parent_id" value="{{ $categories->id }}">
                    <input type="text" class="form-control" value="{{ $categories->name }}" disabled>
                </div>

                {{-- Tên danh mục con --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Tên danh mục con</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
                </div>

                {{-- Ảnh --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh đại diện</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                {{-- Nút submit --}}
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Thêm mới
                </button>
                <a href="{{ route('admin.categories_minis.index',['id'=> $categories->id]) }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Huỷ
                </a>
            </form>
        </div>
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

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            html: `{!! implode('<br>', $errors->all()) !!}`, 
            confirmButtonColor: '#d33',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif
@endpush