@extends('Admin.layouts.master')

@section('title')
Thùng Rác Sản Phẩm
@endsection

@section('topbar-title')
<div class="d-flex align-items-center">
    <i class="fas fa-trash-alt me-2 fs-4 text-danger"></i>
    <span>Thùng rác - Sản phẩm</span>
</div>
@endsection

@section('content')
<div class="container-fluid px-4">
    <!-- Header Card -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body py-3">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary rounded-pill px-3">
                    <i class="fas fa-arrow-left me-1"></i> Quay lại danh sách
                </a>
                <div class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2">
                    <i class="fas fa-trash me-1"></i> Tổng: {{ $products->count() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            @if ($products->count() > 0)
                <div class="accordion" id="trashAccordion">
                    @foreach ($products as $product)
                        <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                            <h2 class="accordion-header" id="heading{{ $product->id }}">
                                <div class="d-flex justify-content-between align-items-center px-3 py-2 bg-light bg-opacity-10 border-bottom">
                                    <button class="accordion-button collapsed bg-transparent shadow-none flex-grow-1 me-3" 
                                            type="button" 
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $product->id }}" 
                                            aria-expanded="false"
                                            aria-controls="collapse{{ $product->id }}">
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <i class="fas fa-box text-danger"></i>
                                            </div>
                                            <div>
                                                <strong class="d-block">{{ $product->name }}</strong>
                                                <small class="text-muted">
                                                    Danh mục: {{ $product->category->name ?? 'Không có' }}
                                                </small>
                                            </div>
                                        </div>
                                    </button>
                                    
                                    <div class="d-flex align-items-center gap-2" style="height: 38px;">
                                        <!-- Nút khôi phục -->
                                        <form action="{{ route('products.restore', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-success rounded-pill px-3 d-flex align-items-center"
                                                    onclick="return confirm('Khôi phục sản phẩm này?')"
                                                    data-bs-toggle="tooltip" title="Khôi phục">
                                                <i class="fas fa-trash-restore me-1"></i>
                                            </button>
                                        </form>
                                        
                                        <!-- Nút xóa vĩnh viễn -->
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger rounded-pill px-3 d-flex align-items-center"
                                                    onclick="return confirm('Bạn có chắc muốn xóa VĨNH VIỄN sản phẩm này?')"
                                                    data-bs-toggle="tooltip" title="Xóa vĩnh viễn">
                                                <i class="fas fa-fire-alt me-1"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </h2>

                            <div id="collapse{{ $product->id }}" class="accordion-collapse collapse"
                                 aria-labelledby="heading{{ $product->id }}" data-bs-parent="#trashAccordion">
                                <div class="accordion-body bg-light bg-opacity-10">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" width="100" class="rounded">
                                            @else
                                                <span class="badge bg-light text-muted rounded-pill px-3 py-1">
                                                    <i class="fas fa-image me-1"></i> Không có ảnh
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-2">
                                                <strong>Giá:</strong>
                                                @if($product->variants && $product->variants->count())
                                                    @php
                                                        $prices = $product->variants->map(function($v) {
                                                            return $v->sale_price && $v->sale_price > 0 ? $v->sale_price : $v->price;
                                                        });
                                                        $min = $prices->min();
                                                        $max = $prices->max();
                                                    @endphp
                                                    @if($min == $max)
                                                        {{ number_format($min) }} đ
                                                    @else
                                                        {{ number_format($min) }} đ - {{ number_format($max) }} đ
                                                    @endif
                                                @else
                                                    {{ number_format($product->sale_price && $product->sale_price > 0 ? $product->sale_price : $product->price) }} đ
                                                @endif
                                            </div>
                                            <div class="mb-2">
                                                <strong>Danh mục con:</strong> {{ $product->categoryMini?->name ?? 'Không có' }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Ngày xóa:</strong> {{ $product->deleted_at }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            @else
                <div class="text-center py-5">
                    <div class="py-5">
                        <i class="fas fa-trash-alt fa-4x text-muted mb-4 opacity-25"></i>
                        <h5 class="text-muted mb-3">Thùng rác trống</h5>
                        <p class="text-muted small mb-4">Không có sản phẩm nào trong thùng rác</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .accordion-button:not(.collapsed) {
        background-color: rgba(220, 53, 69, 0.05);
        color: inherit;
    }
    .accordion-button:focus {
        box-shadow: none;
        border-color: transparent;
    }
    .badge {
        font-weight: 500;
    }
    .btn-sm {
        padding: 0.35rem 0.75rem;
    }
</style>

<script>
    // Khởi tạo tooltip
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection