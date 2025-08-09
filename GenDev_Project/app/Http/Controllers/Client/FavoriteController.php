<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $products = Auth::user()->favorites;
        return view('client.favorites.index', compact('products'));
    }

    public function toggle(Product $product)
    {
        $user = Auth::user();

        if ($user->favorites->contains($product->id)) {
            $user->favorites()->detach($product->id); // ✅ đúng: gọi trên quan hệ
            return back()->with('message', 'Đã xoá khỏi danh sách yêu thích');
        }

        $user->favorites()->attach($product->id);     // ✅ đúng
        return back()->with('message', 'Đã thêm vào danh sách yêu thích');
    }
}
