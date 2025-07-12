<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Post;
use App\Observers\PostObserver;
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
    public function boot(): void
    {
        // Share cartCount cho header
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

        // Sử dụng Bootstrap cho phân trang
        Paginator::useBootstrap();

        // Đăng ký PostObserver để theo dõi Post update
        Post::observe(PostObserver::class);
    }


}
