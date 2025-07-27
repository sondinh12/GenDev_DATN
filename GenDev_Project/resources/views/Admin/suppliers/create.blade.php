@extends('Admin.layouts.master-without-page-title')

@section('title', 'Thêm nhà cung cấp')

@section('content')
    <h2>Thêm nhà cung cấp</h2>
    <form action="{{route('admin.suppliers.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Tên nhà cung cấp</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Điện thoại nhà cung cấp</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone') }}">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email nhà cung cấp</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Địa chỉ nhà cung cấp</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                value="{{ old('address') }}">
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Thêm</button>
    </form>
    <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection