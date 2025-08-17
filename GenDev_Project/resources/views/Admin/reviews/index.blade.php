@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Đánh giá')

@section('content')
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Quản lí bình luận</h5>
            <form method="GET" style="max-width: 300px; width: 100%;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm đánh giá...."
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary"></i>Tìm</button>
                </div>
            </form>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Người đánh giá</th>
                        <th scope="col">Số sao</th>
                        <th scope="col">Bình luận</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->product->name }}</td>
                            <td>{{ $question->user->name }}<br><small>{{ $question->user->email }}</small></td>

                            <td>{{ Str::limit($question->question, 50) }}</td>
                            <td>{{ $question->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                @if ($question->status === 'approved')
                                    <span class="badge bg-success">Hiển thị</span>
                                @else
                                    <span class="badge bg-danger">Đã ẩn</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('reviews.show', $question->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Xem
                                </a>
                                @if ($question->status === 'approved')
                                    <form action="{{ route('reviews.violation', $question->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm btn-warning"
                                            onclick="return confirm('Ẩn đánh giá và xử lý vi phạm?')">
                                            <i class="fas fa-flag"></i> Ẩn & Cảnh báo
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $questions->links() }}
        </div>
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

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endpush
