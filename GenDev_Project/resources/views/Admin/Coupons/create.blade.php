@extends('Admin.layouts.master-without-page-title')

@section('title', 'Thêm mã giảm giá')

@section('content')
<div class="container mt-4">
    <h2>Thêm mã giảm giá mới</h2>

    <form action="{{ route('coupons.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Tên mã</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="coupon_code">Mã code</label>
            <input type="text" name="coupon_code" class="form-control @error('coupon_code') is-invalid @enderror" value="{{ old('coupon_code') }}">
            @error('coupon_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="discount_type">Loại giảm giá</label>
            <select name="discount_type" class="form-control @error('discount_type') is-invalid @enderror" id="discount_type">
                <option value="">-- Chọn loại giảm --</option>
                <option value="percent" {{ old('discount_type') == 'percent' ? 'selected' : '' }}>Phần trăm</option>
                <option value="fixed" {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>Cố định</option>
            </select>
            @error('discount_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="discount_amount">Giá trị giảm</label>
            <input type="number" name="discount_amount" class="form-control @error('discount_amount') is-invalid @enderror" value="{{ old('discount_amount') }}">
            @error('discount_amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="datetime-local" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="end_date">Ngày hết hạn</label>
            <input type="datetime-local" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
            @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

            <input type="hidden" name="status" value="1">

        <div class="mb-3">
            <label for="usage_limit">Giới hạn sử dụng (toàn hệ thống)</label>
            <input type="number" name="usage_limit" class="form-control @error('usage_limit') is-invalid @enderror" value="{{ old('usage_limit') }}">
            @error('usage_limit') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="per_use_limit">Giới hạn mỗi người</label>
            <input type="number" name="per_use_limit" class="form-control @error('per_use_limit') is-invalid @enderror" value="{{ old('per_use_limit') }}">
            @error('per_use_limit') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="min_coupon">Đơn tối thiểu áp dụng</label>
            <input type="number" name="min_coupon" class="form-control @error('min_coupon') is-invalid @enderror" value="{{ old('min_coupon') }}">
            @error('min_coupon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3" id="maxCouponWrapper">
            <label for="max_coupon">Giảm tối đa</label>
            <input type="number" name="max_coupon" id="max_coupon_input" class="form-control @error('max_coupon') is-invalid @enderror" value="{{ old('max_coupon', 0) }}">
            @error('max_coupon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Tạo mã</button>
        <a href="{{ route('coupons.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<!-- Script xử lý max_coupon khi chọn loại giảm -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const discountTypeSelect = document.getElementById('discount_type');
        const maxCouponWrapper = document.getElementById('maxCouponWrapper');
        const maxCouponInput = document.getElementById('max_coupon_input');

        function toggleMaxCouponField() {
            if (discountTypeSelect.value === 'fixed') {
                maxCouponWrapper.style.display = 'none';
                maxCouponInput.value = 0;
            } else {
                maxCouponWrapper.style.display = '';
            }
        }

        toggleMaxCouponField();
        discountTypeSelect.addEventListener('change', toggleMaxCouponField);
    });
</script>
@endsection
