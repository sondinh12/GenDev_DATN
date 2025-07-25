@extends('Admin.layouts.master')
@section('title', 'Tạo phiếu nhập hàng')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
    <form action="{{ route('admin.imports.store') }}" method="post">
        @csrf
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="container mt-4">
            <h2 class="mb-4">Tạo phiếu nhập hàng</h2>

            {{-- Nhà cung cấp --}}
            <div class="form-group mb-3">
                <label for="supplier_id">Nhà cung cấp:</label>
                <select name="supplier_id" class="form-control">
                    <option value="">-- Chọn --</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Ngày nhập --}}
            <div class="form-group mb-3">
                <label for="import_date">Ngày nhập:</label>
                <input type="date" name="import_date" class="form-control" value="{{ old('import_date') }}">
                @error('import_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Ghi chú --}}
            <div class="form-group mb-4">
                <label for="note">Ghi chú:</label>
                <textarea name="note" rows="3" class="form-control"></textarea>
            </div>

            <hr>

            {{-- Khu vực sản phẩm --}}
            <div id="product-items-wrapper"></div>
            <button type="button" class="btn btn-outline-success mb-3" id="add-product-btn">➕ Thêm sản phẩm</button>
        </div>

        {{-- Template sản phẩm --}}
        <template id="product-item-template">
            <div class="card border mb-4 product-item">
                <div class="card-body">
                    <button type="button" class="btn-close float-end remove-product-btn" aria-label="Close"></button>

                    {{-- Chọn loại sản phẩm --}}
                    <div class="form-group mb-2">
                        <label><strong>Loại sản phẩm:</strong></label><br>
                        <label class="me-3">
                            <input type="radio" name="products[__INDEX__][source]" value="existing"
                                class="product-source-toggle" checked>
                            Chọn sản phẩm có sẵn
                        </label>
                        <label>
                            <input type="radio" name="products[__INDEX__][source]" value="new"
                                class="product-source-toggle">
                            Tạo sản phẩm mới
                        </label>
                    </div>

                    {{-- Sản phẩm có sẵn --}}
                    <div class="existing-product-section">
                        <div class="form-group">
                            <label>Sản phẩm có sẵn:</label>
                            <select name="products[__INDEX__][product_id]" class="form-control existing-product-selector">
                                <option value="">-- Chọn --</option>
                                @foreach ($existingProducts as $product)
                                    <option value="{{ $product->id }}"
                                        data-has-variant="{{ $product->variants->count() > 0 ? '1' : '0' }}">
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Biến thể (nếu có) --}}
                        <div class="form-group mt-2 variant-select-wrapper d-none">
                            <label>Chọn biến thể:</label>
                            <select name="products[__INDEX__][variant_id]" class="form-control variant-select">
                                <option value="">-- Chọn biến thể --</option>
                                {{-- Options sẽ được fill bằng JS --}}
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label>Giá nhập:</label>
                            <input type="number" step="0.01" name="products[__INDEX__][existing_price]" class="form-control">
                        </div>

                        <div class="form-group mt-2">
                            <label>Số lượng:</label>
                            <input type="number" name="products[__INDEX__][existing_quantity]" class="form-control">
                        </div>

                        <div class="form-group mt-2">
                            <label>Giá nhập (lịch sử nhà cung cấp - tuỳ chọn):</label>
                            <input type="number" name="products[__INDEX__][existing_supplier_import_price]" class="form-control"
                                step="0.01">
                        </div>
                        
                        {{-- Chế độ biến thể --}}
                        <div class="form-group mt-2">
                            <label>Chọn cách nhập biến thể:</label><br>
                            <label>
                                <input type="radio" name="products[__INDEX__][variant_usage_mode]" class="variant-mode-radio" value="old" checked>
                                Chọn biến thể có sẵn
                            </label>
                            &nbsp;&nbsp;
                            <label>
                                <input type="radio" name="products[__INDEX__][variant_usage_mode]" class="variant-mode-radio" value="new">
                                Tạo biến thể mới
                            </label>
                        </div>

                        {{-- Cho sản phẩm đã có – tạo biến thể mới --}}
                        <div class="existing-product-variant-section mt-3 d-none">
                            <label>Thuộc tính (cho biến thể mới):</label>
                            <select class="form-control attribute-selector">
                                <option value="">-- Chọn --</option>
                                @foreach ($attributes as $attribute)
                                    <option value="{{ $attribute->id }}" data-name="{{ $attribute->name }}">
                                        {{ $attribute->name }}</option>
                                @endforeach
                            </select>

                            <div class="mt-3 selected-attributes-container"></div>

                            <button type="button" class="btn btn-sm btn-warning mt-2 generate-variants">Tạo biến
                                thể</button>

                            <div class="variant-table-container mt-3"></div>
                        </div>

                    </div>

                    {{-- Sản phẩm mới --}}
                    <div class="new-product-section d-none mt-3">
                        <div class="form-group">
                            <label>Tên sản phẩm:</label>
                            <input type="text" name="products[__INDEX__][name]" class="form-control">
                        </div>

                        <div class="form-group mt-2">
                            <label>Loại:</label>
                            <select name="products[__INDEX__][type]" class="form-control product-type-selector">
                                <option value="simple">Đơn giản</option>
                                <option value="variable">Có biến thể</option>
                            </select>
                        </div>

                        {{-- Nếu đơn giản --}}
                        <div class="simple-fields mt-2">
                            <div class="form-group">
                                <label>Giá nhập:</label>
                                <input type="number" step="0.01" name="products[__INDEX__][price]" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label>Số lượng:</label>
                                <input type="number" name="products[__INDEX__][quantity]" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label>Giá nhập (lịch sử nhà cung cấp - tuỳ chọn):</label>
                                <input type="number" name="products[__INDEX__][supplier_import_price]" class="form-control"
                                    step="0.01">
                            </div>
                        </div>

                        {{-- Nếu có biến thể --}}
                        <div class="new-product-variant-section mt-3 d-none">
                            <label>Thuộc tính:</label>
                            <select class="form-control attribute-selector">
                                <option value="">-- Chọn --</option>
                                @foreach ($attributes as $attribute)
                                    <option value="{{ $attribute->id }}" data-name="{{ $attribute->name }}">
                                        {{ $attribute->name }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="mt-3 selected-attributes-container"></div>

                            <button type="button" class="btn btn-sm btn-warning mt-2 generate-variants">Tạo biến
                                thể</button>

                            <div class="variant-table-container mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        {{-- Template thuộc tính --}}
        <div id="attribute-values-template" style="display: none;">
            @foreach($attributes as $attribute)
                <div class="attribute-group border p-2 mb-2" data-attr-id="{{ $attribute->id }}">
                    <div class="d-flex justify-content-between">
                        <strong>{{ $attribute->name }}</strong>
                        <button type="button" class="btn btn-danger btn-sm remove-attribute">❌</button>
                    </div>
                    <div class="mt-2">
                        @foreach($attribute->values as $value)
                            <label class="me-2">
                                <input type="checkbox" value="{{ $value->id }}">
                                {{ $value->value }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Lưu phiếu nhập</button>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/admin/import-variant-generator.js') }}"></script>
@endpush

@php
    $variantData = $existingProducts->mapWithKeys(function ($product) {
        return [
            $product->id => $product->variants->map(function ($variant) {
                $attrString = $variant->variantAttributes->map(function ($att) {
                    return $att->attribute->name . ': ' . $att->value->value;
                })->implode(', ');

                return [
                    'id' => $variant->id,
                    'label' => $attrString ?: 'Mặc định',
                ];
            })
        ];
    });
@endphp

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}">
    </script>
    <script>
        const productVariants = @json($variantData);
    </script>
@endsection