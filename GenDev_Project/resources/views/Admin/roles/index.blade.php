@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Vai trò')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Quản lý vai trò</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success btn-sm mb-2" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Thêm vai
                    trò</a>
            </div>
        </div>
    </div>


    {{-- @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif --}}


    <table class="table table-bordered">
        <tr>
            <th width="60px">STT</th>
            <th>Tên vai trò</th>
            <th>Quyền</th>
            <th width="220px">Hành động</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ($roles->currentPage() - 1) * $roles->perPage() + $loop->iteration }}</td>
                <td>{{ ucfirst($role->name) }}</td>
                <td>
                    @if ($role->permissions->count())
                        <span class="badge bg-info">{{ $role->permissions->count() }} quyền</span>
                        <div style="font-size:12px;">
                            @foreach ($role->permissions as $perm)
                                <span class="badge bg-secondary mb-1">{{ $perm->name }}</span>
                            @endforeach
                        </div>
                    @else
                        <span class="text-muted">Không có quyền</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}"><i
                            class="fa-solid fa-list"></i> Xem</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}"><i
                            class="fa-solid fa-pen-to-square"></i> Sửa</a>
                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline"
                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa vai trò này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                            Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {!! $roles->links() !!}
    </div>

@endsection
@push('scripts')
{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Flash Message --}}
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif
@endpush
