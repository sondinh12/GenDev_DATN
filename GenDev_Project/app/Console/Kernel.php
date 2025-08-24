<?php

namespace App\Http;

use App\Models\Coupon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
        protected function schedule(Schedule $schedule)
    {
        $schedule->command('orders:auto-complete')->daily();
        $schedule->command('coupons:update-expired')->everyMinute();
    }
    // Middleware toàn cục
    protected $middleware = [
        // ...
    ];

    protected $middlewareGroups = [
        'web' => [
            // \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \App\Http\Middleware\AutoCleanExpiredTokens::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];


}
