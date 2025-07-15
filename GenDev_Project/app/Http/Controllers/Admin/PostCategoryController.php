<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use Illuminate\Validation\Rule;

class PostCategoryController extends Controller
{
    /**
     * Hiển thị danh sách danh mục.
     */
    public function index()
    {
        $categories = PostCategory::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.post_categories.index', compact('categories'));
    }

    /**
     * Hiển thị form tạo mới danh mục.
     */
    public function create()
    {
        return view('admin.post_categories.create');
    }

    /**
     * Lưu danh mục mới vào database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:posts_categories,name',
        ]);

        PostCategory::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('post-categories.index')->with('success', 'Tạo danh mục thành công!');
    }

    /**
     * Hiển thị chi tiết một danh mục.
     */
    public function show(string $id)
    {
        $category = PostCategory::findOrFail($id);
        return view('admin.post_categories.show', compact('category'));
    }

    /**
     * Hiển thị form chỉnh sửa danh mục.
     */
    public function edit(string $id)
    {
        $category = PostCategory::findOrFail($id);
        return view('admin.post_categories.edit', compact('category'));
    }

    /**
     * Cập nhật danh mục vào database.
     */
    public function update(Request $request, string $id)
    {
        $category = PostCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts_categories', 'name')->ignore($category->id),
            ],
        ]);

        $category->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('post-categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    /**
     * Xóa danh mục khỏi database.
     */
    public function destroy(string $id)
    {
        $category = PostCategory::findOrFail($id);

        // Kiểm tra nếu có bài viết liên kết thì không cho xóa
        if ($category->posts()->count() > 0) {
            return redirect()->route('post-categories.index')->with('error', 'Không thể xóa danh mục vì còn bài viết liên kết.');
        }

        $category->delete();

        return redirect()->route('post-categories.index')->with('success', 'Xóa danh mục thành công!');
    }

    /**
     * Hiển thị danh sách danh mục đã xóa (thùng rác).
     */
    public function trash()
    {
        $categories = PostCategory::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(15);
        return view('admin.post_categories.index', compact('categories'))->with('isTrash', true);
    }

    /**
     * Khôi phục danh mục đã xóa.
     */
    public function restore($id)
    {
        $category = PostCategory::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('post-categories.trash')->with('success', 'Khôi phục danh mục thành công!');
    }

    /**
     * Xóa vĩnh viễn danh mục.
     */
    public function forceDelete($id)
    {
        $category = PostCategory::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->route('post-categories.trash')->with('success', 'Xóa vĩnh viễn danh mục thành công!');
    }
}