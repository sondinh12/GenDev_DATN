@extends('Admin.layouts.master-without-page-title')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Sửa bài viết</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block font-medium">Tiêu đề</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="border p-2 w-full">
        </div>

        <div>
            <label for="thumbnail_url" class="block font-medium">Ảnh Thumbnail (URL)</label>
            <input type="text" id="thumbnail_url" name="thumbnail_url" value="{{ old('thumbnail_url', $post->thumbnail_url) }}" class="border p-2 w-full">
        </div>

        <div>
            <label for="content" class="block font-medium">Nội dung</label>
            <textarea id="content" name="content" rows="6" class="border p-2 w-full">{{ old('content', $post->content) }}</textarea>
        </div>

        <div>
            <label for="excerpt" class="block font-medium">Tóm tắt</label>
            <textarea id="excerpt" name="excerpt" rows="3" class="border p-2 w-full">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>

        <div>
            <label for="slug" class="block font-medium">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" class="border p-2 w-full">
        </div>

        <div>
            <label for="status" class="block font-medium">Trạng thái</label>
            <select id="status" name="status" class="border p-2 w-full">
                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <div>
            <label for="post_category_id" class="block font-medium">Danh mục</label>
            <select id="post_category_id" name="post_category_id" class="border p-2 w-full">
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('post_category_id', $post->post_category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="published_at" class="block font-medium">Ngày đăng</label>
            <input type="datetime-local" id="published_at" name="published_at" 
                value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}" 
                class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Cập nhật</button>
        <a href="{{ route('posts.index') }}" class="text-gray-600 hover:underline ml-2">Quay lại</a>
    </form>
</div>
@endsection
