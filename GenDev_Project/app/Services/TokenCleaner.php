<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TokenCleaner
{
    public static function clean()
    {
        $count = DB::table('tokens')
            ->where('expiry', '<', now())
            ->delete();

        Log::info("[TokenCleaner] Đã xoá $count token hết hạn lúc " . now());
    }
}
