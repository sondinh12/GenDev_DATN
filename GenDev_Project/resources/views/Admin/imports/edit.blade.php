@extends('Admin.layouts.master')
@section('title', 'Sửa phiếu nhập hàng')

@section('content')
    <form action="{{ route('admin.imports.update', $import->id) }}" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Đã xảy ra lỗi:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        @method('PUT')

        <div class="container mt-4">
            <h2 class="mb-4">Sửa phiếu nhập hàng</h2>

            {{-- Nhà cung cấp --}}
            <div class="form-group mb-3">
                <label for="supplier_id">Nhà cung cấp:</label>
                <select name="supplier_id" class="form-control">
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
                <input type="date" name="import_date" class="form-control"
                    value="{{ $import->import_date->format('Y-m-d') }}">
            </div>

            {{-- Ghi chú --}}
            <div class="form-group mb-4">
                <label for="note">Ghi chú:</label>
                <textarea name="note" rows="3" class="form-control">{{ $import->note }}</textarea>
            </div>

            <hr>

            {{-- Sản phẩm --}}
            <div id="product-items-wrapper"></div>

            {{-- <button type="button" class="btn btn-outline-success mb-3" id="add-product-btn">➕ Thêm sản phẩm</button>
            --}}

            <button type="submit" class="btn btn-primary">Cập nhật phiếu nhập</button>
        </div>


        {{-- Template sản phẩm --}}
        <template id="product-item-template">
            <div class="border rounded p-3 mb-3 product-item">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong>Loại sản phẩm:</strong>
                    <button type="button" class="btn btn-sm btn-danger remove-product">X</button>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="products[__INDEX__][source]" value="existing"
                        checked>
                    <label class="form-check-label">Chọn sản phẩm có sẵn</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="products[__INDEX__][source]" value="new">
                    <label class="form-check-label">Tạo sản phẩm mới</label>
                </div>

                {{-- Sản phẩm có sẵn --}}
                <div class="existing-product-section mt-3">
                    <label>Sản phẩm:</label>
                    <select name="products[__INDEX__][product_id]" class="form-control mb-2">
                        <option value="">-- Chọn --</option>
                        @foreach($existingProducts as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>

                    <label>Giá nhập:</label>
                    <input type="number" name="products[__INDEX__][existing_price]" class="form-control mb-2">

                    <label>Số lượng:</label>
                    <input type="number" name="products[__INDEX__][existing_quantity]" class="form-control mb-2">

                    <label>Giá lịch sử nhà cung cấp:</label>
                    <input type="number" name="products[__INDEX__][existing_supplier_import_price]"
                        class="form-control mb-2">
                </div>

                {{-- Sản phẩm mới --}}
                <div class="new-product-section mt-3 d-none">
                    <label>Tên sản phẩm:</label>
                    <input type="text" name="products[__INDEX__][name]" class="form-control mb-2">
                    <label>Giá:</label>
                    <input type="number" name="products[__INDEX__][price]" class="form-control mb-2">
                    <label>Số lượng:</label>
                    <input type="number" name="products[__INDEX__][quantity]" class="form-control mb-2">
                    <label>Giá nhập:</label>
                    <input type="number" name="products[__INDEX__][supplier_import_price]" class="form-control mb-2">

                    <label>Biến thể đã chọn:</label>
                    <div class="variant-fixed-container"></div>
                </div>
            </div>
        </template>
    </form>
@endsection

@push('scripts')
    <script>
        const preloadDetails = @json($preloadDetails);
        let productIndex = 0;
        const wrapper = document.getElementById('product-items-wrapper');
        const template = document.getElementById('product-item-template').innerHTML;

        function createProductItem(detail) {
            const html = template.replace(/__INDEX__/g, productIndex);
            const div = document.createElement('div');
            div.innerHTML = html;

            if (detail.product_id) {
                // Chọn sản phẩm có sẵn
                div.querySelector('[value="existing"]').checked = true;
                div.querySelector('.existing-product-section').classList.remove('d-none');
                div.querySelector('.new-product-section').classList.add('d-none');

                div.querySelector(`[name="products[${productIndex}][product_id]"]`).value = detail.product_id;
                div.querySelector(`[name="products[${productIndex}][existing_price]"]`).value = detail.price;
                div.querySelector(`[name="products[${productIndex}][existing_quantity]"]`).value = detail.quantity;
                div.querySelector(`[name="products[${productIndex}][existing_supplier_import_price]"]`).value = detail.supplier_import_price;

                if (Array.isArray(detail.variant_data) && detail.variant_data.length > 0) {
                    const container = document.createElement('div');
                    container.innerHTML = `<label>Biến thể đã chọn:</label>`;
                    detail.variant_data.forEach(v => {
                        const span = document.createElement('span');
                        span.className = 'badge bg-secondary me-1';
                        span.textContent = `${v.attribute ?? ''}: ${v.value ?? ''}`;

                        const hidden = document.createElement('input');
                        hidden.type = 'hidden';
                        hidden.name = `products[${productIndex}][variant_data][]`;
                        hidden.value = JSON.stringify(v);

                        container.appendChild(span);
                        container.appendChild(hidden);
                    });
                    div.querySelector('.existing-product-section').appendChild(container);
                }

            } else {
                // Tạo sản phẩm mới
                div.querySelector('[value="new"]').checked = true;
                div.querySelector('.existing-product-section').classList.add('d-none');
                div.querySelector('.new-product-section').classList.remove('d-none');

                div.querySelector(`[name="products[${productIndex}][name]"]`).value = detail.name;
                div.querySelector(`[name="products[${productIndex}][price]"]`).value = detail.price;
                div.querySelector(`[name="products[${productIndex}][quantity]"]`).value = detail.quantity;
                div.querySelector(`[name="products[${productIndex}][supplier_import_price]"]`).value = detail.supplier_import_price;

                if (Array.isArray(detail.variant_data)) {
                    const container = div.querySelector('.variant-fixed-container');
                    detail.variant_data.forEach(v => {
                        const span = document.createElement('span');
                        span.className = 'badge bg-secondary me-1';
                        span.textContent = `${v.attribute ?? ''}: ${v.value ?? ''}`;
                        container.appendChild(span);

                        const hidden = document.createElement('input');
                        hidden.type = 'hidden';
                        hidden.name = `products[${productIndex}][variant_data][]`;
                        hidden.value = JSON.stringify(v);
                        container.appendChild(hidden);
                    });
                }
            }

            wrapper.appendChild(div);
            productIndex++;
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Vẫn render lại các sản phẩm đã nhập
            preloadDetails.forEach(detail => createProductItem(detail));

            // Bọc điều kiện tránh lỗi nếu nút bị comment hoặc xóa
            const addButton = document.getElementById('add-product-btn');
            if (addButton) {
                addButton.addEventListener('click', () => {
                    createProductItem({});
                });
            }
        });
    </script>
@endpush