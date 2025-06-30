<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::with('creator')
                    ->latest()
                    ->paginate(10);

        $trashedCount = Coupon::onlyTrashed()->count();

        return view('admin.coupons.index', compact('coupons', 'trashedCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();
        $data['total_used'] = 0;
        $data['status'] = $request->has('status') ? 1 : 0;

        Coupon::create($data);

        return redirect()->route('coupons.index')->with('success', 'Tạo mã giảm giá thành công!');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return redirect()->route('admin.coupons.index')->with('success', 'Mã giảm giá đã được đưa vào thùng rác.');
    }

    /**
     * Hiển thị danh sách thùng rác.
     */
    public function trashed()
    {
        $coupons = Coupon::onlyTrashed()->paginate(10);
        return view('admin.coupons.trashed', compact('coupons'));
    }


    /**
     * Khôi phục coupon đã bị xóa mềm.
     */
    public function restore($id)
    {
        $coupon = Coupon::onlyTrashed()->findOrFail($id);
        $coupon->restore();

        return redirect()->route('admin.coupons.trashed')->with('success', 'Khôi phục mã giảm giá thành công.');
    }

    /**
     * Xóa vĩnh viễn coupon.
     */
    public function forceDelete($id)
    {
        $coupon = Coupon::onlyTrashed()->findOrFail($id);
        $coupon->forceDelete();

        return redirect()->route('admin.coupons.trashed')->with('success', 'Đã xoá vĩnh viễn mã giảm giá.');
    }

    /**
     * (Chưa triển khai) Show/Edit/Update
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update($request, string $id)
    {
        //
    }
}
