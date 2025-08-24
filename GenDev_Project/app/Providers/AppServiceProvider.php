<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

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

        // View Composer cho header client
        View::composer('client.layout.partials.header', function ($view) {
            $categories = Category::where('status', 1)->orderBy('name')->get();
            $view->with('categories', $categories);
        });

        Paginator::useBootstrap();

    }
}