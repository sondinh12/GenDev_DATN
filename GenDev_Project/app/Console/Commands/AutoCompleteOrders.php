<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class AutoCompleteOrders extends Command
{
    protected $signature = 'orders:auto-complete';
    protected $description = 'Tự động chuyển đơn hàng đã giao sau X ngày thành completed';

    public function handle()
    {
        $days = config('orders.auto_complete_days', 7); // fallback
        $cutoff = Carbon::now()->subDays($days);

        $orders = Order::where('status', 'shipped')
            ->where('updated_at', '<=', $cutoff)
            ->get();

        foreach ($orders as $order) {
            $order->status = 'completed'; 
            $order->save();

            $this->info("Order #{$order->id} marked as completed.");
        }

        return 0;
    }
}
