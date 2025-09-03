<?php

namespace App\Console\Commands;

use App\Models\Coupon;
use Illuminate\Console\Command;

class UpdateExpiredCoupons extends Command
{
    protected $signature = 'coupons:update-expired';
    protected $description = 'Update the status of expired coupons to 2';

    public function handle()
    {
        $count = Coupon::where('status', '!=', 2)
            ->whereNotNull('end_date')
            ->where('end_date', '<=', now())
            ->count();

        Coupon::where('status', '!=', 2)
            ->whereNotNull('end_date')
            ->where('end_date', '<=', now())
            ->update(['status' => 2]);
        $this->info("Đã cập nhật $count coupon hết hạn.");

        return 0;
    }
}