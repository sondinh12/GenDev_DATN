<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    public function index(Request $request)
    {
        Coupon::where('status', '!=', 2)
            ->whereNotNull('end_date')
            ->where('end_date', '<', now())
            ->update(['status' => 2]);
//             dd(
//     now(), // thời gian Laravel
//     DB::select("SELECT NOW() as db_now") // thời gian DB
// );

        // Tìm kiếm
        $search = trim((string) $request->input('q'));

        $couponsQuery = Coupon::with('creator')->orderByDesc('id');

        if ($search !== '') {
            $typeMap = [
                'đơn hàng' => 'order',
                'don hang' => 'order',
                'ship' => 'shipping',
                'phí ship' => 'shipping',
                'phi ship' => 'shipping',
            ];
            $discountTypeMap = [
                'phần trăm' => 'percent',
                'phan tram' => 'percent',
                '%' => 'percent',
                'cố định' => 'fixed',
                'co dinh' => 'fixed',
                'đ' => 'fixed',
            ];
            $statusMap = [
                'hoạt động' => 1,
                'hoat dong' => 1,
                'tạm dừng' => 0,
                'tam dung' => 0,
                'hết hạn' => 2,
                'het han' => 2,
            ];

            $normalized = mb_strtolower($search, 'UTF-8');
            $typeFilter = $typeMap[$normalized] ?? null;
            $discountTypeFilter = $discountTypeMap[$normalized] ?? null;
            $statusFilter = $statusMap[$normalized] ?? null;

            $couponsQuery->where(function ($q) use ($search, $typeFilter, $discountTypeFilter, $statusFilter) {
                $q->where('coupon_code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%");
                if ($typeFilter) {
                    $q->orWhere('type', $typeFilter);
                }
                if ($discountTypeFilter) {
                    $q->orWhere('discount_type', $discountTypeFilter);
                }
                if ($statusFilter !== null) {
                    $q->orWhere('status', $statusFilter);
                }
                if (is_numeric(str_replace(['.', ','], '', $search))) {
                    $num = (int) filter_var($search, FILTER_SANITIZE_NUMBER_INT);
                    $q->orWhere('discount_amount', $num)
                      ->orWhere('usage_limit', $num)
                      ->orWhere('total_used', $num)
                      ->orWhere('user_id', $num);
                }
                $dateLike = preg_replace('/[^\d\-\/]/', '', $search);
                if ($dateLike) {
                    $q->orWhereDate('created_at', $dateLike)
                      ->orWhereDate('end_date', $dateLike);
                }
            });
        }

        $coupons = $couponsQuery->paginate(10)->appends($request->only('q'));
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
        $data['status'] = (int) $request->input('status', $coupon->status);
        $coupon->update($data);
        return redirect()->route('coupons.index')->with('success', 'Cập nhật mã giảm giá thành công!');
    }

}