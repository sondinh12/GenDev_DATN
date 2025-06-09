@extends('admin.layouts.master')

@section('title')
    Add
@endsection

@section('topbar-title')
    Products
@endsection

@section('css')
@endsection

@section('content')
    <h2>Thêm sản phẩm mới</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Tên sản phẩm --}}
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        {{-- Danh mục --}}
        <div class="form-group">
            <label>Danh mục</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Giá --}}
        <div class="form-group">
            <label>Giá</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        {{-- Giá khuyến mãi --}}
        <div class="form-group">
            <label>Giá khuyến mãi</label>
            <input type="number" name="sale_price" class="form-control">
        </div>

        {{-- Ảnh đại diện --}}
        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input type="file" name="image" class="form-control-file" accept="image/*" required>
        </div>

        {{-- Ảnh liên quan --}}
        <div class="form-group">
            <label>Ảnh thư viện (có thể chọn nhiều)</label>
            <input type="file" name="galleries[]" class="form-control-file" multiple accept="image/*">
        </div>

        {{-- Mô tả --}}
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" class="form-control" rows="5"></textarea>
        </div>

        {{-- Trạng thái --}}
        <div class="form-group">
            <label>Trạng thái</label><br>
            <label><input type="radio" name="status" value="1" checked> Hiển thị</label>
            <label><input type="radio" name="status" value="0"> Ẩn</label>
        </div>

        <hr>
        <button type="button" class="btn btn-secondary mb-3" onclick="toggleVariantForm()">+ Thêm biến thể</button>

        <div id="variant-form" style="display: none;">
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
<div id="variant-table" class="mt-4"></div>

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


        <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
    </form>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}">
    </script>

    <script>
        function toggleVariantForm() {
            const box = document.getElementById('variant-form');
            box.style.display = box.style.display === 'none' ? 'block' : 'none';
        }

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
            return arr.reduce((a, b) => a.flatMap(d => b.map(e => [].concat(d, e))));
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
                    <input type="hidden" name="variant_combinations[${index}][value_ids][]" value="${combo.map(c => c.valueId).join(',')}">
                </td>
                <td><input name="variant_combinations[${index}][price]" class="form-control" type="number" required></td>
                <td><input name="variant_combinations[${index}][sale_price]" class="form-control" type="number"></td>
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