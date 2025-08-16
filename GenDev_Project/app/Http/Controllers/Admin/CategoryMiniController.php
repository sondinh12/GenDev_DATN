<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryMiniRequest;
use App\Models\Category;
use App\Models\CategoryMini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class CategoryMiniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $categories = Category::findOrFail($id);
        $query = CategoryMini::where('category_id', $id);
        if (isset($_GET['search'])) {
            $query->where('name', 'like', '%' . $_GET['search'] . '%');
        }
        $minis = $query->latest()->paginate(10);

        // Đếm số lượng danh mục con đã xóa mềm (trong thùng rác)
        $trashedCount = CategoryMini::onlyTrashed()->where('category_id', $id)->count();

        $category_id = $id;
        return view('admin.categories.categories_minis.index', compact('minis', 'categories', 'category_id', 'trashedCount'));
    }


    public function create($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.categories.categories_minis.create', compact('categories'));
    }

    public function store(CategoryMiniRequest $request,$id)
    {
        $data = $request->validated();
        $data['category_id'] = $id;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories_minis', 'public');
        }
        CategoryMini::create($data);
        return redirect()->route('admin.categories_minis.index', ['id' => $id])->with('success', 'Thêm thành công');
    }

    public function show(string $id)
    {
    }

    public function edit($category_id,$id)
    {
        $categories = Category::findOrFail($category_id);
        $categoryMini = CategoryMini::where('category_id', $category_id)->findOrFail($id);
        return view('admin.categories.categories_minis.edit', compact('categories', 'categoryMini'));
    }

    public function update(Request $request, $category_id ,$id)
    {
        $categoryMini = CategoryMini::where('category_id', $category_id)->findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($categoryMini->image) {
                Storage::disk('public')->delete($categoryMini->image);
            }
            $data['image'] = $request->file('image')->store('categories_minis', 'public');
        } else {
            unset($data['image']);
        }

        $categoryMini->update($data);

        return redirect()->route('admin.categories_minis.index', ['id' => $category_id])->with('success', 'Cập nhật thành công');
    }

    public function destroy($category_id, $id)
    {
        $categoryMini = CategoryMini::where('category_id', $category_id)->findOrFail($id);

        // Kiểm tra nếu có sản phẩm thì không cho xóa
        if ($categoryMini->products()->count() > 0) {
            return redirect()->route('admin.categories_minis.index', ['id' => $category_id])
                ->with('error', 'Không thể xóa danh mục con này vì vẫn còn sản phẩm!');
        }

        // Xóa file ảnh nếu có
        // if ($categoryMini->image) {
        //     Storage::disk('public')->delete($categoryMini->image);
        // }

        $categoryMini->delete(); // Soft delete

        return redirect()->route('admin.categories_minis.index', ['id' => $category_id])
            ->with('success', 'Danh mục con đã được chuyển vào thùng rác!');
    }

    public function trash_catemini(Request $request)
    {
        // Lấy id danh mục cha, ví dụ từ query string hoặc logic của bạn
        $category_id = $request->category_id; // hoặc lấy từ session, hoặc từ 1 bản ghi bất kỳ trong $trashed
        $trashed = CategoryMini::onlyTrashed()->where('category_id', $category_id)->orderBy('id', 'DESC')->get();
        return view('Admin.categories.categories_minis.trash_catemini', compact('trashed', 'category_id'));
    }

    // Khôi phục
    public function restore($id)
    {
        $categoryMini = CategoryMini::onlyTrashed()->findOrFail($id);
        $categoryMini->restore();
        return redirect()->back()->with('success', 'Khôi phục danh mục con thành công!');
    }

    // Xóa vĩnh viễn
    public function forceDelete($id)
    {
        $categoryMini = CategoryMini::onlyTrashed()->findOrFail($id);
        $categoryMini->forceDelete();
        return redirect()->back()->with('success', 'Đã xóa vĩnh viễn danh mục con!');
    }
}
