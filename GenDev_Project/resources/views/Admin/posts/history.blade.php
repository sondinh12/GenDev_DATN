@extends('Admin.layouts.master-without-page-title')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lịch sử chỉnh sửa: {{ $post->title }}</h1>

    <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline mb-4 inline-block">Quay lại danh sách bài viết</a>

    @if($histories->count() > 0)
        <table class="min-w-full bg-white border border-gray-300 mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Người chỉnh</th>
                    <th class="px-4 py-2 border">Trường chỉnh</th>
                    <th class="px-4 py-2 border">Giá trị cũ</th>
                    <th class="px-4 py-2 border">Giá trị mới</th>
                    <th class="px-4 py-2 border">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histories as $history)
                    <tr class="border-t">
                        <td class="px-4 py-2 border">{{ $history->user->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">
                            @foreach(json_decode($history->fields_changed, true) as $field)
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $field }}</span>
                            @endforeach
                        </td>
                        <td class="px-4 py-2 border text-xs break-all">
                            <pre class="whitespace-pre-wrap">{{ json_encode(json_decode($history->old_value, true), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                        </td>
                        <td class="px-4 py-2 border text-xs break-all">
                            <pre class="whitespace-pre-wrap">{{ json_encode(json_decode($history->new_value, true), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                        </td>
                        <td class="px-4 py-2 border">{{ $history->created_at->format('H:i d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Chưa có lịch sử chỉnh sửa nào cho bài viết này.</p>
    @endif
</div>
@endsection
