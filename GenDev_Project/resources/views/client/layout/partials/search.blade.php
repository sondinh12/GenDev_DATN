@extends('client.layout.master')

@section('content')
    <h4>Kết quả tìm kiếm</h4>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ number_format($product->price) }} đ</p>
                        <a href="#" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Không tìm thấy sản phẩm nào.</p>
        @endforelse
    </div>
    {{ $products->withQueryString()->links() }}
@endsection
