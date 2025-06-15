@extends('admin.layouts.master')

@section('title')
Tạo thuộc tính
@endsection

@section('topbar-title')
Tạo thuộc tính mới
@endsection

@section('content')
<div class="container">
    <h2>Thêm Thuộc Tính Mới</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <form action="{{ route('admin.attributes.store') }}" method="POST">

        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên thuộc tính</label>
            <input type="text" name="name" id="name" class="form-control"  value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="values" class="form-label">Giá trị (cách nhau bởi dấu phẩy)</label>
            <input type="text" name="values" id="values" class="form-control" value="{{ old('values') }}">
            <small class="form-text text-muted">VD: Đỏ, Xanh, Vàng</small>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.attributes.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
