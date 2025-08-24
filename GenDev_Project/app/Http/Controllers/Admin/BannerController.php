<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Đếm số banner trong thùng rác
        $trashCount = Banner::onlyTrashed()->count();

        // Tìm kiếm theo title
        $search = $request->query('search');
        $query = Banner::latest(); // mới nhất lên đầu

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        // Phân trang 10 bản ghi/trang
        $banners = $query->paginate(10);

        return view('admin.banner.index', compact('banners', 'trashCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        // Nếu banner mới chọn dùng, reset các banner khác
        if ($request->status === 'using') {
            Banner::where('status', 'using')->update(['status' => 'unused']);
        }

        // Chuẩn bị dữ liệu
        $data = $request->only(['title', 'type', 'status']);

        if ($request->type === 'static') {
            $data['image'] = $request->file('image')->store('banners', 'public');
        } else {
            $paths = [];
            foreach ($request->file('images') as $file) {
                $paths[] = $file->store('banners', 'public');
            }
            $data['images'] = json_encode($paths);
        }

        Banner::create($data);

        return redirect()->route('banner.index')
                         ->with('success', 'Banner đã được thêm.');
    }

    /**
     * Activate (use) a banner.
     */
    public function useBanner($id)
    {
        // Reset tất cả banner đang sử dụng
        Banner::where('status', 'using')->update(['status' => 'unused']);

        // Đánh dấu banner này là đang sử dụng
        $banner = Banner::findOrFail($id);
        $banner->status = 'using';
        $banner->save();

        return back()->with('success', "Banner “{$banner->title}” đang được sử dụng.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        // Nếu chọn dùng banner này, reset banner khác
        if ($request->status === 'using') {
            Banner::where('status', 'using')
                  ->where('id', '!=', $id)
                  ->update(['status' => 'unused']);
        }

        // Gán chung
        $banner->title  = $request->title;
        $banner->type   = $request->type;
        $banner->status = $request->status;

        // Nếu dynamic, kiểm tra tối thiểu phải 2 ảnh
        if ($request->type === 'dynamic') {
            $existing = $banner->images ? json_decode($banner->images, true) : [];
            $toDelete = $request->input('delete_images', []);
            $added    = is_array($request->file('new_images')) ? count($request->file('new_images')) : 0;
            $remaining = count($existing) - count($toDelete) + $added;

            if ($remaining < 2) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Banner động phải có ít nhất 2 ảnh.');
            }
        }

        // Xử lý banner tĩnh
        if ($request->type === 'static') {
            if ($request->hasFile('image')) {
                if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                    Storage::disk('public')->delete($banner->image);
                }
                $banner->image = $request->file('image')->store('banners', 'public');
            }
            // Xóa ảnh động cũ
            $banner->images = null;
            $banner->save();

            return redirect()->route('banner.index')
                             ->with('success', 'Banner đã được cập nhật.');
        }

        // Xử lý banner động
        $existing = $banner->images ? json_decode($banner->images, true) : [];

        // 1) Xóa ảnh cũ
        if ($request->filled('delete_images')) {
            foreach ($request->delete_images as $idx) {
                if (isset($existing[$idx])) {
                    Storage::disk('public')->delete($existing[$idx]);
                    unset($existing[$idx]);
                }
            }
        }

        // 2) Thay ảnh cũ
        if ($request->hasFile('replace_images')) {
            foreach ($request->file('replace_images') as $idx => $file) {
                if ($file->isValid() && isset($existing[$idx])) {
                    Storage::disk('public')->delete($existing[$idx]);
                    $existing[$idx] = $file->store('banners', 'public');
                }
            }
        }

        // 3) Thêm ảnh mới
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $existing[] = $file->store('banners', 'public');
            }
        }

        // Lưu lại
        $banner->images = json_encode(array_values($existing));
        $banner->image  = null;
        $banner->save();

        return redirect()->route('banner.index')
                         ->with('success', 'Banner đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);

        // Không cho xóa banner đang sử dụng
        if ($banner->status === 'using') {
            return redirect()->route('banner.index')
                             ->with('error', 'Không thể xóa banner đang được sử dụng.');
        }

        $banner->delete(); // Soft delete

        return redirect()->route('banner.index')
                         ->with('success', 'Banner đã được chuyển vào thùng rác.');
    }

    /**
     * Display the trash.
     */
    public function trash()
    {
        $trashCount = Banner::onlyTrashed()->count();
        $banners    = Banner::onlyTrashed()->latest()->paginate(10);

        return view('admin.banner.trash', compact('banners', 'trashCount'));
    }

    /**
     * Restore a soft-deleted banner.
     */
    public function restore($id)
    {
        $banner = Banner::onlyTrashed()->findOrFail($id);
        $banner->restore();
        return redirect()->route('banner.index')
                         ->with('success', 'Banner đã được khôi phục.');
    }

    /**
     * Permanently delete a banner.
     */
    public function forceDelete($id)
    {
        $banner = Banner::onlyTrashed()->findOrFail($id);

        // Xóa file vật lý
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }
        if ($banner->images) {
            foreach (json_decode($banner->images) as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $banner->forceDelete();

        return redirect()->route('admin.banner.trash')
                         ->with('success', 'Banner đã bị xóa vĩnh viễn.');
    }
}
