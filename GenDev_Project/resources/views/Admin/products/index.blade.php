@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Sản phẩm')

@section('css')
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Danh sách Sản phẩm</h4>
                <div class="d-flex justify-content-between mb-3">

                </div>
        </div>

        <div class="card-body py-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('products.create') }}" class="btn btn-outline-primary mb-3"><i class="fas fa-plus me-1"></i>Thêm mới sản phẩm</a>
            <a href="{{ route('products.trash.list') }}" class="btn btn-outline-danger mb-3 float-end position-relative">
                <i class="fa fa-trash me-1"></i>Thùng rác
                @if (isset($trashedCount) && $trashedCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $trashedCount }}
                    </span>
                @endif
            </a>
        </div>
        
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Tên danh mục</th>
                        <th>Giá</th>
                        <th>Danh mục con</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $pro)
                        <tr>
                            <td>{{ $pro->id }}</td>
                            <td>{{ $pro->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $pro->image) }}" alt="Ảnh" width="100px">
                            </td>
                            <td>{{ $pro->category->name ?? 'Không có' }}</td>
                            <td>
                                @if ($pro->variants && $pro->variants->count())
                                    @php
                                        $prices = $pro->variants->map(function ($v) {
                                            return $v->sale_price && $v->sale_price > 0 ? $v->sale_price : $v->price;
                                        });
                                        $min = $prices->min();
                                        $max = $prices->max();
                                    @endphp
                                    @if ($min == $max)
                                        {{ number_format($min) }} đ
                                    @else
                                        {{ number_format($min) }} đ - {{ number_format($max) }} đ
                                    @endif
                                @else
                                    {{ number_format($pro->sale_price && $pro->sale_price > 0 ? $pro->sale_price : $pro->price) }}
                                    đ
                                @endif
                            </td>
                            <!--
                            <td>
                                @if (!$pro->variants || !$pro->variants->count())
    {{ $pro->quantity }}
    @endif
                            </td>
                            -->
                            <td>{{ $pro->categoryMini?->name }}</td>
                            <th>
                                @if ($pro->status == 1)
                                    Hiển thị
                                @elseif($pro->status == 2)
                                    Đã xóa
                                @else
                                    Ẩn
                                @endif
                            </th>
                            <td>{{ $pro->created_at }}</td>
                            <td>{{ $pro->updated_at }}</td>
                            <td>
                                @if ($pro->status == 1 || $pro->status == 0)
                                    <a href="{{ route('products.edit', $pro->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Sửa</a>
                                    <a href="{{ route('products.show', $pro->id) }}" class="btn btn-sm btn-info">Xem</a>
                                    <form action="{{ route('products.trash', $pro->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bạn có chắc muốn chuyển sản phẩm này vào thùng rác?')">
                                            <i class="fas fa-trash-alt"></i> Xoá</button>
                                    </form>
                                @elseif($pro->status == 2)
                                    <form action="{{ route('products.restore', $pro->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success"
                                            onclick="return confirm('Khôi phục sản phẩm này?')">Khôi phục</button>
                                    </form>
                                    <form action="{{ route('products.destroy', $pro->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn sản phẩm này?')">Xóa vĩnh viễn
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('products.restore', $pro->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success"
                                            onclick="return confirm('Bạn có chắc muốn hiển thị sản phẩm này?')">Hiển
                                            thị</button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->links() }}
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
