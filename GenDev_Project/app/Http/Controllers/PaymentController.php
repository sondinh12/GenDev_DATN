<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Order;
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
            $order = Order::find($request->vnp_TxnRef);
            // dd($order->email);

            if ($order) {
                if ($request->vnp_ResponseCode == '00') {
                    $order->update([
                        'status' => 'pending', // đã xác nhận
                        'payment_status' => 'paid' // đã thanh toán
                    ]);
                    Mail::to($order->email)->send(new OrderConfirmation($order));
                    return redirect()->route('checkout.success')->with('success', 'Thanh toán thành công!');
                } else {
                    $order->update([
                        'payment_status' => 'cancelled' // thất bại
                    ]);
                    return redirect()->route('checkout.failed')->with('error', 'Thanh toán thất bại!');
                }
            }
        }

        return redirect()->route('home')->with('error', 'Xác minh chữ ký thất bại!');
    }
}
