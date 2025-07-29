@extends('Admin.layouts.master')

@section('title', 'Thùng rác phiếu nhập')

@section('content')
<div class="container mt-4">
    <h3>🗑 Phiếu nhập đã xóa</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Nhà cung cấp</th>
                <th>Ngày nhập</th>
                <th>Tổng tiền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($imports as $import)
                <tr>
                    <td>{{ $import->id }}</td>
                    <td>{{ $import->supplier->name ?? '[N/A]' }}</td>
                    <td>{{ $import->import_date }}</td>
                    <td>{{ number_format($import->total_cost) }} VNĐ</td>
                    <td>
                        <form action="{{ route('admin.imports.restore', $import->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button class="btn btn-success btn-sm">♻ Khôi phục</button>
                        </form>
                        <form action="{{ route('admin.imports.forceDelete', $import->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Xóa vĩnh viễn phiếu này?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">❌ Xóa vĩnh viễn</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Không có phiếu nào trong thùng rác.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
