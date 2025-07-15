@extends('Admin.layouts.master')

@section('title')
Sản phẩm đã xoá mềm
@endsection

@section('topbar-title')
Products Trash
@endsection

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh sách sản phẩm đã xoá mềm</h2>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Ảnh</th>
                <th>Ngày xoá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? '' }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="60">
                        @endif
                    </td>
                    <td>{{ $product->deleted_at }}</td>
                    <td>
                        <form action="{{ route('products.restore', $product->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                        </form>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Xác nhận xoá vĩnh viễn?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xoá vĩnh viễn</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Không có sản phẩm nào trong thùng rác.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
