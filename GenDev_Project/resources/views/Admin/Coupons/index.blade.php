@extends('Admin.layouts.master-without-page-title')

@section('title', 'Danh sách mã giảm giá')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary"><i class="fas fa-tag me-2"></i>Danh sách mã giảm giá</h4>

        <div class="d-flex gap-3">
            {{-- SEARCH: đổi sang form GET --}}
            <form method="GET" action="{{ route('coupons.index') }}" class="search-box">
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    class="form-control ps-4"
                    placeholder="Tìm kiếm mã, tên, giá trị..."
                >
                <button class="btn btn-link text-secondary" type="submit" aria-label="Tìm kiếm">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            {{-- nút reset filter khi đang có q --}}
            @if(request('q'))
                <a href="{{ route('coupons.index') }}" class="btn btn-outline-secondary">
                    Xóa lọc
                </a>
            @endif

            <a href="{{ route('coupons.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-1"></i>Thêm mã mới
            </a>
            <a href="{{ route('admin.coupons.trashed') }}" class="btn btn-outline-danger position-relative">
                <i class="fa fa-trash me-1"></i>Thùng rác
                @if(isset($trashedCount) && $trashedCount > 0)
                    <span class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle">{{ $trashedCount }}</span>
                @endif
            </a>
        </div>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
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
                            <th class="py-3 text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($coupons as $index => $coupon)
                        <tr>
                            <td class="fw-medium">{{ $index + $coupons->firstItem() }}</td>
                            <td><span class="badge bg-light text-dark border fs-6 fw-medium">{{ $coupon->coupon_code ?? 'Chưa có mã' }}</span></td>
                            <td class="fw-medium">{{ $coupon->name }}</td>
                            <td><span class="badge bg-info-subtle text-info">{{ $coupon->type == 'order' ? 'Đơn hàng' : 'Phí ship' }}</span></td>
                            <td>
                                <span class="badge {{ $coupon->discount_type == 'percent' ? 'bg-warning-subtle text-warning' : 'bg-primary-subtle text-primary' }}">
                                    {{ $coupon->discount_type == 'percent' ? 'Phần trăm' : 'Cố định' }}
                                </span>
                            </td>
                            <td class="fw-bold text-green">
                                {{ $coupon->discount_type == 'percent' ? (int)$coupon->discount_amount . '%' : number_format($coupon->discount_amount, 0, ',', '.') . '₫' }}
                            </td>
                            <td class="text-muted">{{ \Carbon\Carbon::parse($coupon->created_at)->format('d/m/Y H:i') }}</td>
                            <td class="text-muted">{{ \Carbon\Carbon::parse($coupon->end_date)->format('d/m/Y H:i') }}</td>
                            <td>
                                <span class="badge {{ $coupon->user_id == -1 ? 'bg-green-subtle text-green' : ($coupon->user_id == 0 ? 'bg-purple-subtle text-purple' : 'bg-secondary-subtle text-secondary') }}">
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
                                <span class="badge rounded-pill py-1 px-2 {{ $coupon->status == 1 ? 'bg-green' : ($coupon->status == 0 ? 'bg-secondary' : 'bg-danger') }}">
                                    {{ $coupon->status == 1 ? 'Hoạt động' : ($coupon->status == 0 ? 'Tạm dừng' : 'Đã hết hạn') }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-sm btn-warning rounded-circle p-2"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" class="delete-form">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-circle p-2"><i class="fas fa-trash fa-sm"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center text-muted">
                                    <i class="fas fa-tags fa-3x mb-3"></i>
                                    <p class="mb-0 fs-5">Không có mã giảm giá nào</p>
                                    <p class="mt-2">Hãy thêm mã giảm giá mới để bắt đầu</p>
                                    <a href="{{ route('coupons.create') }}" class="btn btn-primary mt-3"><i class="fa fa-plus me-1"></i>Thêm mã mới</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Phân trang: controller đã appends(q) --}}
    <div class="d-flex justify-content-end mt-4">
        {{ $coupons->links() }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    :root{
        --primary:#4361ee; --secondary:#6c757d; --green:#48c9b0; --warning:#ffc107; --danger:#dc3545; --light:#f8f9fa; --purple:#6f42c1;
        /* paginate green scheme */
        --pg-green-1:#8fd19e; --pg-green-2:#6fcf97; --pg-green-hover-1:#7acb8a; --pg-green-hover-2:#58b377; --pg-green-active-1:#48c9b0; --pg-green-active-2:#38a169;
    }

    body{background-color:#f8fafc}

    /* Search box */
    .search-box{
        display:flex;align-items:center;height:38px;width:280px;background:#fff;border:1px solid #dee2e6;border-radius:8px;transition:.3s
    }
    .search-box:focus-within{border-color:var(--primary);box-shadow:0 0 0 .25rem rgba(67,97,238,.15)}
    .search-box input{border:0;padding:0 15px 0 40px;height:100%;width:100%;outline:0;background:transparent}
    .search-box button{border:0;padding:0;height:100%;width:40px;display:flex;align-items:center;justify-content:center;color:#6c757d;transition:.3s}
    .search-box button:hover{color:var(--primary)}

    /* Buttons */
    .btn{border-radius:8px;transition:.3s;display:inline-flex;align-items:center}
    .btn-primary{background:linear-gradient(135deg,var(--primary) 0%,#3a56e4 100%);border:0}
    .btn-primary:hover{transform:translateY(-2px);box-shadow:0 4px 12px rgba(67,97,238,.3)}
    .btn-outline-danger{border:1px solid var(--danger);color:var(--danger)}
    .btn-outline-danger:hover{background:var(--danger);color:#fff;transform:translateY(-2px)}
    .btn-warning{background:linear-gradient(135deg,#ffd166 0%,#ffbf69 100%);color:#6d4c00;border:0}
    .btn-warning:hover{background:linear-gradient(135deg,#ffca58 0%,#ffb347 100%);transform:translateY(-2px)}
    .btn-danger{background:linear-gradient(135deg,#ef476f 0%,#e63946 100%);border:0}
    .btn-danger:hover{background:linear-gradient(135deg,#e0365e 0%,#d42c3a 100%);transform:translateY(-2px)}

    /* Badges & helpers */
    .badge{padding:5px 10px;border-radius:6px;font-weight:500}
    .bg-purple-subtle{background:#f2e8ff}.text-purple{color:var(--purple)}
    .bg-green-subtle{background:#e6f8f5}.text-green{color:var(--green)}.bg-green{background:var(--green)}

    /* Card & table */
    .card{border-radius:12px;overflow:hidden;border:0}
    .table thead th{font-weight:600;color:#495057;text-transform:uppercase;font-size:.85rem;letter-spacing:.5px}
    .table tbody tr{transition:.2s}
    .table tbody tr:hover{background:#f8f9fa;transform:translateY(-1px);box-shadow:0 4px 12px rgba(0,0,0,.05)}
    .table tbody td{vertical-align:middle;padding:12px 16px}
    .rounded-circle{width:34px;height:34px;display:inline-flex;align-items:center;justify-content:center}

    /* Pagination - xanh lá nhạt */
    .pagination .page-link{
        border-radius:8px;margin:0 4px;border:0;color:#fff;background:linear-gradient(135deg,var(--pg-green-1) 0%,var(--pg-green-2) 100%);
        box-shadow:0 2px 5px rgba(0,0,0,.05);transition:.3s
    }
    .pagination .page-link:hover{background:linear-gradient(135deg,var(--pg-green-hover-1) 0%,var(--pg-green-hover-2) 100%);transform:translateY(-2px)}
    .pagination .active .page-link{
        background:linear-gradient(135deg,var(--pg-green-active-1) 0%,var(--pg-green-active-2) 100%);color:#fff;font-weight:600;transform:scale(1.05)
    }
    .pagination .disabled .page-link{background:#e9ecef;color:#6c757d;cursor:not-allowed}

    @media (max-width:992px){
        .d-flex.justify-content-between.align-items-center{flex-direction:column;gap:15px;align-items:flex-start}
        .d-flex.gap-3{width:100%;flex-wrap:wrap}
        .btn{flex:1;min-width:160px}.search-box{width:100%;margin-bottom:10px}
    }
    @media (max-width:768px){
        .d-flex.gap-3{gap:10px}
        .table-responsive{overflow-x:auto}
        .table thead{display:none}
        .table,.table tbody,.table tr,.table td{display:block;width:100%}
        .table tr{margin-bottom:20px;border:1px solid #e2e8f0;border-radius:10px;padding:10px}
        .table td{text-align:right;padding-left:50%;position:relative;border-bottom:1px solid #e2e8f0;padding:12px 15px}
        .table td:last-child{border-bottom:0}
        .table td::before{content:attr(data-label);position:absolute;left:15px;width:calc(50% - 15px);text-align:left;font-weight:600;color:#495057}
        .table td .d-flex{justify-content:flex-end}
        .table td .badge{float:right}
        .pagination{flex-wrap:wrap;justify-content:center}
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Mobile: thêm data-label từ thead
    const setDataLabels = () => {
        if (window.innerWidth > 768) return;
        const headers = [...document.querySelectorAll('thead th')].map(th => th.textContent.trim());
        document.querySelectorAll('tbody tr').forEach(row => {
            row.querySelectorAll('td').forEach((td, i) => headers[i] && td.setAttribute('data-label', headers[i]));
        });
    };
    setDataLabels();

    // Xác nhận xóa (SweetAlert)
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();
            Swal.fire({
                title: 'Xác nhận xóa',
                text: 'Mã giảm giá sẽ được chuyển vào thùng rác!',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Xác nhận xóa',
                cancelButtonText: 'Hủy bỏ',
                reverseButtons: true
            }).then(r => r.isConfirmed && form.submit());
        });
    });

    // Toast helper
    const toast = (icon, title, text) => Swal.fire({icon, title, text, confirmButtonColor:'#3085d6', toast:true, position:'top-end', showConfirmButton:false, timer:3000});
    @if (session('success')) toast('success','Thành công!','{{ session('success') }}'); @endif
    @if (session('error')) toast('error','Lỗi!','{{ session('error') }}'); @endif
});
</script>
@endsection
