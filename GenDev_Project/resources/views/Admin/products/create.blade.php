@extends('Admin.layouts.master-without-page-title')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">➕ Thêm sản phẩm mới</h4>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
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

                @php
                    $groupedMini = [];
                    foreach ($categories_mini as $mini) {
                        $groupedMini[$mini->category_id][] = [
                            'id' => $mini->id,
                            'name' => $mini->name,
                        ];
                    }
                @endphp

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tên sản phẩm<span class="text-danger">*</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Trạng thái<span class="text-danger">*</label><br>
                            <label class="me-3"><input type="radio" name="status" value="1" checked> Hiển thị</label>
                            <label><input type="radio" name="status" value="0"> Ẩn</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Danh mục<span class="text-danger">*</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($categories as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Danh mục con<span class="text-danger">*</label>
                            <select name="category_mini_id" id="category_mini_id" class="form-control">
                                <option value="">-- Chọn danh mục con --</option>
                            </select>
                            @error('category_mini_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ảnh đại diện<span class="text-danger">*</label>
                            <input type="file" name="image" class="form-control" accept="image/*" id="image-input">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div id="image-preview" class="mt-2"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ảnh thư viện (có thể chọn nhiều)</label>
                            <input type="file" name="galleries[]" class="form-control" multiple accept="image/*" id="galleries-input">
                            @error('galleries')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div id="galleries-preview" class="mt-2 d-flex flex-wrap gap-2"></div>
                        </div>
                    </div>
                    

                    <div class="mb-3">
                        <label class="form-label">Mô tả<span class="text-danger">*</label>
                        <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex align-items-center gap-1">
                        <label class="form-label">Loại sản phẩm:<span class="text-danger">*</label>
                        <select name="product_type" style="width: 280px" id="product-type" class="form-control @error('product_type') is-invalid @enderror" onchange="toggleProductType()">
                            <option value="simple" {{ old('product_type', 'simple') == 'simple' ? 'selected' : '' }}>Sản phẩm không biến thể</option>
                            <option value="variable" {{ old('product_type') == 'variable' ? 'selected' : '' }}>Sản phẩm có biến thể</option>
                        </select>
                        @error('product_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div id="simple-product-fields" class="{{ old('product_type', 'simple') == 'variable' ? 'hidden' : '' }}; ">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Giá<span class="text-danger">*</label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" step="0.01">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Giá khuyến mãi</label>
                                <input type="number" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price') }}" step="0.01">
                                @error('sale_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Số lượng<span class="text-danger">*</label>
                                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div id="variant-form" class="hidden {{ old('product_type') == 'variable' ? '' : 'hidden' }}">
                        <div class="mb-3">
                            <label class="form-label">Chọn thuộc tính<span class="text-danger">*</label>
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
                        <div class="mb-3">
                            <button type="button" class="btn btn-outline-primary" id="generate-variants">Tạo tổ hợp biến thể</button>
                        </div>
                        <div id="variant-table" class="mt-4"></div>
                        <div id="attribute-values-template" style="display: none;">
                            @foreach($attributes as $attribute)
                                <div class="attribute-group border p-2 mb-2" data-attr-id="{{ $attribute->id }}">
                                    <div class="d-flex justify-content-between">
                                        <strong>{{ $attribute->name }}</strong>
                                        <button type="button" class="btn btn-outline-danger remove-attribute"><i class="fas fa-trash-alt"></i> Xóa</button>
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
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-plus"></i> Tạo sản phẩm
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times"></i> Huỷ
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

    <style>
        .hidden {
            display: none !important;
        }
    </style>

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        // Preview ảnh đại diện
        document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('image-input');
            const imagePreview = document.getElementById('image-preview');
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
                        };
                        reader.readAsDataURL(this.files[0]);
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
                variantForm.querySelectorAll('input').forEach(input => input.removeAttribute(''));
            } else {
                simpleFields.classList.add('hidden');
                variantForm.classList.remove('hidden');
                // Bỏ  cho các trường của sản phẩm không biến thể
                simpleFields.querySelectorAll('input').forEach(input => input.removeAttribute(''));
                // Ngược lại
                variantForm.querySelectorAll('input').forEach(input => input.removeAttribute(''));
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
                        <td><input name="variant_combinations[${index}][price]" class="form-control" type="number" step="0.01" ></td>
                        <td><input name="variant_combinations[${index}][sale_price]" class="form-control" type="number" step="0.01"></td>
                        <td><input name="variant_combinations[${index}][quantity]" class="form-control" type="number" ></td>
                        <td><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">❌</button></td>
                    </tr>`;
            });
            table.innerHTML = `<thead>${thead}</thead><tbody>${tbody}</tbody>`;
            document.getElementById('variant-table').innerHTML = '';
            document.getElementById('variant-table').appendChild(table);
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const miniCategories = @json($groupedMini ?? []);
            const categorySelect = document.getElementById('category_id');
            const miniSelect = document.getElementById('category_mini_id');

            if (!categorySelect || !miniSelect) {
                console.error('Không tìm thấy category_id hoặc category_mini_id');
                return;
            }

            categorySelect.addEventListener('change', function () {
                const selected = this.value;
                miniSelect.innerHTML = '<option value="">-- Chọn danh mục con --</option>';

                if (selected && miniCategories[selected]) {
                    miniCategories[selected].forEach(mini => {
                        const opt = document.createElement('option');
                        opt.value = mini.id;
                        opt.textContent = mini.name;
                        miniSelect.appendChild(opt);
                    });
                }
            });
        });
    </script>
@endsection