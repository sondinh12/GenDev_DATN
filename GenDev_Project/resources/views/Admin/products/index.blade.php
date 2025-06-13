@extends('admin.layouts.master')

@section('title')
Products
@endsection

@section('topbar-title')
Manage
@endsection

@section('css')
@endsection

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<a href="{{route('products.create')}}" class="btn btn-outline-primary mb-3">Thêm</a>
<table border=1 class="table">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Ảnh</th>
        <th>Tên danh mục</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Trạng thái</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $pro)
    <tr>
        <td>{{$pro->id}}</td>
        <td>{{$pro->name}}</td>
        <td>
            <img src="{{asset('storage/'.$pro->image)}}" alt="Ảnh" width="100px">
        </td>
        <td>{{$pro->category->name}}</td>
        <td>{{$pro->price}}</td>
        <td>{{$pro->quantity}}</td>
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
            @if($pro->status == 1)
                <a href="{{ route('products.edit', $pro->id) }}" class="btn btn-primary">Sửa</a>
                <a href="{{route('products.show',$pro->id)}}" class="btn btn-info">Xem</a>
                <form action="{{ route('products.trash', $pro->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</button>
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