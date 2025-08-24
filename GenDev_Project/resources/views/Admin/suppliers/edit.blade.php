@extends('Admin.layouts.master-without-page-title')

@section('title', 'Sửa nhà cung cấp')

@section('content')
    <h2>Sửa nhà cung cấp</h2>
    <form action="{{route('admin.suppliers.update',$supplier->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Tên nhà cung cấp</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name',$supplier->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Điện thoại nhà cung cấp</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone',$supplier->phone) }}">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email nhà cung cấp</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email',$supplier->email) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Địa chỉ nhà cung cấp</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                value="{{ old('address',$supplier->address) }}">
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Sửa</button>
    </form>
    <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection