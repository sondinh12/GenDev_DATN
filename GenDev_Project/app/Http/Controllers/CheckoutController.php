<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderDetailAttribute;
use App\Models\Ship;
use DB;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $ships = Ship::all();
        return view('client.checkout.checkout', compact('ships', 'subtotal'));
    }

    public function store(CheckoutRequest $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        DB::beginTransaction();
        auth()->loginUsingId(1);
        try {
            // Tính tổng tiền sản phẩm
            // $totalProduct = collect($cart)->sum(function ($item) {
            //     return $item['price'] * $item['quantity'];
            // });
            $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
            $shipping = Ship::findOrFail($request->ship_id);
            $shippingFee = $shipping->shipping_price;
            // Áp dụng mã giảm giá nếu có
            $discount = 0;
            $couponId = null;
            $userId = auth()->id();
            if (session()->has('applied_coupon')) {
                $applied = session('applied_coupon');
                $discount = $applied['discount'];
                $couponId = $applied['id'];
                $userIdFromSession = $applied['user_id'];
                // Coupon::where('id', $couponId)->decrement('usage_limit');
                if ($userIdFromSession) {
                    $coupon = Coupon::find($couponId);
                    $couponUser = $coupon->users()->where('user_id', $userIdFromSession)->first();

        if ($couponUser) {
            $currentTimesUsed = $couponUser->pivot->times_used;
            $coupon->users()->updateExistingPivot($userIdFromSession, [
                'times_used' => $currentTimesUsed + 1
            ]);
        } else {
            $coupon->users()->attach($userIdFromSession, ['times_used' => 1]);
        }
                    $coupon->decrement('usage_limit'); // Giảm usage_limit
                }
            }

            $total = $subtotal - $discount + $shippingFee;
            if ($total < 0)
                $total = 0;

            // Lấy phí vận chuyển


            // Tổng tiền cuối cùng
            // $finalTotal = $totalProduct + $shippingFee;

            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => auth()->id(),
                'coupon_id' => $couponId,
                'shipping_id' => $shipping->id,
                'shipping_fee' => $shippingFee,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'ward' => $request->ward,
                'postcode' => $request->postcode,
                'payment' => $request->payment,
                'total' => $total,
                'status' => 1,
            ]);
            $note = $request->note ?? null;
            // Lưu từng sản phẩm vào chi tiết đơn hàng
            foreach ($cart as $item) {
                $detail = OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'variant_id' => $item['variant_id'] ?? null,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'note' => $note
                ]);

                // Nếu có thuộc tính, lưu vào order_detail_attributes
                if (!empty($item['attributes'])) {
                    foreach ($item['attributes'] as $attr) {
                        OrderDetailAttribute::create([
                            'order_detail_id' => $detail->id,
                            'attribute_name' => $attr['attribute_name'],
                            'attribute_value' => $attr['value'],
                        ]);
                    }
                }
            }

            session()->forget('applied_coupon');
            // Xoá giỏ hàng sau khi đặt hàng
            session()->forget('cart');

            DB::commit();
            return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi đặt hàng: ' . $e->getMessage());
        }
    }
}
