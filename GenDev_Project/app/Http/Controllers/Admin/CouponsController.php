<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class CouponsController extends Controller
{
    public function index()
    {
       
        Coupon::where('status', '!=', 2)
            ->where('end_date', '<', now())
            ->update(['status' => 2]);

        $coupons = Coupon::with('creator')
                    ->latest()
                    ->paginate(10);

        $trashedCount = Coupon::onlyTrashed()->count();

        return view('admin.coupons.index', compact('coupons', 'trashedCount'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(StoreCouponRequest $request)
    {
        $data = $request->validated();
        // $data['user_id'] = Auth::id();
        $data['total_used'] = 0;
        $data['status'] = $request->input('status', 1);

        Coupon::create($data);

        return redirect()->route('coupons.index')->with('success', 'Tạo mã giảm giá thành công!');
    }

    public function trashed()
    {
        $trashedCoupons = Coupon::onlyTrashed()->get();
        $trashedCount = Coupon::onlyTrashed()->count();

        return view('admin.coupons.trashed', compact('trashedCoupons', 'trashedCount'));
    }

    public function restore($id)
    {
        $coupon = Coupon::onlyTrashed()->findOrFail($id);
        $coupon->restore();
        $coupon->status = 1;
        $coupon->save();

        return redirect()->route('admin.coupons.trashed')->with('success', 'Mã giảm giá đã được khôi phục và hoạt động trở lại.');
    }

    public function forceDelete($id)
    {
        $coupon = Coupon::onlyTrashed()->findOrFail($id);
        $coupon->forceDelete();

        return redirect()->route('admin.coupons.trashed')->with('success', 'Mã giảm giá đã được xóa vĩnh viễn.');
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        if ($coupon->total_used > 0) {
            return redirect()->route('coupons.index')
                ->with('error', 'Không thể xóa mã giảm giá đã được sử dụng.');
        }

        $coupon->status = 0;
        $coupon->save();
        $coupon->delete();

        return redirect()->route('coupons.index')->with('success', 'Đã chuyển vào thùng rác và dừng hoạt động');
    }


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


        $data['status'] = $request->input('status', $coupon->status);

        $coupon->update($data);

        return redirect()->route('coupons.index')->with('success', 'Cập nhật mã giảm giá thành công!');
    }
}
