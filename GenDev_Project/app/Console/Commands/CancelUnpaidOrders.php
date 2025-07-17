<?php

namespace App\Console\Commands;

use App\Mail\OrderCancelled;
use App\Models\Order;
use Illuminate\Console\Command;
use Mail;

class CancelUnpaidOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:cancel-unpaid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hủy đơn hàng quá hạn thanh toán';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredOrders = Order::where('payment_status', 'unpaid')
            ->where('payment_expired_at', '<=', now())
            ->where('status', 'pending')
            ->get();

        if ($expiredOrders->isEmpty()) {
            $this->info('Không có đơn hàng nào quá hạn.');
            return;
        }

        foreach ($expiredOrders as $order) {
            $order->update([
                'status' => 'cancelled'
            ]);

            Mail::to($order->email)->send(new OrderCancelled($order));

            $this->info("Đã hủy đơn hàng #{$order->id} (Mã giao dịch: {$order->transaction_code})");
        }

        $this->info('Đã xử lý xong tất cả đơn hàng quá hạn.');
    }
}
