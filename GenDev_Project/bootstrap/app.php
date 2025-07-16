<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'check_ban' => \App\Http\Middleware\CheckUserBanned::class
        ]);
        // $middleware->appendToGroup('web', \App\Http\Middleware\CheckUserBanned::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withCommands([
        \App\Console\Commands\CancelUnpaidOrders::class,
    ])
    ->withSchedule(function (Illuminate\Console\Scheduling\Schedule $schedule) {
        $schedule->command('orders:cancel-unpaid')->everyMinute();
    })
    ->create();
