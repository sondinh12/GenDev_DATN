{{-- filepath: d:\Picture\laragon\www\DATN\GenDev_Project\resources\views\Admin\imports\edit.blade.php --}}
@extends('Admin.layouts.master')
@section('title', 'Sửa phiếu nhập hàng')

@section('content')
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('admin.imports.update', $import->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="container mt-4">
        <h2 class="mb-4">Sửa phiếu nhập hàng</h2>

        {{-- Nhà cung cấp --}}
        <div class="form-group mb-3">
            <label for="supplier_id">Nhà cung cấp:</label>
            <select name="supplier_id" class="form-control">
                <option value="">-- Chọn --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $supplier->id == $import->supplier_id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Ngày nhập --}}
        <div class="form-group mb-3">
            <label for="import_date">Ngày nhập:</label>
            <input type="date" name="import_date" class="form-control" value="{{ $import->import_date->format('Y-m-d') }}">
        </div>

        {{-- Ghi chú --}}
        <div class="form-group mb-4">
            <label for="note">Ghi chú:</label>
            <textarea name="note" rows="3" class="form-control">{{ $import->note }}</textarea>
        </div>

        <hr>

        <h5>Sản phẩm đã nhập</h5>
        <div id="product-items-wrapper">
            @foreach($import->details as $i => $detail)
                <div class="border rounded p-3 mb-3 product-item">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Sản phẩm</label>
                            <select class="form-control mb-1 product-select" name="products[{{ $i }}][product_id]" data-index="{{ $i }}">
                                <option value="">-- Chọn sản phẩm --</option>
                                @foreach($existingProducts as $product)
                                    <option value="{{ $product->id }}" {{ $detail->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="variant-select-wrapper mt-2" data-index="{{ $i }}">
                                @php
                                    $variants = $existingProducts->firstWhere('id', $detail->product_id)?->variants ?? [];
                                @endphp
                                @if(count($variants))
                                    <label>Biến thể</label>
                                    <select class="form-control variant-select" name="products[{{ $i }}][variant_id]">
                                        <option value="">-- Chọn biến thể --</option>
                                        @foreach($variants as $variant)
                                            @php
                                                $variantLabel = $variant->variantAttributes->map(function($va){
                                                    return $va->attribute->name . ': ' . $va->value->value;
                                                })->implode(', ');
                                            @endphp
                                            <option value="{{ $variant->id }}" {{ $detail->variant_id == $variant->id ? 'selected' : '' }}>
                                                {{ $variantLabel ?: 'Mặc định' }}
                                            </option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Giá nhập</label>
                            <input type="number" class="form-control" name="products[{{ $i }}][price]" value="{{ $detail->import_price }}">
                        </div>
                        <div class="col-md-2">
                            <label>Số lượng</label>
                            <input type="number" class="form-control" name="products[{{ $i }}][quantity]" value="{{ $detail->quantity }}">
                        </div>
                        <div class="col-md-2">
                            <label>Giá NCC</label>
                            <input type="number" class="form-control" name="products[{{ $i }}][supplier_import_price]" value="{{ $detail->supplier_import_price ?? '' }}">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm remove-product">Xóa</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-outline-primary mb-3" id="add-product-btn">
            + Thêm sản phẩm
        </button>
        <button type="submit" class="btn btn-primary">Cập nhật phiếu nhập</button>
    </div>
</form>

<script>
    // Dữ liệu sản phẩm và biến thể
    let productIndex = {{ count($import->details) }};
    const products = @json($existingProducts);

    // Xóa sản phẩm khỏi form (chỉ xóa trên giao diện)
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-product')) {
            e.target.closest('.product-item').remove();
        }
    });

    // Thêm sản phẩm mới (giống create)
    document.getElementById('add-product-btn').addEventListener('click', function() {
        let options = '<option value="">-- Chọn sản phẩm --</option>';
        products.forEach(function(p) {
            options += `<option value="${p.id}">${p.name}</option>`;
        });

        let html = `
        <div class="border rounded p-3 mb-3 product-item">
            <div class="row">
                <div class="col-md-4">
                    <label>Sản phẩm</label>
                    <select class="form-control mb-1 product-select" name="products[${productIndex}][product_id]" data-index="${productIndex}">
                        ${options}
                    </select>
                    <div class="variant-select-wrapper mt-2" data-index="${productIndex}"></div>
                </div>
                <div class="col-md-2">
                    <label>Giá nhập</label>
                    <input type="number" class="form-control" name="products[${productIndex}][price]" required>
                </div>
                <div class="col-md-2">
                    <label>Số lượng</label>
                    <input type="number" class="form-control" name="products[${productIndex}][quantity]" required>
                </div>
                <div class="col-md-2">
                    <label>Giá NCC</label>
                    <input type="number" class="form-control" name="products[${productIndex}][supplier_import_price]">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm remove-product">Xóa</button>
                </div>
            </div>
        </div>
        `;
        document.getElementById('product-items-wrapper').insertAdjacentHTML('beforeend', html);
        // Gắn lại sự kiện cho select mới
        let newSelect = document.querySelector(`select[name="products[${productIndex}][product_id]"]`);
        newSelect.addEventListener('change', function() {
            updateVariantSelect(this);
        });
        productIndex++;
    });

    // Khi chọn sản phẩm, nếu có biến thể thì hiện select biến thể
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('product-select')) {
            updateVariantSelect(e.target);
        }
    });

    // Hàm cập nhật select biến thể cho sản phẩm
    function updateVariantSelect(productSelect) {
        let index = productSelect.getAttribute('data-index');
        let productId = productSelect.value;
        let wrapper = document.querySelector('.variant-select-wrapper[data-index="'+index+'"]');
        wrapper.innerHTML = '';
        if (!productId) return;
        let product = products.find(p => p.id == productId);
        if (product && product.variants && product.variants.length > 0) {
            let variantOptions = '<option value="">-- Chọn biến thể --</option>';
            product.variants.forEach(function(variant) {
                let label = '';
                if (variant.variant_attributes && variant.variant_attributes.length > 0) {
                    label = variant.variant_attributes.map(function(va){
                        return va.attribute.name + ': ' + va.value.value;
                    }).join(', ');
                } else {
                    label = 'Mặc định';
                }
                variantOptions += `<option value="${variant.id}">${label}</option>`;
            });
            wrapper.innerHTML = `
                <label>Biến thể</label>
                <select class="form-control" name="products[${index}][variant_id]">
                    ${variantOptions}
                </select>
            `;
        }
    }

    // Khởi tạo lại select biến thể cho các sản phẩm đã có khi load trang
    document.querySelectorAll('.product-select').forEach(function(select) {
        select.addEventListener('change', function() {
            updateVariantSelect(this);
        });
    });
</script>
@endsection