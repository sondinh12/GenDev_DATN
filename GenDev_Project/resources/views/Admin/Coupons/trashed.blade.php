@extends('Admin.layouts.master-without-page-title')

@section('title', 'Thùng rác mã giảm giá')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Thùng rác mã giảm giá</h2>

    {{-- Nút quay lại --}}
    <a href="{{ route('coupons.index') }}" class="btn btn-secondary mb-3">
        <i class="fa fa-arrow-left"></i> Quay lại danh sách
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Loại mã</th>
                    <th>Kiểu giảm</th>
                    <th>Giá trị</th>
                    <th>Ngày tạo</th>
                    <th>Hết hạn</th>
                    <th>Người sử dụng</th>
                    <th>Đã dùng</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trashedCoupons as $index => $coupon)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $coupon->coupon_code ?? $coupon->shipping_code ?? 'Chưa có mã' }}</td>
                    <td>{{ $coupon->name }}</td>
                    <td>{{ $coupon->type == 'order' ? 'Đơn hàng' : 'Phí ship' }}</td>
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
                    <td>
                        @if($coupon->user_id == -1)
                            Toàn bộ hệ thống
                        @elseif($coupon->user_id == 0)
                            Mã tri ân
                        @else
                            ID: {{ $coupon->user_id }}
                        @endif
                    </td>
                    <td>{{ $coupon->total_used }}</td>
                    <td>
                        @if($coupon->usage_limit == -1)
                            Không giới hạn
                        @else
                            {{ number_format($coupon->usage_limit, 0, ',', '.') }}
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
                        <form action="{{ route('coupons.restore', $coupon->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Khôi phục</button>
                        </form>
                        <form action="{{ route('coupons.forceDelete', $coupon->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xoá vĩnh viễn</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="13" class="text-center">Không có mã trong thùng rác</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Thư viện SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Xác nhận khôi phục – chọn form có nút btn-success (khôi phục)
        document.querySelectorAll('form').forEach(form => {
            const restoreBtn = form.querySelector('button.btn-success');
            if (restoreBtn) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Xác nhận khôi phục',
                        text: 'Bạn có chắc chắn muốn khôi phục mã giảm giá này?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#198754',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Khôi phục',
                        cancelButtonText: 'Hủy bỏ',
                        reverseButtons: true,
                        backdrop: 'rgba(0,0,0,0.2)'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            }

            // Xác nhận xoá vĩnh viễn – chọn form có nút btn-danger (xoá)
            const deleteBtn = form.querySelector('button.btn-danger');
            if (deleteBtn) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Xác nhận xóa vĩnh viễn',
                        text: 'Mã giảm giá sẽ bị xoá vĩnh viễn và không thể khôi phục!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Xoá vĩnh viễn',
                        cancelButtonText: 'Hủy bỏ',
                        reverseButtons: true,
                        backdrop: 'rgba(0,0,0,0.2)'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            }
        });

        // Hiển thị thông báo thành công (nếu có)
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        // Hiển thị thông báo lỗi (nếu có)
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        @endif
    });
</script>

@endsection
