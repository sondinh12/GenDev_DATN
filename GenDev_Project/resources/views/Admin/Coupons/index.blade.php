@extends('Admin.layouts.master-without-page-title')

@section('title', 'Danh sách mã giảm giá')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Danh sách mã giảm giá</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
{{-- 
    <a href="{{ route('coupons.create') }}" class="btn btn-primary mb-3">+ Thêm mã mới</a> --}}

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Người tạo</th>
                    <th>Loại giảm</th>
                    <th>Giá trị</th>
                    <th>Hết hạn</th>
                    <th>Đã dùng</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coupons as $index => $coupon)
                <tr>
                    <td>{{ $index + $coupons->firstItem() }}</td>
                    <td>{{ $coupon->coupon_code }}</td>
                    <td>{{ $coupon->name }}</td>
                    <td>{{ $coupon->creator->name ?? 'Không rõ' }}</td>
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
                    <td>{{ $coupon->total_used }}</td>
                    <td>
                        @if($coupon->status)
                            <span class="badge bg-success">Hoạt động</span>
                        @else
                            <span class="badge bg-secondary">Ngưng</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-sm btn-warning">Sửa</a>

                        <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($coupons->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center">Không có mã nào</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $coupons->links() }}
    </div>
</div>
@endsection
