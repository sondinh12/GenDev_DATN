@extends('Admin.layouts.master-without-page-title')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Thêm bài viết</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="title">Tiêu đề</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="border p-2 w-full">
        </div>

        <div>
            <label for="thumbnail_url">Ảnh Thumbnail (URL)</label>
            <input type="text" name="thumbnail_url" id="thumbnail_url" value="{{ old('thumbnail_url') }}" class="border p-2 w-full">
        </div>

        <div>
            <label for="content">Nội dung</label>
            <textarea name="content" id="content" rows="6" class="border p-2 w-full">{{ old('content') }}</textarea>
        </div>

        <div>
            <label for="excerpt">Tóm tắt</label>
            <textarea name="excerpt" id="excerpt" rows="3" class="border p-2 w-full">{{ old('excerpt') }}</textarea>
        </div>

        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="border p-2 w-full">
        </div>

        <div>
            <label for="status">Trạng thái</label>
            <select name="status" id="status" class="border p-2 w-full">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <div>
            <label for="post_category_id">Danh mục</label>
            <select name="post_category_id" id="post_category_id" class="border p-2 w-full">
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('post_category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="published_at">Ngày đăng</label>
            <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') }}" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Lưu</button>
        <a href="{{ route('posts.index') }}" class="text-gray-600 hover:underline ml-2">Quay lại</a>
    </form>
</div>
@endsection
