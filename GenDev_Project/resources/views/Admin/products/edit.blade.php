@extends('admin.layouts.master')

@section('title')
Edit
@endsection

@section('topbar-title')
Products
@endsection

@section('css')
<style>
    .hidden {
        display: none !important;
    }
</style>
@endsection

@section('content')
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<h2>Chỉnh sửa sản phẩm</h2>
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Tên sản phẩm</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Danh mục</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">-- Chọn danh mục --</option>
            @foreach($categories as $cate)
            <option value="{{ $cate->id }}" {{ $product->category_id == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
            @endforeach
        </select>
    </div>
    @error('category_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Danh mục con</label>
        <select name="category_mini_id" id="category_mini_id" class="form-control">
            <option value="">-- Chọn danh mục con --</option>
            @if(isset($categories_mini))
                @foreach($categories_mini as $mini)
                    <option value="{{ $mini->id }}" {{ $product->category_mini_id == $mini->id ? 'selected' : '' }}>{{ $mini->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    @error('category_mini_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Ảnh đại diện</label><br>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mb-2"><br>
        @endif
        <input type="file" name="image" class="form-control-file" accept="image/*">
    </div>
    @error('image')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Ảnh thư viện (có thể chọn nhiều)</label><br>
        @if($product->galleries)
            @foreach($product->galleries as $gallery)
                <img src="{{ asset('storage/' . $gallery->image) }}" width="80" class="mb-1 mr-1">
            @endforeach
        @endif
        <input type="file" name="galleries[]" class="form-control-file" multiple accept="image/*">
    </div>
    @error('galleries')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Mô tả</label>
        <textarea name="description" class="form-control" rows="5">{{ old('description', $product->description) }}</textarea>
        @error('description')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Trạng thái</label><br>
        <label><input type="radio" name="status" value="1" {{ old('status', $product->status ?? 1) == 1 ? 'checked' : '' }}> Hiển thị</label>
        <label><input type="radio" name="status" value="0" {{ old('status', $product->status ?? 1) == 0 ? 'checked' : '' }}> Ẩn</label>
    </div>
    <hr>
    <div class="form-group">
        <label>Loại sản phẩm</label>
        <select name="product_type" id="product-type" class="form-control @error('product_type') is-invalid @enderror" onchange="toggleProductType()">
            <option value="simple" {{ old('product_type', $product->variants->count() ? 'variable' : 'simple') == 'simple' ? 'selected' : '' }}>Sản phẩm không biến thể</option>
            <option value="variable" {{ old('product_type', $product->variants->count() ? 'variable' : 'simple') == 'variable' ? 'selected' : '' }}>Sản phẩm có biến thể</option>
        </select>
        @error('product_type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div id="simple-product-fields" class="{{ old('product_type', $product->variants->count() ? 'variable' : 'simple') == 'variable' ? 'hidden' : '' }}">
        <div class="form-group">
            <label>Giá</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" step="0.01">
            @error('price')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Giá khuyến mãi</label>
            <input type="number" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price', $product->sale_price) }}" step="0.01">
            @error('sale_price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $product->quantity) }}">
            @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div id="variant-form" class="hidden {{ old('product_type', $product->variants->count() ? 'variable' : 'simple') == 'variable' ? '' : 'hidden' }}">
        <h4>Biến thể sản phẩm</h4>
        <div class="form-group">
            <label>Chọn thuộc tính:</label>
            <select id="attribute-selector" class="form-control">
                <option value="">-- Chọn thuộc tính --</option>
                @foreach($attributes as $attribute)
                <option value="{{ $attribute->id }}" data-name="{{ $attribute->name }}">
                    {{ $attribute->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div id="selected-attributes-container" class="mt-4"></div>
        <div class="form-group mt-3">
            <button type="button" class="btn btn-primary" id="generate-variants">Tạo tổ hợp biến thể</button>
        </div>
        <div id="variant-table" class="mt-4">
            @if($product->variants && $product->variants->count())
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Biến thể</th><th>Giá</th><th>Giá sale</th><th>Số lượng</th><th>Xóa</th></tr>
                    </thead>
                    <tbody>
                        @foreach($product->variants as $index => $variant)
                            <tr>
                                <td>
                                    @php
                                        $labels = $variant->variantAttributes->map(function($attr) {
                                            return $attr->value->value;
                                        })->implode(' / ');
                                        $valueIds = $variant->variantAttributes->pluck('attribute_value_id')->implode(',');
                                    @endphp
                                    {{ $labels }}
                                    <input type="hidden" name="variant_combinations[{{ $index }}][value_ids]" value="{{ $valueIds }}">
                                </td>
                                <td><input name="variant_combinations[{{ $index }}][price]" class="form-control" type="number" step="0.01" value="{{ $variant->price }}" required></td>
                                <td><input name="variant_combinations[{{ $index }}][sale_price]" class="form-control" type="number" step="0.01" value="{{ $variant->sale_price }}"></td>
                                <td><input name="variant_combinations[{{ $index }}][quantity]" class="form-control" type="number" value="{{ $variant->quantity }}" required></td>
                                <td><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">❌</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div id="attribute-values-template" style="display: none;">
            @foreach($attributes as $attribute)
            <div class="attribute-group border p-2 mb-2" data-attr-id="{{ $attribute->id }}">
                <div class="d-flex justify-content-between">
                    <strong>{{ $attribute->name }}</strong>
                    <button type="button" class="btn btn-danger btn-sm remove-attribute">❌</button>
                </div>
                <div class="mt-2">
                    @foreach($attribute->values as $value)
                    <label class="mr-2">
                        <input type="checkbox" name="attribute_values[{{ $attribute->id }}][]" value="{{ $value->id }}">
                        {{ $value->value }}
                    </label>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
</form>
@endsection
@section('scripts')
<script src="{{ URL::asset('build/js/app.js') }}">
</script>
<script>
    function toggleProductType() {
        const productType = document.getElementById('product-type').value;
        const simpleFields = document.getElementById('simple-product-fields');
        const variantForm = document.getElementById('variant-form');
        if (productType === 'simple') {
            simpleFields.classList.remove('hidden');
            variantForm.classList.add('hidden');
            variantForm.querySelectorAll('input').forEach(input => input.removeAttribute('required'));
        } else {
            simpleFields.classList.add('hidden');
            variantForm.classList.remove('hidden');
            simpleFields.querySelectorAll('input').forEach(input => input.removeAttribute('required'));
            variantForm.querySelectorAll('input').forEach(input => input.removeAttribute('required'));
        }
    }
    document.addEventListener('DOMContentLoaded', toggleProductType);
    document.getElementById('attribute-selector').addEventListener('change', function() {
        const attrId = this.value;
        const attrName = this.options[this.selectedIndex].dataset.name;
        if (!attrId) return;
        if (document.querySelector(`#selected-attributes-container .attribute-group[data-attr-id="${attrId}"]`)) {
            this.value = '';
            return;
        }
        const template = document.querySelector(`#attribute-values-template .attribute-group[data-attr-id="${attrId}"]`);
        const clone = template.cloneNode(true);
        clone.querySelector('.remove-attribute').addEventListener('click', function() {
            clone.remove();
        });
        document.getElementById('selected-attributes-container').appendChild(clone);
        this.value = '';
    });
    document.getElementById('generate-variants').addEventListener('click', function() {
        const groups = document.querySelectorAll('#selected-attributes-container .attribute-group');
        let selected = [];
        groups.forEach(group => {
            const values = [...group.querySelectorAll('input[type="checkbox"]:checked')].map(input => {
                return {
                    attrId: group.dataset.attrId,
                    valueId: input.value,
                    valueLabel: input.parentElement.textContent.trim()
                };
            });
            if (values.length) selected.push(values);
        });
        function cartesian(arr) {
            return arr.reduce((a, b) => a.flatMap(d => b.map(e => [].concat(d, e))), [
                []
            ]);
        }
        let combos = cartesian(selected);
        const table = document.createElement('table');
        table.className = 'table table-bordered';
        let thead = '<tr><th>Biến thể</th><th>Giá</th><th>Giá sale</th><th>Số lượng</th><th>Xóa</th></tr>';
        let tbody = '';
        combos.forEach((combo, index) => {
            const label = combo.map(c => c.valueLabel).join(' / ');
            const valueIds = combo.map(c => c.valueId).join(',');
            tbody += `<tr>
                    <td>
                        ${label}
                        <input type="hidden" name="variant_combinations[${index}][value_ids]" value="${valueIds}">
                    </td>
                    <td><input name="variant_combinations[${index}][price]" class="form-control" type="number" step="0.01" required></td>
                    <td><input name="variant_combinations[${index}][sale_price]" class="form-control" type="number" step="0.01"></td>
                    <td><input name="variant_combinations[${index}][quantity]" class="form-control" type="number" required></td>
                    <td><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">❌</button></td>
                </tr>`;
        });
        table.innerHTML = `<thead>${thead}</thead><tbody>${tbody}</tbody>`;
        document.getElementById('variant-table').innerHTML = '';
        document.getElementById('variant-table').appendChild(table);
    });
</script>
@endsection