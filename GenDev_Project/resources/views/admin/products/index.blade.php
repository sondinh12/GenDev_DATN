@extends('admin.layouts.master-without-page-title')

@section('title', 'Quản lý Sản phẩm')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Danh sách sản phẩm</h4>
    <a href="#" class="btn btn-primary mb-3">Thêm sản phẩm mới</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            {{-- Lặp qua danh sách sản phẩm --}}
        </tbody>
    </table>
</div>
@endsection
