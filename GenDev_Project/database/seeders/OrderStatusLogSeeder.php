<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderStatusLog;
use App\Models\Order;
use App\Models\User;

class OrderStatusLogSeeder extends Seeder
{
    public function run(): void
    {
        $order = Order::inRandomOrder()->first();
        $user  = User::inRandomOrder()->first();

        if (!$order || !$user) {
            $this->command->warn("Không có dữ liệu order hoặc user để seed.");
            return;
        }

        OrderStatusLog::create([
            'order_id'   => $order->id,
            'changed_by' => $user->id,
            'old_status' => 'pending',
            'new_status' => 'processing',
            'note'       => 'Chuyển trạng thái thủ công để xử lý đơn',
            'changed_at' => now(),
        ]);
    }
}