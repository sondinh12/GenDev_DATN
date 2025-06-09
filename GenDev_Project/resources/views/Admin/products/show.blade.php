@extends('admin.layouts.master')

@section('title')
    Show
@endsection

@section('topbar-title')
    Product
@endsection

@section('css')
@endsection

@section('content')
    <h2>Sản phẩm: {{ $product->name }}</h2>

    <p><strong>Danh mục:</strong> {{ $product->category->name ?? 'Không có' }}</p>
    <p><strong>Giá gốc:</strong> {{ number_format($product->price) }}đ</p>
    <p><strong>Giá KM:</strong> {{ number_format($product->sale_price) }}đ</p>
    <p><strong>Mô tả:</strong> {{ $product->description }}</p>

    {{-- Ảnh đại diện --}}
    <div>
        <strong>Ảnh đại diện:</strong><br>
        <img src="{{ asset('storage/' . $product->image) }}" width="200">
    </div>

    {{-- Ảnh thư viện --}}
    <h4>Thư viện ảnh</h4>
    <div style="display: flex; gap: 10px;">
        @foreach ($product->galleries as $gallery)
            <img src="{{ asset('storage/' . $gallery->image_path) }}" width="100">
        @endforeach
    </div>

    {{-- Biến thể --}}
    @if ($product->variants->count())
        <h4>Danh sách biến thể</h4>
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>Giá</th>
                    <th>KM</th>
                    <th>SL</th>
                    <th>Trạng thái</th>
                    <th>Thuộc tính</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->variants as $variant)
                    <tr>
                        <td>{{ number_format($variant->price) }}đ</td>
                        <td>{{ number_format($variant->sale_price) }}đ</td>
                        <td>{{ $variant->quantity }}</td>
                        <td>{{ $variant->status ? 'Hiện' : 'Ẩn' }}</td>
                        <td>
                            @foreach ($variant->variantAttributes as $attr)
                                {{ $attr->attribute->name }}: {{ $attr->value->value }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p><em>Sản phẩm không có biến thể.</em></p>
    @endif
    <a href="{{route('products.index')}}" class="btn btn-primary">Quay lại</a>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
