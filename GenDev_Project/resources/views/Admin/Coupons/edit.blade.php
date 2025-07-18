@extends('Admin.layouts.master-without-page-title')

@section('title', isset($coupon) ? 'Cập nhật mã giảm giá' : 'Thêm mã giảm giá')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($coupon) ? 'Cập nhật mã giảm giá' : 'Thêm mã giảm giá mới' }}</h2>

    <form action="{{ isset($coupon) ? route('coupons.update', $coupon->id) : route('coupons.store') }}" method="POST">
        @csrf
        @if(isset($coupon))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name">Tên mã</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $coupon->name ?? '') }}">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="coupon_code">Mã code</label>
            <input type="text" name="coupon_code" class="form-control @error('coupon_code') is-invalid @enderror"
                value="{{ old('coupon_code', $coupon->coupon_code ?? '') }}">
            @error('coupon_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Loại mã</label>
            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                <option value="order" {{ old('type', $coupon->type ?? '') == 'order' ? 'selected' : '' }}>Giảm giá đơn hàng</option>
                <option value="shipping" {{ old('type', $coupon->type ?? '') == 'shipping' ? 'selected' : '' }}>Giảm giá phí ship</option>
            </select>
            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <!-- Trường shipping_code ẩn -->
        <input type="hidden" name="shipping_code" id="shipping_code" value="{{ old('shipping_code', $coupon->shipping_code ?? ($coupon->type == 'shipping' ? $coupon->discount_type : '')) }}">
        
        <div id="discountTypeGroup" class="mb-3">
            <label for="discount_type" class="form-label">Kiểu giảm giá</label>
            <select name="discount_type" id="discount_type" class="form-select @error('discount_type') is-invalid @enderror">
                <option value="percent" {{ old('discount_type', $coupon->discount_type ?? '') == 'percent' ? 'selected' : '' }}>Phần trăm (%)</option>
                <option value="fixed" {{ old('discount_type', $coupon->discount_type ?? '') == 'fixed' ? 'selected' : '' }}>Cố định (VNĐ)</option>
            </select>
            @error('discount_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div id="discountAmountGroup" class="mb-3">
            <label for="discount_amount" class="form-label" id="discountAmountLabel">
                {{ old('type', $coupon->type ?? '') == 'shipping' ? 'Số tiền giảm phí ship' : 'Giá trị giảm' }}
            </label>
            <input type="number" step="0.01" name="discount_amount" id="discount_amount" class="form-control @error('discount_amount') is-invalid @enderror" value="{{ old('discount_amount', $coupon->discount_amount ?? '') }}">
            @error('discount_amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <script>
            function toggleDiscountType() {
                const type = document.getElementById('type').value;
                const discountTypeGroup = document.getElementById('discountTypeGroup');
                const discountAmountLabel = document.getElementById('discountAmountLabel');
                const discountTypeSelect = document.getElementById('discount_type');
                const shippingCodeInput = document.getElementById('shipping_code');

                if(type === 'shipping') {
                    discountTypeGroup.style.display = 'none';
                    discountTypeSelect.value = 'fixed';
                    discountTypeSelect.disabled = true;
                    shippingCodeInput.value = 'fixed';
                    discountAmountLabel.textContent = 'Số tiền giảm phí ship';
                } else {
                    discountTypeGroup.style.display = 'block';
                    discountTypeSelect.disabled = false;
                    discountAmountLabel.textContent = 'Giá trị giảm';
                    shippingCodeInput.value = '';
                }
            }

            function initializeForm() {
                const type = document.getElementById('type').value;
                const discountTypeSelect = document.getElementById('discount_type');
                const shippingCodeInput = document.getElementById('shipping_code');
                if(type === 'shipping') {
                    discountTypeSelect.value = 'fixed';
                    discountTypeSelect.disabled = true;
                    shippingCodeInput.value = 'fixed';
                } else {
                    discountTypeSelect.disabled = false;
                    shippingCodeInput.value = '';
                }
                toggleDiscountType();
            }

            document.getElementById('type').addEventListener('change', toggleDiscountType);
            window.addEventListener('DOMContentLoaded', initializeForm);
        </script>

        <div class="mb-3">
            <label for="user_id">Người sử dụng</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                <option value="-1" {{ old('user_id', isset($coupon->user_id) ? $coupon->user_id : -1) == -1 ? 'selected' : '' }}>Toàn bộ hệ thống</option>
                <option value="0" {{ old('user_id', isset($coupon->user_id) ? $coupon->user_id : -1) == 0 ? 'selected' : '' }}>Mã tri ân</option>
            </select>
            @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="datetime-local" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                value="{{ old('start_date', isset($coupon->start_date) ? \Carbon\Carbon::parse($coupon->start_date)->format('Y-m-d\TH:i') : '') }}">
            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="end_date">Ngày hết hạn</label>
            <input type="datetime-local" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                value="{{ old('end_date', isset($coupon->end_date) ? \Carbon\Carbon::parse($coupon->end_date)->format('Y-m-d\TH:i') : '') }}">
            @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="status">Trạng thái</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
                <option value="">-- Chọn trạng thái --</option>
                <option value="1" {{ old('status', $coupon->status ?? '') == '1' ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ old('status', $coupon->status ?? '') == '0' ? 'selected' : '' }}>Tạm dừng</option>
            </select>
            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="usage_limit">Giới hạn sử dụng (toàn hệ thống)</label>
            <input type="number" name="usage_limit" class="form-control @error('usage_limit') is-invalid @enderror"
                value="{{ old('usage_limit', isset($coupon->usage_limit) ? (int)$coupon->usage_limit : '') }}">
            @error('usage_limit') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="per_use_limit">Giới hạn mỗi người</label>
            <input type="number" name="per_use_limit" class="form-control @error('per_use_limit') is-invalid @enderror"
                value="{{ old('per_use_limit', isset($coupon->per_use_limit) ? (int)$coupon->per_use_limit : '') }}">
            @error('per_use_limit') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="min_coupon">Đơn tối thiểu áp dụng</label>
            <input type="number" name="min_coupon" class="form-control @error('min_coupon') is-invalid @enderror"
                value="{{ old('min_coupon', isset($coupon->min_coupon) ? (int)$coupon->min_coupon : '') }}">
            @error('min_coupon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3" id="maxCouponWrapper">
            <label for="max_coupon">Giảm tối đa</label>
            <input type="number" name="max_coupon" id="max_coupon" class="form-control @error('max_coupon') is-invalid @enderror"
                value="{{ old('max_coupon', isset($coupon->max_coupon) ? (int)$coupon->max_coupon : 0) }}">
            @error('max_coupon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">{{ isset($coupon) ? 'Cập nhật' : 'Tạo mã' }}</button>
        <a href="{{ route('coupons.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const discountType = document.getElementById('discount_type');
        const maxCouponWrapper = document.getElementById('maxCouponWrapper');
        const maxCouponInput = document.getElementById('max_coupon');

        function toggleMaxCoupon() {
            if (discountType.value === 'fixed') {
                maxCouponWrapper.style.display = 'none';
                maxCouponInput.value = 0;
            } else {
                maxCouponWrapper.style.display = '';
            }
        }

        toggleMaxCoupon();
        discountType.addEventListener('change', toggleMaxCoupon);
    });
</script> --}}
@endsection
