<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
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
    // Hiển thị thùng rác
    public function trashed()
    {
        $trashedCoupons = Coupon::onlyTrashed()->get();
        $trashedCount = Coupon::onlyTrashed()->count();
        return view('admin.coupons.trashed', compact('trashedCoupons', 'trashedCount'));
    }

    // Khôi phục
    public function restore($id)
    {
        $coupon = Coupon::onlyTrashed()->findOrFail($id);
        $coupon->restore();
        return redirect()->route('admin.coupons.trashed')->with('success', 'Mã giảm giá đã được khôi phục.');
    }

    public function forceDelete($id)
    {
        $coupon = Coupon::onlyTrashed()->findOrFail($id);
        $coupon->forceDelete();
        return redirect()->route('admin.coupons.trashed')->with('success', 'Mã giảm giá đã được xóa vĩnh viễn.');
    }

    // Xoá mềm
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('coupons.index')->with('success', 'Đã chuyển vào thùng rác');
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
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(UpdateCouponRequest $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $data = $request->validated();
        $data['status'] = $request->has('status') ? 1 : 0;

        $coupon->update($data);

        return redirect()->route('coupons.index')->with('success', 'Cập nhật mã giảm giá thành công!');
    }
}
