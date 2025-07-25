@extends('Admin.layouts.master-without-page-title')

@section('title', 'Danh sách mã giảm giá')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Danh sách mã giảm giá</h4>

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
                @foreach($coupons as $index => $coupon)
                <tr>
                    <td>{{ $index + $coupons->firstItem() }}</td>
                    <td>
                        {{ $coupon->coupon_code ?? 'Chưa có mã' }}
                    </td>
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
                        <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-sm btn-warning">Sửa</a>

                        <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($coupons->isEmpty())
                    <tr>
                        <td colspan="13" class="text-center">Không có mã nào</td>
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
        // Khởi tạo tooltip nếu có
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Áp dụng xác nhận trước khi xóa (chuyển vào thùng rác)
        document.querySelectorAll('form[method="POST"]').forEach(form => {
            form.addEventListener('submit', function (e) {
                // Kiểm tra nếu đây là form xóa coupon
                if (form.querySelector('button[type="submit"]').classList.contains('btn-danger')) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Xác nhận xóa',
                        text: 'Mã giảm giá sẽ được chuyển vào thùng rác!',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Xác nhận',
                        cancelButtonText: 'Hủy bỏ',
                        reverseButtons: true,
                        backdrop: `rgba(0,0,0,0.2)`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });
        });

        // Hiển thị thông báo thành công (nếu có) sau khi thực hiện các hành động khác
        @if (session('success'))
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
        @if (session('error'))
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