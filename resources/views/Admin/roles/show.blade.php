@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Vai trò')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Chi tiết vai trò</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Quay lại</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên vai trò:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quyền (Permissions):</strong>
                @if (!empty($rolePermissions) && count($rolePermissions))
                    @foreach ($rolePermissions as $perm)
                        <span class="badge bg-success mb-1">{{ $perm->name }}</span>
                    @endforeach
                @else
                    <span class="text-muted">Không có quyền</span>
                @endif
            </div>
        </div>
    </div>

@endsection
