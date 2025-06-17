<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryMiniRequest;
use App\Models\Category;
use App\Models\CategoryMini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.categories.categories_minis.index', compact('minis', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.categories.categories_minis.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryMiniRequest $request, $id)
    {
        $data = $request->validated();
        $data['category_id'] = $id;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories_minis', 'public');
        }
        CategoryMini::create($data);
        return redirect()->route('categories_minis.index', ['id' => $id])->with('success', 'Thêm thành công');
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

    public function edit($category_id, $id)
    {
        $categories = Category::findOrFail($category_id);
        $categoryMini = CategoryMini::where('category_id', $category_id)->findOrFail($id);
        return view('admin.categories.categories_minis.edit', compact('categories', 'categoryMini'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category_id, $id)
    {
        $categoryMini = CategoryMini::where('category_id', $category_id)->findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($categoryMini->image) {
                \Storage::disk('public')->delete($categoryMini->image);
            }
            $data['image'] = $request->file('image')->store('categories_minis', 'public');
        } else {
            unset($data['image']);
        }

        $categoryMini->update($data);

        return redirect()->route('categories_minis.index', ['id' => $category_id])->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category_id, $id)
    {
        $categoryMini = CategoryMini::where('category_id', $category_id)->findOrFail($id);
        // Xóa ảnh nếu có
        if ($categoryMini->image) {
            Storage::disk('public')->delete($categoryMini->image);
        }
        $categoryMini->delete();
        return redirect()->route('categories_minis.index', ['id' => $category_id])
            ->with('success', 'Xóa danh mục con thành công!');
    }
}
