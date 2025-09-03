@extends('Admin.layouts.master-without-page-title')

@section('title', 'Thùng rác mã giảm giá')

@section('content')
<div class="container mt-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-danger text-white py-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-trash-alt me-2"></i>Thùng rác mã giảm giá</h4>
            <a href="{{ route('coupons.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left me-1"></i>Quay lại danh sách</a>
        </div>
        
        <div class="card-body">
            @if($trashedCoupons->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-trash-alt fa-3x mb-3 text-danger"></i>
                    <p class="mb-0 fs-5">Thùng rác trống</p>
                    <p class="mt-2">Không có mã giảm giá nào trong thùng rác</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3">#</th>
                                <th class="py-3">Mã</th>
                                <th class="py-3">Tên</th>
                                <th class="py-3">Loại mã</th>
                                <th class="py-3">Kiểu giảm</th>
                                <th class="py-3">Giá trị</th>
                                <th class="py-3">Ngày tạo</th>
                                <th class="py-3">Hết hạn</th>
                                <th class="py-3">Người sử dụng</th>
                                <th class="py-3">Đã dùng</th>
                                <th class="py-3">Số lượng</th>
                                <th class="py-3">Trạng thái</th>
                                <th class="py-3 text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trashedCoupons as $index => $coupon)
                            <tr>
                                <td class="fw-medium">{{ $index + 1 }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $coupon->coupon_code ?? $coupon->shipping_code ?? 'Chưa có mã' }}</span></td>
                                <td class="fw-medium">{{ $coupon->name }}</td>
                                <td><span class="badge bg-info-subtle text-info">{{ $coupon->type == 'order' ? 'Đơn hàng' : 'Phí ship' }}</span></td>
                                <td>
                                    <span class="badge {{ $coupon->discount_type == 'percent' ? 'bg-warning-subtle text-warning' : 'bg-primary-subtle text-primary' }}">
                                        {{ $coupon->discount_type == 'percent' ? 'Phần trăm' : 'Cố định' }}
                                    </span>
                                </td>
                                <td class="fw-bold text-success">
                                    {{ $coupon->discount_type == 'percent' ? (int)$coupon->discount_amount . '%' : number_format($coupon->discount_amount, 0, ',', '.') . '₫' }}
                                </td>
                                <td class="text-muted">{{ \Carbon\Carbon::parse($coupon->created_at)->format('d/m/Y H:i') }}</td>
                                <td class="text-muted">{{ \Carbon\Carbon::parse($coupon->end_date)->format('d/m/Y H:i') }}</td>
                                <td>
                                    <span class="badge {{ $coupon->user_id == -1 ? 'bg-success-subtle text-success' : ($coupon->user_id == 0 ? 'bg-purple-subtle text-purple' : 'bg-secondary-subtle text-secondary') }}">
                                        {{ $coupon->user_id == -1 ? 'Toàn hệ thống' : ($coupon->user_id == 0 ? 'Mã tri ân' : 'ID: ' . $coupon->user_id) }}
                                    </span>
                                </td>
                                <td class="fw-medium">{{ $coupon->total_used }}</td>
                                <td>
                                    <span class="{{ $coupon->usage_limit == -1 ? 'badge bg-dark-subtle text-dark' : 'fw-medium' }}">
                                        {{ $coupon->usage_limit == -1 ? 'Không giới hạn' : number_format($coupon->usage_limit, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge rounded-pill py-1 px-2 {{ $coupon->status == 1 ? 'bg-success' : ($coupon->status == 0 ? 'bg-secondary' : 'bg-danger') }}">
                                        {{ $coupon->status == 1 ? 'Hoạt động' : ($coupon->status == 0 ? 'Tạm dừng' : 'Đã hết hạn') }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <form action="{{ route('coupons.restore', $coupon->id) }}" method="POST" class="restore-form">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success rounded-circle p-2"><i class="fas fa-trash-restore"></i></button>
                                        </form>
                                        <form action="{{ route('coupons.forceDelete', $coupon->id) }}" method="POST" class="delete-form">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger rounded-circle p-2"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .card { border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); }
    .card-header { border-radius: 12px 12px 0 0; }
    .table thead th {
        background-color: #f8f9fa;
        color: #495057;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }
    .table tbody tr { transition: all 0.2s; }
    .table tbody tr:hover {
        background-color: #f8f9fa;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    .table tbody td { vertical-align: middle; padding: 12px 16px; }
    .rounded-circle { width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; }
    .btn { border-radius: 8px; font-weight: 500; transition: all 0.3s; display: inline-flex; align-items: center; }
    .btn-primary {
        background: linear-gradient(135deg, #4361ee 0%, #3a56e4 100%);
        border: none;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }
    .btn-success {
        background: linear-gradient(135deg, #28a745 0%, #218838 100%);
        border: none;
    }
    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }
    .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #bd2130 100%);
        border: none;
    }
    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    }
    .badge { padding: 5px 10px; border-radius: 6px; font-weight: 500; }
    .bg-purple-subtle { background-color: #f2e8ff; }
    .text-purple { color: #6f42c1; }
    @media (max-width: 768px) {
        .card-body { padding: 1.25rem; }
        .table-responsive { overflow-x: auto; }
        .table thead { display: none; }
        .table, .table tbody, .table tr, .table td { display: block; width: 100%; }
        .table tr {
            margin-bottom: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px;
        }
        .table td {
            text-align: right;
            padding-left: 50%;
            position: relative;
            border-bottom: 1px solid #e2e8f0;
            padding: 12px 15px;
        }
        .table td:last-child { border-bottom: none; text-align: center; padding-left: 15px; }
        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 15px;
            width: calc(50% - 15px);
            text-align: left;
            font-weight: 600;
            color: #495057;
        }
        .table td .d-flex { justify-content: center; }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.restore-form').forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();
            Swal.fire({
                title: 'Xác nhận khôi phục',
                text: 'Bạn có chắc chắn muốn khôi phục mã giảm giá này?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Khôi phục',
                cancelButtonText: 'Hủy bỏ',
                reverseButtons: true
            }).then(result => { if (result.isConfirmed) form.submit(); });
        });
    });

    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();
            Swal.fire({
                title: 'Xác nhận xóa vĩnh viễn',
                text: 'Mã giảm giá sẽ bị xoá vĩnh viễn và không thể khôi phục!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Xoá vĩnh viễn',
                cancelButtonText: 'Hủy bỏ',
                reverseButtons: true
            }).then(result => { if (result.isConfirmed) form.submit(); });
        });
    });

    if (window.innerWidth <= 768) {
        document.querySelectorAll('tbody tr').forEach(row => {
            const cells = row.querySelectorAll('td');
            const headers = document.querySelectorAll('thead th');
            cells.forEach((cell, index) => {
                if (index < headers.length - 1) cell.setAttribute('data-label', headers[index].textContent);
            });
        });
    }

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