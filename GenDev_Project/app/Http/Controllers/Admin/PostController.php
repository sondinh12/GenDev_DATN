<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\PostsHistory;
use App\Models\User;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PostCategory::all();
        return view('admin.posts.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail_url' => 'nullable|url',
            'content' => 'required',
            'excerpt' => 'nullable',
            'slug' => 'required|unique:posts,slug',
            'status' => 'required|in:draft,published',
            'post_category_id' => 'required|exists:posts_categories,id',
            'published_at' => 'nullable|date',
        ]);

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Tạo bài viết thành công.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail_url' => 'nullable|url',
            'content' => 'required',
            'excerpt' => 'nullable',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'status' => 'required|in:draft,published',
            'post_category_id' => 'required|exists:posts_categories,id',
            'published_at' => 'nullable|date',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Cập nhật bài viết thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Xóa bài viết thành công.');
    }

    public function history(Post $post)
    {
        $histories = PostsHistory::with('user')
            ->where('post_id', $post->id)
            ->latest()
            ->get();

        return view('admin.posts.history', compact('post', 'histories'));
    }


}
