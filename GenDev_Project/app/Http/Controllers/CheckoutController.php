<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderConfirmation;
use App\Models\CartDetail;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderDetailAttribute;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Ship;
use App\Services\VnpayService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $ships = Ship::all();
        $selectedItemIds = $request->input('selected_items');

        if (is_string($selectedItemIds)) {
            parse_str($selectedItemIds, $output);
            $selectedItemIds = $output['selected_items'] ?? [];
        }

<<<<<<< HEAD
        // Ép về mảng để tránh lỗi whereIn
        $selectedItemIds = (array) $selectedItemIds;

        // Nếu không có selected_items, truyền subtotal = 0 và cartItems rỗng
        if (empty($selectedItemIds)) {
            $cartItems = collect();
            $subtotal = 0;
            $coupons = Coupon::where('status', 1)
                ->where('usage_limit', '>', 0)
                ->whereDate('start_date', '<=', now())
                ->whereDate('end_date', '>=', now())
                ->get();
            return view('client.checkout.checkout', compact('ships', 'subtotal', 'cartItems', 'selectedItemIds', 'coupons'));
        }

        $cartItems = CartDetail::with('product', 'variant.variantAttributes.attribute','variant.variantAttributes.value')
                    ->whereIn('id', $selectedItemIds)
                    ->get();
=======
        $cartItems = Cartdetail::with('product', 'variant.variantAttributes.attribute', 'variant.variantAttributes.value')
            ->whereIn('id', $selectedItemIds)
            ->get();
>>>>>>> f9b3ffd61c33c542175ece4632ba4148b30518ed
        $subtotal = $cartItems->sum(function ($item) {
            if ($item->variant) {
                $price = $item->variant->sale_price > 0
                ? $item->variant->sale_price
                : $item->variant->price;
            } else {
                $price = $item->product->sale_price > 0
                    ? $item->product->sale_price
                    : $item->product->price;
            }

            return $price * $item->quantity;
        });
<<<<<<< HEAD
        $coupons = Coupon::where('status', 1)
            ->where('usage_limit', '>', 0)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->get();
        return view('client.checkout.checkout', compact('ships', 'subtotal','cartItems','selectedItemIds', 'coupons'));
=======

        $user = auth()->user();
        return view('client.checkout.checkout', compact('ships', 'subtotal', 'cartItems', 'selectedItemIds', 'user'));
>>>>>>> f9b3ffd61c33c542175ece4632ba4148b30518ed
    }

    public function store(CheckoutRequest $request, VnpayService $vnpayService)
    {
        $selectedItemIds = $request->input('selected_items', []);

        if (empty($selectedItemIds)) {
            return back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Truy vấn cart_details với quan hệ product và variant
<<<<<<< HEAD
        $cartItems = CartDetail::with('product','cart','variant.variantAttributes.attribute','variant.variantAttributes.value')
=======
        $cartItems = Cartdetail::with('product', 'cart', 'variant.variantAttributes.attribute', 'variant.variantAttributes.value')
>>>>>>> f9b3ffd61c33c542175ece4632ba4148b30518ed
            ->whereIn('id', $selectedItemIds)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Không tìm thấy sản phẩm được chọn.');
        }

        DB::beginTransaction();

        try {
            // Tính tổng tiền sản phẩm
            $subtotal = $cartItems->sum(function ($item) {
                if ($item->variant) {
                    $price = $item->variant->sale_price > 0
                        ? $item->variant->sale_price
                        : $item->variant->price;
                } else {
                    $price = $item->product->sale_price > 0
                        ? $item->product->sale_price
                        : $item->product->price;
                }

                return $price * $item->quantity;
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

            //kiểm tra số lượng tồn khp ngay khi bấm mua
            foreach ($cartItems as $item) {
                if ($item->variant_id) {
                    $variant = ProductVariant::find($item->variant_id);
                    if (!$variant || $variant->quantity < $item->quantity) {
                        return back()->with('error', "Biến thể sản phẩm '{$item->product->name}' không đủ tồn kho.");
                    }
                } else {
                    $product = Product::find($item->product_id);
                    if (!$product || $product->quantity < $item->quantity) {
                        return back()->with('error', "Sản phẩm '{$item->product->name}' không đủ tồn kho.");
                    }
                }
            }

            // Tạo đơn hàng
            $txnCode = 'ORD' . strtoupper(uniqid());
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
                'payment_status' => 'unpaid',
                'payment_expired_at' => $request->payment_method === 'banking' ? now()->addMinutes(30) : null,
                'total' => $total,
                'transaction_code' => $txnCode,
                'status' => 'pending',
            ]);
            $note = $request->note ?? null;
            // Lưu từng sản phẩm vào chi tiết đơn hàng
            if ($item->variant) {
                $price = $item->variant->sale_price > 0
                    ? $item->variant->sale_price
                    : $item->variant->price;
            } else {
                $price = $item->product->sale_price > 0
                    ? $item->product->sale_price
                    : $item->product->price;
            }
            foreach ($cartItems as $item) {
                $detail = OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'variant_id' => $item['variant_id'] ?? null,
                    'price' => $price,
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
                if ($request->payment_method === 'cod') {
                    //trừ số lượng sau khi mua
                    if ($item->variant_id) {
                        $variant = ProductVariant::find($item->variant_id);
                        $variant->decrement('quantity', $item->quantity);
                    } else {
                        $product = Product::find($item->product_id);
                        $product->decrement('quantity', $item->quantity);
                    }
                }

            }

            if ($request->payment_method === 'cod') {
                session()->forget('applied_coupon');

                $deletedRows = CartDetail::whereIn('id', $selectedItemIds)
                    ->whereHas('cart', function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                    })
                    ->delete();
                Log::info('CheckoutController::store - Deleted cart items:', ['deleted_rows' => $deletedRows]);
            }
            DB::commit();

            if ($request->payment_method === 'banking') {
                $paymentUrl = $vnpayService->buildPaymentUrl($order);
                return redirect($paymentUrl);
            }

            Mail::to($order->email)->send(new OrderConfirmation($order));
            return redirect()->route('checkout.success')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi đặt hàng: ' . $e->getMessage());
        }
    }

    public function retryPayment($orderId, VnpayService $vnpayService)
    {
        $userId = auth()->id();

        $order = Order::with('orderDetails.product', 'orderDetails.variant')
            ->where('id', $orderId)
            ->where('user_id', $userId)
            ->where('payment', 'banking')
            ->whereIn('status', ['cancelled','pending'])
            ->where('payment_status','unpaid')
            ->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Đơn hàng không hợp lệ hoặc không thể thanh toán lại.');
        }

        foreach ($order->orderDetails as $item) {
            if ($item->variant_id) {
                $variant = ProductVariant::find($item->variant_id);
                if (!$variant || $variant->quantity < $item->quantity) {
                    return redirect()->back()->with('error', "Biến thể '{$item->product->name}' không còn đủ hàng để thanh toán lại.");
                }
            } else {
                $product = Product::find($item->product_id);
                if (!$product || $product->quantity < $item->quantity) {
                    return redirect()->back()->with('error', "Sản phẩm '{$item->product->name}' không còn đủ hàng để thanh toán lại.");
                }
            }
        }

        $paymentUrl = $vnpayService->buildPaymentUrl($order);
        return redirect($paymentUrl);
    }

}