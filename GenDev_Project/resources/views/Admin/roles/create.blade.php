@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Vai trò')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tạo vai trò mới</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i>
                    Quay lại</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            Đã có lỗi với dữ liệu nhập vào:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên vai trò:</strong>
                    <input type="text" name="name" placeholder="Nhập tên vai trò" class="form-control"
                        value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quyền (Permissions):</strong>
                    <br />
                    @foreach ($permissions as $permission)
                        <label>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="name"
                                {{ is_array(old('permissions')) && in_array($permission->id, old('permissions')) ? 'checked' : '' }}>
                            {{ $permission->name }}
                        </label>
                        <br />
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i>
                    Lưu</button>
            </div>
        </div>
    </form>

@endsection
