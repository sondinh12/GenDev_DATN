@extends('admin.layouts.master-without-page-title')

@section('title', 'Quản lý Danh mục')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Danh sách danh mục</h4>
    <a href="#" class="btn btn-success mb-3">Thêm danh mục</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            {{-- Lặp qua danh mục --}}
        </tbody>
    </table>
</div>
@endsection
