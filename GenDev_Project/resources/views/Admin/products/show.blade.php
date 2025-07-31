@extends('Admin.layouts.master')

@section('title')
    Show
@endsection

@section('topbar-title')
    Product
@endsection

@section('css')
@endsection




@section(section: 'content')
<div class="py-4">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Chi tiết sản phẩm</h4>
        </div>
        <div class="card-body">
            <div class="row g-4 align-items-start">
                <div class="col-md-5 text-center">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Ảnh đại diện"
                         class="img-fluid rounded border shadow-sm mb-3" style="max-height: 250px;">
                    <p class="mb-0"><strong>Ảnh đại diện</strong></p>
                </div>

                <div class="col-md-7 fs-5">
                    <h5 class="mb-3 text-primary">Tên sản phẩm: {{ $product->name }}</h5>
                    <p><strong>Danh mục:</strong> {{ $product->category->name ?? 'Không có' }}</p>
                    <p><strong>Mô tả:</strong><br>{{ $product->description }}</p>
                </div>
            </div>

            <hr class="my-4">

            <h5>Thư viện ảnh</h5>
            <div class="row g-3">
                @forelse ($product->galleries as $gallery)
                    <div class="col-4 col-sm-3 col-md-2">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="Ảnh phụ"
                             class="img-fluid rounded border shadow-sm">
                    </div>
                @empty
                    <p class="text-muted">Không có ảnh thư viện.</p>
                @endforelse
            </div>

            @if ($product->variants->count())
                <hr class="my-4">
                <h5>Biến thể sản phẩm</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>Giá</th>
                                <th>KM</th>
                                <th>Số lượng</th>
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
                                    <td>
                                        <span class="badge {{ $variant->status ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $variant->status ? 'Hiển thị' : 'Ẩn' }}
                                        </span>
                                    </td>
                                    <td>
                                        {{-- {{dd($variant->variantAttributes)}} --}}
                                        @foreach ($variant->variantAttributes as $attr)                               
                                            <span class="badge bg-info text-dark me-1">
                                                {{ $attr->attribute->name }}: {{ $attr->value->value }}
                                            </span>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <hr class="my-4">
                <table class="table table-bordered table-striped align-middle mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>Giá</th>
                            <th>KM</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ number_format($product->price) }}đ</td>
                            <td>{{ number_format($product->sale_price) }}đ</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <span class="badge {{ $product->status ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $product->status ? 'Hiển thị' : 'Ẩn' }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endif

            <a href="{{ route('products.index') }}" class="btn btn-outline-primary mt-4">← Quay lại danh sách</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection