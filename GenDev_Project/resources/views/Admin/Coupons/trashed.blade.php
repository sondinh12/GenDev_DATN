@extends('Admin.layouts.master-without-page-title')

@section('title', 'Thùng rác - Mã giảm giá')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Thùng rác mã giảm giá</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('coupons.index') }}" class="btn btn-secondary mb-3">
        <i class="fa fa-arrow-left"></i> Quay lại danh sách
    </a>

    @if($coupons->isEmpty())
        <div class="alert alert-info">Không có mã nào trong thùng rác.</div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-danger">
                <tr>
                    <th>#</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Loại giảm</th>
                    <th>Giá trị</th>
                    <th>Đã dùng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coupons as $index => $coupon)
                <tr>
                    <td>{{ $index + $coupons->firstItem() }}</td>
                    <td>{{ $coupon->coupon_code }}</td>
                    <td>{{ $coupon->name }}</td>
                    <td>{{ $coupon->discount_type == 'percent' ? 'Phần trăm' : 'Cố định' }}</td>
                    <td>
                        @if($coupon->discount_type == 'percent')
                            {{ $coupon->discount_amount }}%
                        @else
                            {{ number_format($coupon->discount_amount, 0, ',', '.') }}₫
                        @endif
                    </td>
                    <td>{{ $coupon->total_used }}</td>
                    <td class="d-flex gap-1">
                        <form action="{{ route('admin.coupons.restore', $coupon->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success btn-sm" title="Khôi phục">
                                <i class="fa fa-undo"></i>
                            </button>
                        </form>

                        <form action="{{ route('admin.coupons.forceDelete', $coupon->id) }}" method="POST" onsubmit="return confirm('Xoá vĩnh viễn mã này?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" title="Xoá vĩnh viễn">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $coupons->links() }}
    </div>
    @endif
</div>
@endsection
