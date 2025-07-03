@extends('Admin.layouts.master-without-page-title')

@section('title', 'Thùng rác mã giảm giá')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Thùng rác mã giảm giá</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Loại giảm</th>
                    <th>Giá trị</th>
                    <th>Hết hạn</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trashedCoupons as $index => $coupon)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $coupon->coupon_code }}</td>
                    <td>{{ $coupon->name }}</td>
                    <td>
                        @if($coupon->discount_type == 'percent')
                            Phần trăm
                        @else
                            Cố định
                        @endif
                    </td>
                    <td>
                        @if($coupon->discount_type == 'percent')
                            {{ $coupon->discount_amount }}%
                        @else
                            {{ number_format($coupon->discount_amount, 0, ',', '.') }}₫
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($coupon->end_date)->format('d/m/Y') }}</td>
                    <td class="d-flex gap-1">
                        <form action="{{ route('coupons.restore', $coupon->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Khôi phục</button>
                        </form>
                        <form action="{{ route('coupons.forceDelete', $coupon->id) }}" method="POST" onsubmit="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn?')" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa vĩnh viễn</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($trashedCoupons->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">Không có mã trong thùng rác</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection