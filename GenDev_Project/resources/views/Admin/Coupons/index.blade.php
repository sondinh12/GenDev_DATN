@extends('Admin.layouts.master-without-page-title')

@section('title', 'Danh sách mã giảm giá')

@section('content')
<div class="container mt-4">

    <h4 class="mb-4">Danh sách mã giảm giá</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('coupons.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Thêm mã mới
        </a>

        <a href="{{ route('admin.coupons.trashed') }}" class="btn btn-outline-danger position-relative">
            <i class="fa fa-trash"></i> Thùng rác
            @if(isset($trashedCount) && $trashedCount > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $trashedCount }}
                </span>
            @endif
        </a>
    </div>

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
                    <th>Ngày tạo</th> 
                    <th>Hết hạn</th>   
                    <th>Đã dùng</th>
                    <th>Số lượng</th>
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
                            {{ (int)$coupon->discount_amount }}%
                        @else
                            {{ number_format($coupon->discount_amount, 0, ',', '.') }}₫
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($coupon->created_at)->format('d/m/Y H:i:s') }}</td>
                    <td>{{ \Carbon\Carbon::parse($coupon->end_date)->format('d/m/Y H:i:s') }}</td>    
                    <td>{{ $coupon->total_used }}</td>
                    <td>
                        @if($coupon->usage_limit == -1)
                            Không giới hạn
                        @else
                            {{ $coupon->usage_limit }}
                        @endif
                    </td>
                    <td>
                        @if($coupon->status == 1)
                            <span class="badge bg-success">Hoạt động</span>
                        @elseif($coupon->status == 0)
                            <span class="badge bg-secondary">Tạm dừng</span>
                        @elseif($coupon->status == 2)
                            <span class="badge bg-danger">Đã hết hạn</span>
                        @endif
                    </td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-sm btn-warning">Sửa</a>

                        <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($coupons->isEmpty())
                    <tr>
                        <td colspan="12" class="text-center">Không có mã nào</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $coupons->links() }}
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false,
                timerProgressBar: true
            }).then(() => {
                window.location.href = window.location.href;
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Thất bại!',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true
            }).then(() => {
                window.location.href = window.location.href;
            });
        @endif
    });
</script>
@endsection
