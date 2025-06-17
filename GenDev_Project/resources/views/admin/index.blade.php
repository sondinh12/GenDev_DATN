
@extends('admin.layouts.master-without-page-title')

@section('title', 'Trang Quản Trị')

@section('css')
    Thêm CSS tùy chọn nếu cần
 @endsection 

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Chào mừng bạn đến với Trang Quản Trị</h4>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('products.index') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Quản lý Sản phẩm</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('categories.index') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Quản lý Danh mục</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('users.index') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Quản lý Người dùng</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    JS riêng nếu cần
@endsection 
