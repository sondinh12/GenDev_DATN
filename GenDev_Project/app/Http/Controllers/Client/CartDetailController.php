<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartDetailRequest;
use App\Models\Cart;
use App\Models\Cartdetail;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartDetailRequest $request)
    {
        $variant = ProductVariant::findOrFail($request->variant_id);
        if($variant->quantity < $request->quantity){
            return back()->with('error','Số lượng vượt quá tồn kho hiện có');
        }
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $testCart = Cartdetail::where('cart_id',$cart->id)
        ->where('product_id', $request->product_id)
        ->where('variant_id', $request->variant_id)
        ->first();
        if($testCart){
             $testCart->quantity += $request->quantity;
             $testCart->save();
        }else{
           $data = $request->validated();
           $data['cart_id'] = $cart->id;
           $data['price'] = $variant->sale_price ?? $variant->price;
           Cartdetail::create($data);
        }

        return redirect()->route('index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
