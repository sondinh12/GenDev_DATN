@extends('Admin.layouts.master-without-page-title')

@section('title', 'Thùng rác phiếu nhập')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>🗑 Phiếu nhập đã xóa</h3>
            <a href="{{ route('admin.imports.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Nhà cung cấp</th>
                        <th scope="col">Ngày nhập</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col" class="text-center">Hành động</th>
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
                                    <button class="btn btn-outline-success btn-sm"> Khôi phục</button>
                                </form>
                                <form action="{{ route('admin.imports.forceDelete', $import->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Xóa vĩnh viễn phiếu này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm"> Xóa vĩnh viễn</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">Không có phiếu nào trong thùng rác.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
