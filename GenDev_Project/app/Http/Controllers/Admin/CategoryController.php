<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $categories = $query->orderBy('id', 'desc')->paginate(5);
        $trashedCount = Category::onlyTrashed()->count();
        return view('admin.categories.index', compact('categories', 'trashedCount'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
        $data['image'] = $request->file('image')->store('categories','public');
        }
        Category::create($data);
        return redirect()->route('categories.index')->with('success', 'Thêm danh mục thành công');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request,$id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        } else {
            unset($data['image']);
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy(string $id)
    {
        $category = Category::with('categoryMinis')->findOrFail($id);

        // Kiểm tra nếu có danh mục con thì không cho xóa
        if ($category->categoryMinis->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'Không thể xóa danh mục này vì vẫn còn danh mục con!');
        }

        // Xóa file ảnh nếu có
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete(); // Soft delete

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được chuyển vào thùng rác!');
    }

    public function trash_Category()
    {
        $categories = Category::onlyTrashed()->get();
        return view('Admin.categories.trash_cate', compact('categories'));
    }

    public function restore($id)
    {
        try {
            $category = Category::onlyTrashed()->findOrFail($id);
            $category->restore();
            return redirect()->route('categories.trash')->with('success', 'Khôi phục danh mục thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khôi phục danh mục: ' . $e->getMessage());
            return redirect()->route('categories.trash')->with('error', 'Khôi phục danh mục thất bại!');
        }
    }

    public function forceDelete($id)
    {
        try {
            $category = Category::onlyTrashed()->findOrFail($id);
            $category->forceDelete();
            return redirect()->route('categories.trash')->with('success', 'Xóa vĩnh viễn danh mục thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi xóa vĩnh viễn danh mục: ' . $e->getMessage());
            return redirect()->route('categories.trash')->with('error', 'Xóa vĩnh viễn danh mục thất bại!');
        }
    }
}
