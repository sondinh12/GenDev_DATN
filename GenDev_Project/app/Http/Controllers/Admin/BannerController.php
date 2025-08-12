<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        // Lấy số lượng banner trong thùng rác
        $trashCount = Banner::onlyTrashed()->count();

        // Tìm kiếm
        $search = $request->query('search');
        $query = Banner::latest(); // Sắp xếp theo created_at giảm dần (mới nhất lên đầu)

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        // Phân trang 10 banner/trang
        $banners = $query->paginate(10);

        return view('admin.banner.index', compact('banners', 'trashCount'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'title' => 'required|string|max:255',
            'type'  => 'required|in:static,dynamic',
            'image' => 'required_if:type,static|image|mimes:jpg,jpeg,png,gif',
            'images'   => 'required_if:type,dynamic|array|min:1',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif',
        ]);

        // Prepare data
        $data = [
            'title' => $request->title,
            'type'  => $request->type,
        ];

        // Static banner: single image
        if ($request->type === 'static' && $request->hasFile('image')) {
            $data['image'] = $request->file('image')
                                    ->store('banners', 'public');
        }

        // Dynamic banner: multiple images
        if ($request->type === 'dynamic' && $request->hasFile('images')) {
            $paths = [];
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    $paths[] = $file->store('banners', 'public');
                }
            }
            if (count($paths) > 0) {
                $data['images'] = json_encode($paths);
            }
        }

        // Create record
        Banner::create($data);

        return redirect()->route('banner.index')
                         ->with('success', 'Banner đã được thêm.');
    }

    public function show(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.show', compact('banner'));
    }

    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|in:static,dynamic',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'replace_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'delete_images'    => 'array',
            'new_images.*'     => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        $banner->title = $request->title;
        $banner->type  = $request->type;

        // ====== banner static ======
        if ($request->type === 'static') {
            // nếu upload ảnh mới static
            if ($request->hasFile('image')) {
                // xóa file cũ
                if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                    Storage::disk('public')->delete($banner->image);
                }
                $banner->image = $request->file('image')->store('banners', 'public');
            }
            // reset dynamic images
            $banner->images = null;
            $banner->save();
            return redirect()->route('banner.index')->with('success','Banner đã được cập nhật.');
        }

        // ====== banner dynamic ======
        // 1) Load mảng cũ
        $existing = $banner->images ? json_decode($banner->images, true) : [];

        // 2) Xóa theo delete_images[]
        if ($request->filled('delete_images')) {
            foreach ($request->delete_images as $idx) {
                if (isset($existing[$idx])) {
                    // xóa file vật lý
                    if (Storage::disk('public')->exists($existing[$idx])) {
                        Storage::disk('public')->delete($existing[$idx]);
                    }
                    // bỏ ảnh khỏi mảng
                    unset($existing[$idx]);
                }
            }
        }

        // 3) Thay ảnh theo replace_images[i]
        if ($request->hasFile('replace_images')) {
            foreach ($request->file('replace_images') as $idx => $file) {
                if ($file && $file->isValid() && isset($existing[$idx])) {
                    // xóa file cũ
                    if (Storage::disk('public')->exists($existing[$idx])) {
                        Storage::disk('public')->delete($existing[$idx]);
                    }
                    // lưu ảnh mới thay thế
                    $existing[$idx] = $file->store('banners','public');
                }
            }
        }

        // 4) Thêm ảnh mới new_images[]
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                if ($file->isValid()) {
                    $existing[] = $file->store('banners','public');
                }
            }
        }

        // 5) Reindex và lưu lại
        $existing = array_values($existing);
        $banner->images = json_encode($existing);
        // static image clear
        $banner->image = null;

        $banner->save();

        return redirect()->route('banner.index')->with('success','Banner đã được cập nhật.');
    }

    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete(); // Soft delete
        return redirect()->route('banner.index')
                         ->with('success', 'Banner đã được chuyển vào thùng rác.');
    }

    public function trash()
    {
        // Lấy số lượng banner trong thùng rác
        $trashCount = Banner::onlyTrashed()->count();
        // Phân trang cho thùng rác
        $banners = Banner::onlyTrashed()->latest()->paginate(10); // Sắp xếp mới nhất lên đầu trong thùng rác
        return view('admin.banner.trash', compact('banners', 'trashCount'));
    }

    public function restore($id)
    {
        $banner = Banner::onlyTrashed()->findOrFail($id);
        $banner->restore();
        return redirect()->route('banner.index')
                         ->with('success', 'Banner đã được khôi phục.');
    }

    public function forceDelete($id)
    {
        $banner = Banner::onlyTrashed()->findOrFail($id);

        // Delete stored images
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }
        if ($banner->images) {
            foreach (json_decode($banner->images) as $old) {
                if (Storage::disk('public')->exists($old)) {
                    Storage::disk('public')->delete($old);
                }
            }
        }

        $banner->forceDelete();
        return redirect()->route('admin.banner.trash')
                         ->with('success', 'Banner đã bị xóa vĩnh viễn.');
    }
}