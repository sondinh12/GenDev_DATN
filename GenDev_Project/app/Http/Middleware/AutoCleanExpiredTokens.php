<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use App\Services\TokenCleaner;

class AutoCleanExpiredTokens
{
    public function handle($request, Closure $next)
    {
        // Thực hiện xóa nếu chưa xoá trong 10 phút gần nhất
        if (!Cache::has('token_cleanup_ran_recently')) {
            TokenCleaner::clean();

            // Đánh dấu đã xoá gần đây, cache trong 10 phút
            Cache::put('token_cleanup_ran_recently', true, now()->addMinutes(10));
        }

        return $next($request);
    }
}
