@extends('admin.layouts.master')

@section('title')
Danh sách Thuộc Tính
@endsection

@section('topbar-title')
Quản lý Thuộc tính
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary mb-3">+ Thêm Thuộc Tính</a>
    
    <div class="accordion" id="attributesAccordion">
        @foreach ($attributes as $attribute)
            <div class="accordion-item mb-2">
                <h2 class="accordion-header d-flex align-items-center justify-content-between" id="heading{{ $attribute->id }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $attribute->id }}" aria-expanded="false" aria-controls="collapse{{ $attribute->id }}">
                        <strong>{{ $attribute->name }}</strong>
                    </button>
                    <div class="ms-2">
                        <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa thuộc tính này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </div>
                </h2>
                <div id="collapse{{ $attribute->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $attribute->id }}" data-bs-parent="#attributesAccordion">
                    <div class="accordion-body">
                        @if ($attribute->values->count())
                            <ul>
                                @foreach ($attribute->values as $value)
                                    <li>
                                        {{ $value->value }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">Chưa có giá trị nào</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">← Quay lại danh sách sản phẩm</a>
</div>
@endsection



