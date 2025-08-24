@extends('Admin.layouts.master-without-page-title')

@section('title', 'Cập nhật mã giảm giá')

@section('content')
<div class="container mt-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white py-3">
            <h4 class="mb-0"><i class="fas fa-tag me-2"></i>Cập nhật mã giảm giá</h4>
        </div>
        
        <div class="card-body">
            <form action="{{ route('coupons.update', $coupon->id) }}" method="POST" id="couponForm" class="row g-4">
                @csrf @method('PUT')

                <div class="col-md-6">
                    <label for="name" class="form-label fw-medium">Tên mã <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name', $coupon->name) }}" placeholder="Nhập tên mã giảm giá">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="col-md-6">
                    <label id="couponCodeLabel" class="form-label fw-medium">Mã code <span class="text-danger">*</span></label>
                    <input type="text" name="coupon_code" id="coupon_code" 
                           class="form-control @error('coupon_code') is-invalid @enderror" 
                           value="{{ old('coupon_code', $coupon->coupon_code) }}" placeholder="Nhập mã code">
                    @error('coupon_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="type" class="form-label fw-medium">Loại mã <span class="text-danger">*</span></label>
                    <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" onchange="toggleDiscountType()">
                        <option value="order" {{ old('type', $coupon->type) == 'order' ? 'selected' : '' }}>Giảm giá đơn hàng</option>
                        <option value="shipping" {{ old('type', $coupon->type) == 'shipping' ? 'selected' : '' }}>Giảm giá phí ship</option>
                    </select>
                    @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="col-md-6" id="discountTypeGroup">
                    <label for="discount_type" class="form-label fw-medium">Kiểu giảm giá <span class="text-danger">*</span></label>
                    <select name="discount_type" id="discount_type" class="form-select @error('discount_type') is-invalid @enderror" onchange="updateDiscountType()">
                        <option value="percent" {{ old('discount_type', $coupon->discount_type) == 'percent' ? 'selected' : '' }}>Phần trăm (%)</option>
                        <option value="fixed" {{ old('discount_type', $coupon->discount_type) == 'fixed' ? 'selected' : '' }}>Cố định (VNĐ)</option>
                    </select>
                    @error('discount_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12" id="discountAmountGroup">
                    <label for="discount_amount" class="form-label fw-medium" id="discountAmountLabel">
                        {{ old('type', $coupon->type) == 'shipping' ? 'Số tiền giảm phí ship' : 'Giá trị giảm' }} <span class="text-danger">*</span>
                    </label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-percentage" id="discountIcon"></i></span>
                        <input type="number" step="1" name="discount_amount" id="discount_amount"
                            class="form-control @error('discount_amount') is-invalid @enderror"
                            value="{{ old('discount_amount', (int)$coupon->discount_amount) }}" placeholder="Nhập giá trị giảm" >
                        @error('discount_amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="user_id" class="form-label fw-medium">Người sử dụng <span class="text-danger">*</span></label>
                    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                        <option value="-1" {{ old('user_id', $coupon->user_id) == -1 ? 'selected' : '' }}>Toàn bộ hệ thống</option>
                        <option value="0" {{ old('user_id', $coupon->user_id) == 0 ? 'selected' : '' }}>Mã tri ân</option>
                    </select>
                    @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="status" class="form-label fw-medium">Trạng thái <span class="text-danger">*</span></label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="0" {{ (int)old('status', $coupon->status) === 0 ? 'selected' : '' }}>Tạm dừng</option>
                        <option value="1" {{ (int)old('status', $coupon->status) === 1 ? 'selected' : '' }}>Hoạt động</option>
                        <option value="2" {{ (int)old('status', $coupon->status) === 2 ? 'selected' : '' }}>Hết hạn</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="start_date" class="form-label fw-medium">Ngày bắt đầu</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        <input type="datetime-local" name="start_date" id="start_date"
                            class="form-control @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date', isset($coupon->start_date) ? $coupon->start_date->format('Y-m-d\TH:i') : '') }}">
                        @error('start_date') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label for="end_date" class="form-label fw-medium">Ngày hết hạn</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-calendar-times"></i></span>
                        <input type="datetime-local" name="end_date" id="end_date"
                            class="form-control @error('end_date') is-invalid @enderror"
                            value="{{ old('end_date', isset($coupon->end_date) ? $coupon->end_date->format('Y-m-d\TH:i') : '') }}">
                        @error('end_date') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="usage_limit" class="form-label fw-medium">Giới hạn sử dụng <span class="text-danger">*</span></label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                        <input type="number" step="1" name="usage_limit"
                            class="form-control @error('usage_limit') is-invalid @enderror"
                            value="{{ old('usage_limit', (int)$coupon->usage_limit) }}" placeholder="0" >
                        @error('usage_limit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <small class="form-text text-muted">Số lần sử dụng toàn hệ thống</small>
                </div>

                <div class="col-md-4">
                    <label for="per_use_limit" class="form-label fw-medium">Giới hạn mỗi người <span class="text-danger">*</span></label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="number" step="1" name="per_use_limit"
                            class="form-control @error('per_use_limit') is-invalid @enderror"
                            value="{{ old('per_use_limit', (int)$coupon->per_use_limit) }}" placeholder="0" >
                        @error('per_use_limit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <small class="form-text text-muted">Số lần mỗi người dùng</small>
                </div>

                <div class="col-md-4">
                    <label for="min_coupon" class="form-label fw-medium">Đơn tối thiểu <span class="text-danger">*</span></label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                        <input type="number" step="1" name="min_coupon"
                            class="form-control @error('min_coupon') is-invalid @enderror"
                            value="{{ old('min_coupon', (int)$coupon->min_coupon) }}" placeholder="0" min="0">
                        @error('min_coupon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <small class="form-text text-muted">Áp dụng cho đơn từ</small>
                </div>

                <div class="col-md-6" id="maxCouponWrapper">
                    <label for="max_coupon" class="form-label fw-medium">Giảm tối đa</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-tag"></i></span>
                        <input type="number" step="1" name="max_coupon" id="max_coupon_input"
                            class="form-control @error('max_coupon') is-invalid @enderror"
                            value="{{ old('max_coupon', (int)$coupon->max_coupon) }}" placeholder="0" min="0">
                        @error('max_coupon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <small class="form-text text-muted">Giới hạn giá trị giảm tối đa</small>
                </div>

                <div class="col-12 mt-4 d-flex justify-content-end gap-2">
                    <a href="{{ route('coupons.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i>Quay lại</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Cập nhật mã</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .card { border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); }
    .card-header { border-radius: 12px 12px 0 0; }
    .form-label { font-weight: 500; color: #495057; }
    .form-control, .form-select { border-radius: 8px; padding: 10px 15px; border: 1px solid #dee2e6; transition: border-color 0.3s, box-shadow 0.3s; }
    .form-control:focus, .form-select:focus { border-color: #4361ee; box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15); }
    .input-group-text { background-color: #f8fafc; border: 1px solid #dee2e6; color: #6c757d; }
    .form-control:focus + .input-group-text, .form-select:focus + .input-group-text { border-color: #4361ee; }
    .btn { border-radius: 8px; padding: 10px 20px; font-weight: 500; transition: all 0.3s; }
    .btn-primary { background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%); border: none; }
    .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3); }
    .btn-secondary { background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%); border: none; color: #fff; }
    .btn-secondary:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(108, 117, 125, 0.3); }
    .invalid-feedback, .form-text { font-size: 0.85rem; }
    @media (max-width: 768px) {
        .card-body { padding: 1.25rem; }
        .btn { width: 100%; justify-content: center; }
        .d-flex.gap-2 { gap: 10px; flex-direction: column; }
    }
</style>

<script>
function toggleDiscountType() {
    const type = document.getElementById('type').value;
    const discountTypeGroup = document.getElementById('discountTypeGroup');
    const discountAmountLabel = document.getElementById('discountAmountLabel');
    const discountTypeSelect = document.getElementById('discount_type');
    const couponCodeLabel = document.getElementById('couponCodeLabel');
    const discountIcon = document.getElementById('discountIcon');
    const maxCouponWrapper = document.getElementById('maxCouponWrapper');
    const maxCouponInput = document.getElementById('max_coupon_input');
    discountTypeGroup.style.display = 'block';
    discountTypeSelect.disabled = false;
    if (type === 'shipping') {
        couponCodeLabel.textContent = 'Mã giảm phí ship';
        discountAmountLabel.textContent = 'Số tiền giảm phí ship';
    } else {
        couponCodeLabel.textContent = 'Mã giảm đơn hàng';
        discountAmountLabel.textContent = 'Giá trị giảm';
    }
    discountIcon.className = discountTypeSelect.value === 'percent' ? 'fas fa-percentage' : 'fas fa-money-bill-wave';
    maxCouponWrapper.style.display = 'block';
    maxCouponInput.disabled = false;
}
function updateDiscountType() {
    const discountTypeSelect = document.getElementById('discount_type');
    const discountIcon = document.getElementById('discountIcon');
    const maxCouponWrapper = document.getElementById('maxCouponWrapper');
    const maxCouponInput = document.getElementById('max_coupon_input');
    discountIcon.className = discountTypeSelect.value === 'percent' ? 'fas fa-percentage' : 'fas fa-money-bill-wave';
    maxCouponWrapper.style.display = 'block';
    maxCouponInput.disabled = false;
}
document.addEventListener('DOMContentLoaded', () => {
    const discountTypeSelect = document.getElementById('discount_type');
    const discountIcon = document.getElementById('discountIcon');
    const maxCouponWrapper = document.getElementById('maxCouponWrapper');
    const maxCouponInput = document.getElementById('max_coupon_input');
    discountIcon.className = discountTypeSelect.value === 'percent' ? 'fas fa-percentage' : 'fas fa-money-bill-wave';
    maxCouponWrapper.style.display = 'block';
    maxCouponInput.disabled = false;
    toggleDiscountType();
});
</script>
@endsection