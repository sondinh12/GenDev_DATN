<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryMiniRequest;
use App\Models\Category;
use App\Models\CategoryMini;
use Illuminate\Http\Request;

class CategoryMiniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $categories = Category::findOrFail($id);
        // if($request->has('search')){
        //     $query->where('name','like','%' . $request->search . '%');
        // }
        $minis = CategoryMini::where('category_id',$id)->latest()->paginate(10);
        return view('admin.categories.categories_minis.index', compact('minis', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.categories.categories_minis.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryMiniRequest $request, $id)
    {   
        $data = $request->validated();
        $data['category_id'] = $id;
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('categories_minis','public');
        }
        CategoryMini::create($data);
        return redirect()->route('categories_minis.index',['id' => $id])->with('success', 'Thêm thành công');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
