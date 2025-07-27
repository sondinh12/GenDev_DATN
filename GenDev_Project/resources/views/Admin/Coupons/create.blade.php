@extends('Admin.layouts.master-without-page-title')

@section('title', 'Thêm mã giảm giá')

@section('content')
<div class="container mt-4">
    <h2>Thêm mã giảm giá mới</h2>

    <form action="{{ route('coupons.store') }}" method="POST" id="couponForm">
        @csrf

        <div class="mb-3">
            <label for="name">Tên mã</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label id="couponCodeLabel">Mã code</label>
            <input type="text" name="coupon_code" id="coupon_code" class="form-control @error('coupon_code') is-invalid @enderror" value="{{ old('coupon_code') }}" required>
            @error('coupon_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Loại mã</label>
            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" onchange="toggleDiscountFields()">
                <option value="order" {{ old('type') == 'order' ? 'selected' : '' }}>Giảm giá đơn hàng</option>
                <option value="shipping" {{ old('type') == 'shipping' ? 'selected' : '' }}>Giảm giá phí ship</option>
            </select>
            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div id="discountTypeGroup" class="mb-3">
            <label for="discount_type" class="form-label">Kiểu giảm giá</label>
            <select name="discount_type" id="discount_type" class="form-select @error('discount_type') is-invalid @enderror">
                <option value="percent" {{ old('type') != 'shipping' && old('discount_type') == 'percent' ? 'selected' : '' }}>Phần trăm (%)</option>
                <option value="fixed" {{ old('type') == 'shipping' || old('discount_type') == 'fixed' ? 'selected' : '' }}>Cố định (VNĐ)</option>
            </select>
            @error('discount_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <input type="hidden" name="discount_type" id="hidden_discount_type" value="{{ old('discount_type', 'fixed') }}">

        <div id="discountAmountGroup" class="mb-3">
            <label for="discount_amount" class="form-label" id="discountAmountLabel">
                {{ old('type') == 'shipping' ? 'Số tiền giảm phí ship' : 'Giá trị giảm' }}
            </label>
            <input type="number" step="0.01" name="discount_amount" id="discount_amount" class="form-control @error('discount_amount') is-invalid @enderror" value="{{ old('discount_amount') }}" required>
            @error('discount_amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <script>
            function toggleDiscountFields() {
                const type = document.getElementById('type').value;
                const discountTypeGroup = document.getElementById('discountTypeGroup');
                const discountAmountLabel = document.getElementById('discountAmountLabel');
                const discountTypeSelect = document.getElementById('discount_type');
                const couponCodeLabel = document.getElementById('couponCodeLabel');

                if (type === 'shipping') {
                    discountTypeGroup.style.display = 'none';
                    discountTypeSelect.value = 'fixed';
                    discountTypeSelect.disabled = true;

                    couponCodeLabel.textContent = 'Mã giảm phí ship';
                    discountAmountLabel.textContent = 'Số tiền giảm phí ship';
                } else {
                    discountTypeGroup.style.display = 'block';
                    discountTypeSelect.disabled = false;
                    discountTypeSelect.value = 'percent';

                    couponCodeLabel.textContent = 'Mã giảm đơn hàng';
                    discountAmountLabel.textContent = 'Giá trị giảm';
                }
            }

            document.addEventListener('DOMContentLoaded', toggleDiscountFields);
            document.getElementById('type').addEventListener('change', toggleDiscountFields);
        </script>

        <div class="mb-3">
            <label for="user_id">Người sử dụng</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                <option value="-1" {{ old('user_id', -1) == -1 ? 'selected' : '' }}>Toàn bộ hệ thống</option>
                <option value="0" {{ old('user_id', -1) == 0 ? 'selected' : '' }}>Mã tri ân</option>
            </select>
            @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="datetime-local" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="end_date">Ngày hết hạn</label>
            <input type="datetime-local" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" required>
            @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <input type="hidden" name="status" value="1">

        <div class="mb-3">
            <label for="usage_limit">Giới hạn sử dụng (toàn hệ thống)</label>
            <input type="number" name="usage_limit" class="form-control @error('usage_limit') is-invalid @enderror" value="{{ old('usage_limit') }}" required>
            @error('usage_limit') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="per_use_limit">Giới hạn mỗi người</label>
            <input type="number" name="per_use_limit" class="form-control @error('per_use_limit') is-invalid @enderror" value="{{ old('per_use_limit') }}" required>
            @error('per_use_limit') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="min_coupon">Đơn tối thiểu áp dụng</label>
            <input type="number" name="min_coupon" class="form-control @error('min_coupon') is-invalid @enderror" value="{{ old('min_coupon') }}" required>
            @error('min_coupon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3" id="maxCouponWrapper">
            <label for="max_coupon">Giảm tối đa</label>
            <input type="number" name="max_coupon" id="max_coupon_input" class="form-control @error('max_coupon') is-invalid @enderror" value="{{ old('max_coupon') }}">
            @error('max_coupon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Tạo mã</button>
        <a href="{{ route('coupons.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection