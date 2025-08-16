@extends('Admin.layouts.master')

@section('title')
Danh sách sản phẩm
@endsection

@section('topbar-title')
Quản lý
@endsection

@section('css')
@endsection

@section('content')

{{-- @if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif --}}

<div class="card">
    
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Danh sách sản phẩm</h5>
        <form method="GET" style="max-width: 300px; width: 100%;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="🔍 Tìm kiếm sản phẩm..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-secondary">Tìm</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-danger">Xóa</a>
                </div>
            </form>

    </div>
    <div class="card-body py-3 d-flex justify-content-between align-items-center">
        <a href="{{route('products.create')}}" class="btn btn-success btn-sm">
            <i class="fas fa-plus me-1"></i> Thêm sản phẩm
        </a>
        <a href="{{ route('products.trash.list') }}" class="btn btn-outline-danger position-relative">
            <i class="fa fa-trash me-1"></i> Thùng rác
            @if(isset($trashedCount) && $trashedCount > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.9em;">
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
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Danh mục</th>
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
                    <td>{{$pro->id}}</td>
                    <td>{{$pro->name}}</td>
                    <td>
                        <img src="{{asset('storage/'.$pro->image)}}" alt="Ảnh" width="60" class="rounded border">
                    </td>
                    <td>{{$pro->category->name ?? 'Không có'}}</td>
                    <td>
                        @if($pro->variants && $pro->variants->count())
                            @php
                                $prices = $pro->variants->map(function($v) {
                                    return $v->sale_price && $v->sale_price > 0 ? $v->sale_price : $v->price;
                                });
                                $min = $prices->min();
                                $max = $prices->max();
                @endphp
                @if($min == $max)
                    {{ number_format($min) }} đ
                @else
                    {{ number_format($min) }} đ - {{ number_format($max) }} đ
                @endif
            @else
                {{ number_format($pro->sale_price && $pro->sale_price > 0 ? $pro->sale_price : $pro->price) }} đ
            @endif
        </td>
        <!--
        <td>
            @if(!$pro->variants || !$pro->variants->count())
                {{$pro->quantity}}
            @endif
        </td>
        -->
        <td>{{$pro->categoryMini?->name}}</td>
        <th>
            @if($pro->status == 1)
                Hiển thị
            @elseif($pro->status == 2)
                Đã xóa
            @else
                Ẩn
            @endif
        </th>
        <td>{{$pro->created_at}}</td>
        <td>{{$pro->updated_at}}</td>
        <td>
            @if($pro->status == 1 || $pro->status == 0)
                <a href="{{ route('products.edit', $pro->id) }}" class="btn btn-primary">Sửa</a>
                <a href="{{route('products.show',$pro->id)}}" class="btn btn-info">Xem</a>
                <form action="{{ route('products.trash', $pro->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn chuyển sản phẩm này vào thùng rác?')">Thùng rác</button>
                </form>
            @elseif($pro->status == 2)
                <form action="{{ route('products.restore', $pro->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success" onclick="return confirm('Khôi phục sản phẩm này?')">Khôi phục</button>
                </form>
                <form action="{{ route('products.destroy', $pro->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn sản phẩm này?')">Xóa vĩnh viễn</button>
                </form>
                            @else
                                            <form action="{{ route('products.restore', $pro->id) }}" method="POST" style="display:inline-block;">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit" class="btn btn-success" onclick="return confirm('Bạn có chắc muốn hiển thị sản phẩm này?')">Hiển thị</button>
                                            </form>
            @endif

        </td>
    </tr>
    @endforeach
</table>
{{$products->links()}}
@endsection
@section('scripts')
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
@push('scripts')
{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Flash Message --}}
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: {!! json_encode(session('success')) !!},
            confirmButtonColor: '#3085d6',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif
@endpush
