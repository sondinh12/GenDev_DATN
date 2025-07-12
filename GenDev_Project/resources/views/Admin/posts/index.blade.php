@extends('Admin.layouts.master-without-page-title')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Danh sách bài viết</h1>
        <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Thêm bài viết</a>
    </div>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Tiêu đề</th>
                <th class="px-4 py-2 border">Danh mục</th>
                <th class="px-4 py-2 border">Trạng thái</th>
                <th class="px-4 py-2 border">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr class="border-t">
                <td class="px-4 py-2 border">{{ $post->id }}</td>
                <td class="px-4 py-2 border">{{ $post->title }}</td>
                <td class="px-4 py-2 border">{{ $post->category->name ?? 'Không có' }}</td>
                <td class="px-4 py-2 border">{{ $post->status }}</td>
                <td class="px-4 py-2 border space-x-2">
                    <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 hover:underline">Sửa</a>

                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Xóa</button>
                    </form>

                    <a href="{{ route('posts.history', $post->id) }}" class="text-green-500 hover:underline">Lịch sử</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
