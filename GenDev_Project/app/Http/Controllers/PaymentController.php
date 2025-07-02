<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Order;
use Illuminate\Http\Request;
use Mail;

class PaymentController extends Controller
{
    public function vnpayReturn(Request $request){
        $vnp_HashSecret = env('VNPAY_HASH_SECRET');
        $vnp_SecureHash = $request->vnp_SecureHash;
        $inputData = $request->except('vnp_SecureHash', 'vnp_SecureHashType');

        ksort($inputData);
        $hashData = "";
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . $key . "=" . $value;
            } else {
                $hashData .= $key . "=" . $value;
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash === $vnp_SecureHash) {
            $orderId = intval($request->vnp_TxnRef);
            $order = Order::find($orderId);

            if ($order) {
                if ($request->vnp_ResponseCode == '00') {
                    $order->update([
                        'status' => 'processing', // đã xác nhận
                        'payment_status' => 'paid' // đã thanh toán
                    ]);
                    Mail::to($order->email)->send(new OrderConfirmation($order));
                    return redirect()->route('checkout.success')->with('success', 'Thanh toán thành công!');
                } else {
                    $order->update([
                        'payment_status' => 'cancelled' // thất bại
                    ]);
                    return redirect()->route('checkout.success')->with('error', 'Thanh toán thất bại!');
                }
            }
        }
        // Mail::to($order->email)->send(new OrderConfirmation($order));

        return redirect()->route('checkout.success')->with('error', 'Xác minh chữ ký thất bại!');
    }
}
