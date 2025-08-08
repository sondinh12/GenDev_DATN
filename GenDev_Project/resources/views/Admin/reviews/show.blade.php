@extends('Admin.layouts.master-without-page-title')

@section('title', 'Chi tiết Đánh giá')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0">Chi tiết đánh giá</h5>
        </div>
        <div class="card-body">
            <p><strong>Sản phẩm:</strong> {{ $question->product->name }}</p>
            <p><strong>Người đánh giá:</strong> {{ $question->user->name }} ({{ $question->user->email }})</p>
            <p><strong>Số sao:</strong>
                @for($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star{{ $i <= $question->rating ? '' : '-o' }} text-warning"></i>
                @endfor
            </p>
            <p><strong>Bình luận:</strong><br>{{ $question->comment }}</p>
            <p><strong>Trạng thái:</strong>
                @if($question->status === 'approved')
                    <span class="badge bg-success">Hiển thị</span>
                @else
                    <span class="badge bg-danger">Đã ẩn</span>
                @endif
            </p>
            <p><strong>Thời gian:</strong> {{ $question->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Số lần vi phạm:</strong> 
               @if($question->user->violation_count == 0)
                    <span class="badge bg-success">Chưa vi phạm</span>
                @elseif($question->user->violation_count == 1)
                    <span class="badge bg-warning">Đã cảnh cáo 1 lần</span>
                @else
                    <span class="badge bg-danger">Vi phạm nhiều lần</span>
                @endif
            </p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection
