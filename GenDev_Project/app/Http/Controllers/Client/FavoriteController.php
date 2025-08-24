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
            $user->favorites()->detach($product->id);
            return back()->with('success', 'Đã xoá khỏi danh sách yêu thích');
        }

        $user->favorites()->attach($product->id);
        return back()->with('success', 'Đã thêm vào danh sách yêu thích');
    }
}
