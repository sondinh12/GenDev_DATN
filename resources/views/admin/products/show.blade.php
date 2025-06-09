@extends('admin.layouts.master-without-page-title')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="container-fluid">
    <h2>{{ $product->name }}</h2>

    <div class="mb-3">
        <strong>Danh mục:</strong> {{ $product->category->name ?? 'Không có' }} <br>
        <strong>Trạng thái:</strong> {{ $product->status ? 'Hiển thị' : 'Ẩn' }} <br>
        <strong>Mô tả:</strong> {!! nl2br(e($product->description)) !!}
    </div>

    <div class="mb-3">
        <strong>Ảnh chính:</strong><br>
        <img src="{{ asset('storage/' . $product->image) }}" width="150">
    </div>

    <div class="mb-3">
        <strong>Thư viện ảnh:</strong><br>
        @foreach($product->galleries as $gallery)
            <img src="{{ asset('storage/' . $gallery->image) }}" width="100" class="me-2">
        @endforeach
    </div>

    <hr>

    <h4>Biến thể</h4>
    @foreach($product->variants as $variant)
        <div class="border p-3 mb-2">
            <strong>Giá:</strong> {{ number_format($variant->price, 0, ',', '.') }} đ <br>
            <strong>Giá khuyến mãi:</strong> {{ number_format($variant->sale_price, 0, ',', '.') }} đ <br>
            <strong>Số lượng:</strong> {{ $variant->quantity }} <br>
            <strong>Trạng thái:</strong> {{ $variant->status ? 'Hiển thị' : 'Ẩn' }} <br>

            <strong>Thuộc tính:</strong>
            <ul>
                @foreach($variant->attributes as $attr)
                    <li>
                        {{ $attr->attribute->name }}: {{ $attr->value->value }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection
