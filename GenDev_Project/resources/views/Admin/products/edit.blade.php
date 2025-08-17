@extends('Admin.layouts.master')

@section('title')
Chỉnh sửa
@endsection

@section('topbar-title')
Sản phẩm
@endsection

@section('css')
<style>
    .hidden {
        display: none !important;
    }
</style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">✏️ Chỉnh sửa sản phẩm</h4>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại danh sách
            </a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
                        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Danh mục</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($categories as $cate)

                                <option value="{{ $cate->id }}" {{ old('category_id', $product->category_id) == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    @php
                        $groupedMini = [];
                        foreach ($categories_mini as $mini) {
                            $groupedMini[$mini->category_id][] = [
                                'id' => $mini->id,
                                'name' => $mini->name,
                            ];
                        }
                    @endphp

                    <div class="mb-3">
                        <label class="form-label">Danh mục con</label>
                        <select name="category_mini_id" id="category_mini_id" class="form-control">
                            <option value="">-- Chọn danh mục con --</option>
                        </select>
                        @error('category_mini_id')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ảnh đại diện</label>
                        <input type="file" name="image" class="form-control" accept="image/*" id="image-input">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2 rounded border" id="current-image">
                        @endif
                        <div id="image-preview" class="mt-2"></div>
                        @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ảnh thư viện (có thể chọn nhiều)</label>
                        <input type="file" name="galleries[]" class="form-control" multiple accept="image/*" id="galleries-input">
                        <div class="mt-2 d-flex flex-wrap gap-2">
                            @if($product->galleries)
                                @foreach($product->galleries as $gallery)
                                    <img src="{{ asset('storage/' . $gallery->image) }}" width="70" class="rounded border me-2 mb-2">
                                @endforeach
                            @endif
                        </div>
                        <div id="galleries-preview" class="mt-2 d-flex flex-wrap gap-2"></div>
                        @error('galleries')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control" rows="5">{{ old('description', $product->description) }}</textarea>
                        @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label><br>
                        <label class="me-3"><input type="radio" name="status" value="1" {{ old('status', $product->status ?? 1) == 1 ? 'checked' : '' }}> Hiển thị</label>
                        <label><input type="radio" name="status" value="0" {{ old('status', $product->status ?? 1) == 0 ? 'checked' : '' }}> Ẩn</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loại sản phẩm</label>
                        <select name="product_type" id="product-type" class="form-control @error('product_type') is-invalid @enderror" onchange="toggleProductType()">
                            <option value="simple" {{ old('product_type', $product->variants->count() ? 'variable' : 'simple') == 'simple' ? 'selected' : '' }}>Sản phẩm không biến thể</option>
                            <option value="variable" {{ old('product_type', $product->variants->count() ? 'variable' : 'simple') == 'variable' ? 'selected' : '' }}>Sản phẩm có biến thể</option>
                        </select>
                        @error('product_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div id="simple-product-fields" class="{{ old('product_type', $product->variants->count() ? 'variable' : 'simple') == 'variable' ? 'hidden' : '' }}">
                        <div class="mb-3">
                            <label class="form-label">Giá</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" step="0.01">
                            @error('price')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá khuyến mãi</label>
                            <input type="number" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price', $product->sale_price) }}" step="0.01">
                            @error('sale_price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số lượng</label>
                            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $product->quantity) }}">
                            @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div id="variant-form" class="hidden {{ old('product_type', $product->variants->count() ? 'variable' : 'simple') == 'variable' ? '' : 'hidden' }}">
                        <h5 class="mb-3">Biến thể sản phẩm</h5>
                        <div class="mb-3">
                            <label class="form-label">Chọn thuộc tính:</label>
                            <select id="attribute-selector" class="form-control">
                                <option value="">-- Chọn thuộc tính --</option>
                                @foreach($attributes as $attribute)
                                    <option value="{{ $attribute->id }}" data-name="{{ $attribute->name }}">{{ $attribute->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="selected-attributes-container" class="mt-4"></div>
                        <div class="mb-3">
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
                                            <label class="me-2">
                                                <input type="checkbox" name="attribute_values[{{ $attribute->id }}][]" value="{{ $value->id }}">
                                                {{ $value->value }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Cập nhật sản phẩm
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Huỷ
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script>
        // Preview ảnh đại diện
        document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('image-input');
            const imagePreview = document.getElementById('image-preview');
            const currentImage = document.getElementById('current-image');
            if (imageInput && imagePreview) {
                imageInput.addEventListener('change', function (e) {
                    imagePreview.innerHTML = '';
                    if (this.files && this.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.maxWidth = '100px';
                            img.style.maxHeight = '100px';
                            img.className = 'rounded border';
                            imagePreview.appendChild(img);
                            if (currentImage) currentImage.style.display = 'none';
                        };
                        reader.readAsDataURL(this.files[0]);
                    } else {
                        if (currentImage) currentImage.style.display = '';
                    }
                });
            }
            // Preview ảnh thư viện
            const galleriesInput = document.getElementById('galleries-input');
            const galleriesPreview = document.getElementById('galleries-preview');
            if (galleriesInput && galleriesPreview) {
                galleriesInput.addEventListener('change', function (e) {
                    galleriesPreview.innerHTML = '';
                    if (this.files) {
                        Array.from(this.files).forEach(file => {
                            if (!file.type.startsWith('image/')) return;
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.style.maxWidth = '70px';
                                img.style.maxHeight = '70px';
                                img.className = 'rounded border me-2 mb-2';
                                galleriesPreview.appendChild(img);
                            };
                            reader.readAsDataURL(file);
                        });
                    }
                });
            }


            // Danh mục con động
            const miniCategories = @json($groupedMini ?? []);
            const categorySelect = document.getElementById('category_id');
            const miniSelect = document.getElementById('category_mini_id');
            const selectedMini = @json(old('category_mini_id', $product->category_mini_id));

            function renderMiniOptions() {
                const selected = categorySelect.value;
                miniSelect.innerHTML = '<option value="">-- Chọn danh mục con --</option>';
                if (selected && miniCategories[selected]) {
                    miniCategories[selected].forEach(mini => {
                        const opt = document.createElement('option');
                        opt.value = mini.id;
                        opt.textContent = mini.name;
                        if (selectedMini == mini.id) opt.selected = true;
                        miniSelect.appendChild(opt);
                    });
                }
            }
            categorySelect.addEventListener('change', function () {
                renderMiniOptions();
            });
            // Khởi tạo khi load trang
            renderMiniOptions();
        });
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
        document.getElementById('attribute-selector').addEventListener('change', function () {
            const attrId = this.value;
            const attrName = this.options[this.selectedIndex].dataset.name;
            if (!attrId) return;
            if (document.querySelector(`#selected-attributes-container .attribute-group[data-attr-id="${attrId}"]`)) {
                this.value = '';
                return;
            }
            const template = document.querySelector(`#attribute-values-template .attribute-group[data-attr-id="${attrId}"]`);
            const clone = template.cloneNode(true);
            clone.querySelector('.remove-attribute').addEventListener('click', function () {
                clone.remove();
            });
            document.getElementById('selected-attributes-container').appendChild(clone);
            this.value = '';
        });
        document.getElementById('generate-variants').addEventListener('click', function () {
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

            // Lấy các biến thể đã có trên bảng (nếu có)
            let existingVariants = {};
            document.querySelectorAll('#variant-table table tbody tr').forEach(tr => {
                const valueIdsInput = tr.querySelector('input[type="hidden"][name*="[value_ids]"]');
                if (valueIdsInput) {
                    const valueIds = valueIdsInput.value;
                    // Lấy label cũ nếu có
                    let label = '';
                    const labelCell = valueIdsInput.closest('td');
                    if (labelCell) {
                        // Lấy text trước input hidden (label)
                        label = labelCell.childNodes[0]?.textContent?.trim() || '';
                    }
                    existingVariants[valueIds] = {
                        label: label,
                        price: tr.querySelector('input[name*="[price]"]').value,
                        sale_price: tr.querySelector('input[name*="[sale_price]"]').value,
                        quantity: tr.querySelector('input[name*="[quantity]"]').value
                    };
                }
            });

            // Tạo danh sách mới, giữ lại các biến thể cũ và thêm mới
            let allCombos = {};
            combos.forEach(combo => {
                const label = combo.map(c => c.valueLabel).join(' / ');
                const valueIds = combo.map(c => c.valueId).join(',');
                allCombos[valueIds] = {
                    label: label,
                    price: existingVariants[valueIds]?.price || '',
                    sale_price: existingVariants[valueIds]?.sale_price || '',
                    quantity: existingVariants[valueIds]?.quantity || ''
                };
            });
            // Giữ lại các biến thể cũ không còn trong tổ hợp mới (nếu muốn giữ lại)
            for (const valueIds in existingVariants) {
                if (!allCombos[valueIds]) {
                    allCombos[valueIds] = existingVariants[valueIds];
                }
            }

            // Render lại bảng
            const table = document.createElement('table');
            table.className = 'table table-bordered';
            let thead = '<tr><th>Biến thể</th><th>Giá</th><th>Giá sale</th><th>Số lượng</th><th>Xóa</th></tr>';
            let tbody = '';
            let idx = 0;
            for (const valueIds in allCombos) {
                const row = allCombos[valueIds];
                tbody += `<tr>
                    <td>
                        ${row.label}
                        <input type="hidden" name="variant_combinations[${idx}][value_ids]" value="${valueIds}">
                    </td>
                    <td><input name="variant_combinations[${idx}][price]" class="form-control" type="number" step="0.01" value="${row.price}" required></td>
                    <td><input name="variant_combinations[${idx}][sale_price]" class="form-control" type="number" step="0.01" value="${row.sale_price}"></td>
                    <td><input name="variant_combinations[${idx}][quantity]" class="form-control" type="number" value="${row.quantity}" required></td>
                    <td><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">❌</button></td>
                </tr>`;
                idx++;
            }
            table.innerHTML = `<thead>${thead}</thead><tbody>${tbody}</tbody>`;
            document.getElementById('variant-table').innerHTML = '';
            document.getElementById('variant-table').appendChild(table);
        });
    </script>
@endsection