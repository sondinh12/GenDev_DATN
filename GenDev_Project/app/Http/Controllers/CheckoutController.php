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
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // Xóa session mã giảm giá khi bắt đầu phiên thanh toán mới
        session()->forget(['applied_order_coupon', 'applied_shipping_coupon']);

        $ships = Ship::all();
        $selectedItemIds = $request->input('selected_items');

        if (is_string($selectedItemIds)) {
            parse_str($selectedItemIds, $output);
            $selectedItemIds = $output['selected_items'] ?? [];
        }

        // Kiểm tra nếu danh sách sản phẩm thay đổi, xóa session mã giảm giá
        if (session()->has('last_selected_items') && session('last_selected_items') !== $selectedItemIds) {
            session()->forget(['applied_order_coupon', 'applied_shipping_coupon']);
        }
        session()->put('last_selected_items', $selectedItemIds);

        $cartItems = CartDetail::with('product', 'variant.variantAttributes.attribute', 'variant.variantAttributes.value')
            ->whereIn('id', $selectedItemIds)
            ->get();
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

        $user = Auth::user();
        $coupons = Coupon::where('usage_limit', '>', 0)
            ->where('status', 1)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->get();

        return view('client.checkout.checkout', compact(
            'ships', 'subtotal', 'cartItems', 'selectedItemIds', 'user', 'coupons'
        ));
    }

    public function store(CheckoutRequest $request, VnpayService $vnpayService)
    {
        $selectedItemIds = $request->input('selected_items', []);

        if (empty($selectedItemIds)) {
            return back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $cartItems = CartDetail::with('product', 'cart', 'variant.variantAttributes.attribute', 'variant.variantAttributes.value')
            ->whereIn('id', $selectedItemIds)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Không tìm thấy sản phẩm được chọn.');
        }
        // $reorderMode = $request->input('reorder_mode', false);
        // $userId = auth()->id();

        // if ($reorderMode) {
        //     $rawItems = json_decode($request->input('reorder_cart_items'), true);

        //     if (empty($rawItems)) {
        //         return back()->with('error', 'Không tìm thấy sản phẩm mua lại.');
        //     }

        //     $cartItems = $rawItems; // Dùng mảng luôn
        // } else {
        //     $selectedItemIds = $request->input('selected_items', []);

        //     if (empty($selectedItemIds)) {
        //         return back()->with('error', 'Bạn chưa chọn sản phẩm nào để thanh toán.');
        //     }

        //     $cartItems = Cartdetail::with('product', 'variant.variantAttributes.attribute', 'variant.variantAttributes.value')
        //         ->whereIn('id', $selectedItemIds)
        //         ->get()
        //         ->toArray();

        //     if (empty($cartItems)) {
        //         return back()->with('error', 'Không tìm thấy sản phẩm được chọn.');
        //     }
        // }

        DB::beginTransaction();

        try {
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

            $orderDiscount = 0;
            $orderCouponId = null;
            $userId = Auth::id();
            if (session()->has('applied_order_coupon')) {
                $applied = session('applied_order_coupon');
                $coupon = Coupon::find($applied['id']);
                if ($coupon && $subtotal >= $coupon->min_coupon && (!$coupon->max_coupon || $subtotal <= $coupon->max_coupon)) {
                    $orderDiscount = $applied['discount'];
                    $orderCouponId = $applied['id'];
                    $userIdFromSession = $applied['user_id'];
                    if ($userIdFromSession) {
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
                } else {
                    session()->forget('applied_order_coupon');
                    return back()->with('error_order_coupon', 'Mã giảm giá đơn hàng không còn hợp lệ do thay đổi tổng đơn hàng.');
                }
            }

            $shippingDiscount = 0;
            $shippingCouponId = null;
            if (session()->has('applied_shipping_coupon')) {
                $applied = session('applied_shipping_coupon');
                $coupon = Coupon::find($applied['id']);
                if ($coupon && $shippingFee >= $coupon->min_coupon && (!$coupon->max_coupon || $shippingFee <= $coupon->max_coupon)) {
                    $shippingDiscount = $applied['discount'];
                    $shippingCouponId = $applied['id'];
                    $userIdFromSession = $applied['user_id'];
                    if ($userIdFromSession) {
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
                } else {
                    session()->forget('applied_shipping_coupon');
                    return back()->with('error_shipping_coupon', 'Mã giảm giá phí ship không còn hợp lệ do thay đổi phí vận chuyển.');
                }
            }

            $finalShippingFee = max($shippingFee - $shippingDiscount, 0);
            $total = $subtotal - $orderDiscount + $finalShippingFee;
            if ($total < 0) {
                $total = 0;
            }

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

            $txnCode = 'ORD' . strtoupper(uniqid());
            $order = Order::create([
                'user_id' => Auth::id(),
                'product_coupon_id' => $orderCouponId,
                'shipping_coupon_id' => $shippingCouponId,
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
                'subtotal' => $subtotal,
                'product_discount' => $orderDiscount,
                'shipping_discount' => $shippingDiscount,
                'total' => $total,
                'transaction_code' => $txnCode,
                'status' => 'pending',
            ]);
            $note = $request->note ?? null;

            foreach ($cartItems as $item) {
                if ($item->variant) {
                    $price = $item->variant->sale_price > 0
                        ? $item->variant->sale_price
                        : $item->variant->price;
                } else {
                    $price = $item->product->sale_price > 0
                        ? $item->product->sale_price
                        : $item->product->price;
                }
                $detail = OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'variant_id' => $item['variant_id'] ?? null,
                    'price' => $price,
                    'quantity' => $item['quantity'],
                    'note' => $note
                ]);

                if (!empty($item->variant->variantAttributes)) {
                    foreach ($item->variant->variantAttributes as $attr) {
                        OrderDetailAttribute::create([
                            'order_detail_id' => $detail->id,
                            'attribute_name' => $attr->attribute->name,
                            'attribute_value' => $attr->value->value,
                        ]);
                    }
                }

                if ($request->payment_method === 'cod') {
                    if ($item->variant_id) {
                        $variant = ProductVariant::find($item->variant_id);
                        $variant->decrement('quantity', $item->quantity);
                    } else {
                        $product = Product::find($item->product_id);
                        $product->decrement('quantity', $item->quantity);
                    }
                }
            }

            // Xóa session mã giảm giá sau khi hoàn tất đơn hàng
            session()->forget(['applied_order_coupon', 'applied_shipping_coupon']);

            if ($request->payment_method === 'cod') {
                CartDetail::whereIn('id', $selectedItemIds)
                    ->whereHas('cart', function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                    })
                    ->delete();
            }

            DB::commit();

            if ($request->payment_method === 'banking') {
                $paymentUrl = $vnpayService->buildPaymentUrl($order);
                CartDetail::whereIn('id', $selectedItemIds)
                    ->whereHas('cart', function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                    })
                    ->delete();
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
        $userId = Auth::id();
        $order = Order::with('orderDetails.product', 'orderDetails.variant')
            ->where('id', $orderId)
            ->where('user_id', $userId)
            ->where('payment', 'banking')
            ->whereIn('status', ['cancelled', 'pending'])
            ->where('payment_status', 'unpaid')
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
    // public function checkoutFromOrder($orderId)
    // {
    //     $order = Order::with([
    //         'orderDetails.product',
    //         // 'orderDetails.variant.variantAttributes.attribute',
    //         // 'orderDetails.variant.variantAttributes.value'
    //         'orderDetails.attributes'
    //     ])->findOrFail($orderId);
        
    //     $selectedItemIds = $order->orderDetails->pluck('id')->toArray();
    //     $cartItems = [];
    //     $subtotal = 0;

    //     foreach ($order->orderDetails as $item) {
    //         $product = $item->product;
    //         $variant = $item->variant;

    //         $price = $variant
    //             ? ($variant->sale_price > 0 ? $variant->sale_price : $variant->price)
    //             : ($product->sale_price > 0 ? $product->sale_price : $product->price);

    //         $subtotal += $price * $item->quantity;
    //         $coupons = Coupon::all(); 
    //         $user = auth()->user();
    //         // $reorderMode = true;
    //         $originalOrder = $order;

    //         $cartItems[] = [
    //             'product_id' => $product->id,
    //             'product' => $product,
    //             'variant_id' => $variant->id ?? null,
    //             'variant' => $variant,
    //             'quantity' => $item->quantity,
    //             'attributes' => $item->attributes->map(function ($att) {
    //                 return [
    //                     'attribute_name' => $att->attribute_name,
    //                     'value' => $att->attribute_value,
    //                 ];
    //             })->toArray(),
    //         ];
    //     }

    //     $ships = Ship::all(); // bạn cần load danh sách ship ở đây

    //     return view('client.checkout.checkout', compact(
    //         'cartItems',
    //         'subtotal',
    //         // 'reorderMode',
    //         'originalOrder',
    //         'ships',
    //         'coupons',
    //         'user',
    //         'selectedItemIds',
    //     )) ->with([
    //     'reorder_mode' => true, // optional flag
    // ]);;
    // }
}