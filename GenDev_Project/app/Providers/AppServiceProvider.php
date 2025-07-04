<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
     public function boot()
    {
        View::composer('client.layout.partials.header', function ($view) {
            $cartCount = 0;

            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())->first();
                if ($cart) {
                    $cartCount = $cart->details()->sum('quantity');
                }
            }

            $view->with('cartCount', $cartCount);
        });

        Paginator::useBootstrap();

    }
}
