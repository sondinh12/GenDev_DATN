<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderConfirmation;
use App\Models\Cartdetail;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderDetailAttribute;
use App\Models\Ship;
use DB;
use Illuminate\Http\Request;
use Log;
use Mail;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $ships = Ship::all();
        $selectedItemIds = $request->input('selected_items');

        if (empty($selectedItemIds) && $request->isMethod('post') || count($selectedItemIds) === 0) {
            return redirect()->route('cart')->with('error', 'Bạn chưa chọn sản phẩm nào để thanh toán.');
        }
        if (is_string($selectedItemIds)) {
            parse_str($selectedItemIds, $output);
            $selectedItemIds = $output['selected_items'] ?? [];
        }

        $cartItems = Cartdetail::with('product', 'variant.variantAttributes.attribute','variant.variantAttributes.value')
                    ->whereIn('id', $selectedItemIds)
                    ->get();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        return view('client.checkout.checkout', compact('ships', 'subtotal','cartItems','selectedItemIds'));
    }

    public function store(CheckoutRequest $request)
    {
        $selectedItemIds = $request->input('selected_items', []);

        if (empty($selectedItemIds)) {
            return back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Truy vấn cart_details với quan hệ product và variant
        $cartItems = Cartdetail::with('product','cart','variant.variantAttributes.attribute','variant.variantAttributes.value')
            ->whereIn('id', $selectedItemIds)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Không tìm thấy sản phẩm được chọn.');
        }

        DB::beginTransaction();
        
        try {
            // Tính tổng tiền sản phẩm
            $subtotal = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
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
                    $coupon->decrement('usage_limit');
                    $coupon->increment('total_used');
                }
            }

            $total = $subtotal - $discount + $shippingFee;
            if ($total < 0)
                $total = 0;

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
                'payment' => $request->payment_method,
                'total' => $total,
                'status' => 1,
            ]);
            $note = $request->note ?? null;
            // Lưu từng sản phẩm vào chi tiết đơn hàng
            foreach ($cartItems as $item) {
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
            $deletedRows = CartDetail::whereIn('id', $selectedItemIds)
                ->whereHas('cart', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->delete();
                Log::info('CheckoutController::store - Deleted cart items:', ['deleted_rows' => $deletedRows]);
            DB::commit();

            Mail::to($order->email)->send(new OrderConfirmation($order));
            return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi đặt hàng: ' . $e->getMessage());
        }
    }
}
