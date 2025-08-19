@extends('Admin.layouts.master-without-page-title')

@section('title', 'Danh sách mã giảm giá')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Danh sách mã giảm giá</h3>
            {{-- SEARCH: đổi sang form GET --}}
            <form method="GET" action="{{ route('coupons.index') }}" style="max-width: 300px; width: 100%;">
                <div class="input-group">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                        placeholder="Tìm kiếm mã, tên, giá trị...">
                    <button class="btn btn-outline-secondary" type="submit">Tìm</button>
                </div>

                {{-- nút reset filter khi đang có q --}}
                {{-- @if (request('q'))
                    <a href="{{ route('coupons.index') }}" class="btn btn-outline-secondary">
                        Xóa lọc
                    </a>
                @endif --}}
            </form>

        </div>

        <div class="card-body py-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('coupons.create') }}" class="btn btn-outline-primary mb-3"><i
                    class="fas fa-plus me-1"></i>Thêm mã giảm giá
            </a>
            <a href="{{ route('admin.coupons.trashed') }}" class="btn btn-outline-danger mb-3 float-end position-relative">
                <i class="fa fa-trash me-1"></i>Thùng rác
                @if (isset($trashedCount) && $trashedCount > 0)
                    <span
                        class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle">{{ $trashedCount }}</span>
                @endif
            </a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Mã</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Loại mã</th>
                        <th scope="col">Kiểu giảm</th>
                        <th scope="col">Giá trị</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Hết hạn</th>
                        <th scope="col">Người sử dụng</th>
                        <th scope="col">Đã dùng</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coupons as $index => $coupon)
                        <tr>
                            <td class="fw-medium">{{ $index + $coupons->firstItem() }}</td>
                            <td><span
                                    class="badge bg-light text-dark border fs-6 fw-medium">{{ $coupon->coupon_code ?? 'Chưa có mã' }}</span>
                            </td>
                            <td class="fw-medium">{{ $coupon->name }}</td>
                            <td>
                                <span
                                    class="badge
                                    {{ $coupon->type == 'order' ? 'bg-danger-subtle text-danger' : 'bg-warning-subtle text-warning' }}">
                                    {{ $coupon->type == 'order' ? 'Đơn hàng' : 'Phí ship' }}
                                </span>
                            </td>

                            <td>
                                <span
                                    class="badge {{ $coupon->discount_type == 'percent' ? 'bg-success-subtle text-success' : 'bg-info-subtle text-info' }}">
                                    {{ $coupon->discount_type == 'percent' ? 'Phần trăm' : 'Cố định' }}
                                </span>
                            </td>
                            <td class="fw-bold text-green">
                                {{ $coupon->discount_type == 'percent' ? (int) $coupon->discount_amount . '%' : number_format($coupon->discount_amount, 0, ',', '.') . '₫' }}
                            </td>
                            <td class="text-muted">
                                {{ \Carbon\Carbon::parse($coupon->created_at)->format('d/m/Y H:i') }}</td>
                            <td class="text-muted">
                                {{ \Carbon\Carbon::parse($coupon->end_date)->format('d/m/Y H:i') }}</td>
                            <td>
                                <span
                                    class="badge rounded-pill px-2 py-1 fw-bold {{ $coupon->user_id == -1 ? 'bg-success text-white' : ($coupon->user_id == 0 ? 'bg-purple text-white' : 'bg-secondary text-white') }}">
                                    {{ $coupon->user_id == -1 ? 'Toàn hệ thống' : ($coupon->user_id == 0 ? 'Mã tri ân' : 'ID: ' . $coupon->user_id) }}
                                </span>
                            </td>
                            <td class="fw-medium">{{ $coupon->total_used }}</td>
                            <td>
                                <span
                                    class="{{ $coupon->usage_limit == -1 ? 'badge bg-dark-subtle text-dark' : 'fw-medium' }}">
                                    {{ $coupon->usage_limit == -1 ? 'Không giới hạn' : number_format($coupon->usage_limit, 0, ',', '.') }}
                                </span>
                            </td>
                            <td>
                                <span
                                    class="badge rounded-pill px-2 py-1 fw-bold {{ $coupon->status == 1 ? 'bg-success text-white' : ($coupon->status == 0 ? 'bg-secondary text-white' : 'bg-danger text-white') }}">
                                    {{ $coupon->status == 1 ? 'Hoạt động' : ($coupon->status == 0 ? 'Tạm dừng' : 'Đã hết hạn') }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('coupons.edit', $coupon->id) }}"
                                        class="btn btn-sm btn-outline-warning rounded-pill px-3 d-flex align-items-center justify-content-center"
                                        style="height: 32px;" data-bs-toggle="tooltip" title="Chỉnh sửa">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-outline-danger rounded-pill px-3 d-flex align-items-center justify-content-center"
                                            style="height: 32px;" data-bs-toggle="tooltip" title="Chuyển vào thùng rác">
                                            <i class="fas fa-trash"></i>
                                        </button>
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
                                    <a href="{{ route('coupons.create') }}" class="btn btn-primary mt-3"><i
                                            class="fa fa-plus me-1"></i>Thêm mã mới</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $coupons->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Mobile: thêm data-label từ thead
            const setDataLabels = () => {
                if (window.innerWidth > 768) return;
                const headers = [...document.querySelectorAll('thead th')].map(th => th.textContent.trim());
                document.querySelectorAll('tbody tr').forEach(row => {
                    row.querySelectorAll('td').forEach((td, i) => headers[i] && td.setAttribute(
                        'data-label', headers[i]));
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
            const toast = (icon, title, text) => Swal.fire({
                icon,
                title,
                text,
                confirmButtonColor: '#3085d6',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            @if (session('success'))
                toast('success', 'Thành công!', '{{ session('success') }}');
            @endif
            @if (session('error'))
                toast('error', 'Lỗi!', '{{ session('error') }}');
            @endif
        });
    </script>
@endsection
