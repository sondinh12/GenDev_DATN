@extends('Admin.layouts.master-without-page-title')

@section('title', 'Quản lý Đánh giá')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Quản lí bình luận</h5>
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
                                @foreach($reviews as $review)
                                <tr>
                                    <td>{{ $review->id }}</td>
                                    <td>{{ $review->product->name }}</td>
                                    <td>{{ $review->user->name }}<br><small>{{ $review->user->email }}</small></td>
                                    <td>
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }} text-warning"></i>
                                        @endfor
                                    </td>
                                    <td>{{ Str::limit($review->comment, 50) }}</td>
                                    <td>{{ $review->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        @if($review->status === 'approved')
                                            <span class="badge bg-success">Hiển thị</span>
                                        @else
                                            <span class="badge bg-danger">Đã ẩn</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Xem
                                        </a>
                                        @if($review->status === 'approved')
                                        <form action="{{ route('reviews.violation', $review->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-warning" onclick="return confirm('Ẩn đánh giá và xử lý vi phạm?')">
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
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
