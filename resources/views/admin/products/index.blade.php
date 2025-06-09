@extends('admin.layouts.master-without-page-title')

@section('title', 'Quản lý Sản phẩm')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Danh sách sản phẩm</h4>
    <a href="#" class="btn btn-primary mb-3">Thêm sản phẩm mới</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        @if($product->variants->first())
                            {{ number_format($product->variants->first()->price, 0, ',', '.') }} đ
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $product->category->name ?? 'Không có' }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Ảnh" width="60">
                    </td>
                    <td>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="#" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có sản phẩm nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
