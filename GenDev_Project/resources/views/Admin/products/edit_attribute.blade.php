@extends('Admin.layouts.master')

@section('title', 'Sửa thuộc tính')

@section('content')
<div class="container">
    <h2>Sửa thuộc tính & Giá trị</h2>
    {{-- FORM CHỈ CÓ 1 THẺ FORM DUY NHẤT! --}}
    <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST" id="main-attr-form">
        @csrf
        @method('PUT')
        <!-- Sửa tên thuộc tính cha -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên thuộc tính</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $attribute->name }}" required>
        </div>

        <hr>
        <h4>Giá trị thuộc tính (con)</h4>
        <div id="value-list">
            @foreach($attribute->values as $key => $value)
                <div class="input-group mb-2 value-row align-items-center">
                    <input type="text" name="values[{{ $value->id }}]" class="form-control" value="{{ $value->value }}" required>
                    {{-- Nút xóa chỉ xóa khỏi form, submit lên controller sẽ xóa giá trị con --}}
                    <button type="button" class="btn btn-outline-danger ms-2" onclick="removeOldValue(this, {{ $value->id }})">X</button>
                </div>
            @endforeach
        </div>
        <!-- Thêm mới giá trị con -->
        <button type="button" class="btn btn-outline-primary mb-3" onclick="addValueInput()">+ Thêm giá trị</button>
        <br>
        <button type="submit" name="btn-submit" class="btn btn-success">Lưu tất cả</button>
        <a href="{{ route('admin.attributes.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<script>
// Thêm input cho giá trị mới
function addValueInput() {
    var html = `<div class="input-group mb-2 value-row align-items-center">
        <input type="text" name="new_values[]" class="form-control" placeholder="Nhập giá trị mới..." required>
        <button type="button" class="btn btn-outline-danger ms-2" onclick="this.parentNode.remove()">X</button>
    </div>`;
    document.getElementById('value-list').insertAdjacentHTML('beforeend', html);
}

// Xóa giá trị cũ khỏi form và đánh dấu để xóa trên server
function removeOldValue(btn, valueId) {
    // Thêm 1 input ẩn để báo controller xóa value này
    var form = document.getElementById('main-attr-form');
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'delete_values[]';
    input.value = valueId;
    form.appendChild(input);
    // Xóa dòng hiển thị value trên form
    btn.parentNode.remove();
}
</script>
@endsection
