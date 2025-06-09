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
<a href="{{route('products.create')}}" class="btn btn-outline-primary mb-3">Thêm</a>
    <table border=1 class="table">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Tên danh mục</th>
            <th>Giá</th>
            <th>Giá Sale</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>       
            <th>Ngày cập nhật</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $pro)
            <tr>
                <td>{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
                <td>{{$pro->image}}</td>
                <td>{{$pro->category->name}}</td>
                <td>{{$pro->price}}</td>
                <td>{{$pro->sale_price}}</td>
                <td>{{$pro->description}}</td>
                <th>{{$pro->status == 1 ? 'Hiển thị' : 'Ẩn'}}</th>
                <td>{{$pro->created_at}}</td>
                <td>{{$pro->updated_at}}</td>
                <td>
                    <a href="" class="btn btn-primary">Sửa</a>
                    <a href="{{route('products.show',$pro->id)}}" class="btn btn-info">Xem</a>
                    <a href="" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
