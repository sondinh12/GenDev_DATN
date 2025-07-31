<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Mail;

class PaymentController extends Controller
{
    public function vnpayReturn(Request $request)
    {
        
        $vnpData = $request->all();
        $vnp_SecureHash = $vnpData['vnp_SecureHash'];
        unset($vnpData['vnp_SecureHash'], $vnpData['vnp_SecureHashType']);

        ksort($vnpData);

        $hashData = "";
        $i = 0;
        foreach ($vnpData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, env('VNPAY_HASH_SECRET')); 

        if ($secureHash === $vnp_SecureHash) {
            // cần sửa tnxRef
            $order = Order::where('transaction_code',$request->vnp_TxnRef)->first();
            // dd($request->all());

            if ($order) {
                if ($request->vnp_ResponseCode == '00') {
                    // trừ tồn kho nếu thanh toán thành công
                    foreach ($order->orderDetails as $item) {
                    if ($item->variant_id) {
                        $variant = ProductVariant::find($item->variant_id);
                        $variant->decrement('quantity', $item->quantity);
                    } else {
                        $product = Product::find($item->product_id);
                        $product->decrement('quantity', $item->quantity);
                    }
                }

                    $order->update([
                        'status' => 'pending', // đã xác nhận
                        'payment_status' => 'paid' // đã thanh toán
                    ]);
                    Mail::to($order->email)->send(new OrderConfirmation($order));
                    return redirect()->route('checkout.success')->with('success', 'Thanh toán thành công!');
                } else {
                    $order->update([
                        'status' => 'pending',
                        'payment_status' => 'unpaid' // thất bại
                    ]);
                    return redirect()->route('checkout.failed')->with('error', 'Thanh toán thất bại!');
                }
            }
            //  Cartdetail::whereHas('cart', function ($q) use ($order) {
            //             $q->where('user_id', $order->user_id);
            //         })->delete();
        }

        return redirect()->route('home')->with('error', 'Xác minh chữ ký thất bại!');
    }
}