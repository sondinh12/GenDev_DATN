<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartDetailRequest;
use App\Models\Cart;
use App\Models\Cartdetail;

use App\Models\Product;
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
    public function create()
    {
        //
    }


    public function store(CartDetailRequest $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $attributeInput = $request->input('attribute', []);


        // Lấy sản phẩm
        $product = Product::findOrFail($productId);

        // Kiểm tra xem sản phẩm có biến thể hay không
        $variants = ProductVariant::with(['variantAttributes.attribute', 'variantAttributes.value'])
            ->where('product_id', $productId)
            ->get();

        //     dd([
        //     'attributeInput' => $attributeInput,
        //     'availableVariants' => $variants->map(function ($v) {
        //         return $v->variantAttributes->mapWithKeys(function ($va) {
        //             return [$va->attribute_id => $va->attribute_value_id];
        //         });
        //     })->toArray(),
        // ]);

        $matchedVariant = null;
        if ($variants->isNotEmpty()) {
            // Tìm biến thể khớp với tổ hợp thuộc tính
            $matchedVariant = $variants->first(function ($variant) use ($attributeInput) {

                $attrPairs = $variant->variantAttributes->mapWithKeys(function ($item) {
                    $valueId = null;

                    if (isset($item->attribute_value_id)) {
                        $valueId = $item->attribute_value_id;
                    } elseif (isset($item->value_id)) {
                        $valueId = $item->value_id;
                    } elseif ($item->relationLoaded('value') && $item->value) {
                        $valueId = $item->value->id;
                    }

                    return [$item->attribute_id => $valueId];
                });


                return $attrPairs->count() === count($attributeInput) && $attrPairs->diffAssoc($attributeInput)->isEmpty();
            });

            if (!$matchedVariant) {
                return back()->with('error', 'Không tìm thấy biến thể phù hợp với lựa chọn của bạn.');
            }

            // Kiểm tra số lượng tồn kho của biến thể
            if ($matchedVariant->quantity < $quantity) {
                return back()->with('error', 'Số lượng vượt quá tồn kho hiện có.');
            }
        } else {
            // Trường hợp không có biến thể, kiểm tra số lượng tồn kho của sản phẩm
            if ($product->quantity < $quantity) {
                return back()->with('error', 'Số lượng vượt quá tồn kho hiện có.');
            }
        }

        // Lấy hoặc tạo giỏ hàng
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        // Kiểm tra sản phẩm đã có trong giỏ hàng
        $cartDetail = CartDetail::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->when($matchedVariant, function ($query) use ($matchedVariant) {
                return $query->where('variant_id', $matchedVariant->id);
            })
            ->first();

        $inCartQty = $cartDetail ? $cartDetail->quantity : 0;
        $totalQty = $inCartQty + $quantity;
        $stockQty = $matchedVariant ? $matchedVariant->quantity : $product->quantity;
        if ($totalQty > $stockQty) {
            return back()->withInput()->with('error', 'Số lượng vượt quá tồn kho hiện có là ' . $stockQty . '.');
        }
        if ($cartDetail) {
            // Cập nhật số lượng nếu sản phẩm đã có trong giỏ
            $cartDetail->quantity += $quantity;
            $cartDetail->save();
        } else {
            // Thêm mới sản phẩm vào giỏ hàng
            CartDetail::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'variant_id' => $matchedVariant ? $matchedVariant->id : null,
                'quantity' => $quantity,
                // 'price' => $matchedVariant ? ($matchedVariant->sale_price ?? $matchedVariant->price) : ($product->sale_price ?? $product->price),
            ]);
        }
        
        return redirect()->route('product.show', $productId)->withInput()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
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
        //4
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CartDetailRequest $request)
    {

        $quantities = $request->input('quantities', []);
        if (empty($quantities)) {
            return back()->with('warning', 'Không có thay đổi nào được gửi lên.');
        }
        foreach ($quantities as $cartDetailId => $qty) {
            if (!is_numeric($qty) || $qty < 1) {
                continue;
            }
            $cartDetail = Cartdetail::find($cartDetailId);
            $maxQty = $cartDetail->variant
                ? $cartDetail->variant->quantity
                : $cartDetail->product->quantity;

            if ($qty > $maxQty) {
                return back()->with('error', 'Số lượng bạn yêu cầu cho sản phẩm "' . $cartDetail->product->name . '" vượt quá tồn kho là ' . $maxQty . '.');   
            }

            if ($cartDetail && $cartDetail->cart->user_id === Auth::id()) {
                $cartDetail->quantity = $qty;
                $cartDetail->save();
            }
        }
        return redirect()->route('cart')->with('success', 'Cập nhật giỏ hàng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartDetail = CartDetail::find($id);
        if ($cartDetail && $cartDetail->cart->user_id == Auth::id()) {
            $cartDetail->delete();
            return back()->with('success', 'Xóa sản phẩm khỏi giỏ hàng.');
        }
        return back()->with('error', 'Không thể xóa sản phẩm.');
    }


    public function handleAction(Request $request)
    {
        if ($request->has('btn_checkout')) {
            $selectedItemIds = $request->input('selected_items', []);

            if (empty($selectedItemIds)) {
                return redirect()->route('cart')->with('error', 'Bạn chưa chọn sản phẩm nào để thanh toán.');
            }

            $cartItems = Cartdetail::with('product', 'cart', 'variant.variantAttributes.attribute', 'variant.variantAttributes.value')
            ->whereIn('id', $selectedItemIds)
            ->get();

            foreach ($cartItems as $item) {
                if ($item->variant_id) {
                    $variant = ProductVariant::find($item->variant_id);
                    if (!$variant || $variant->quantity < $item->quantity) {
                        return back()->with('error', "Biến thể sản phẩm '{$item->product->name}' không đủ tồn kho.");
                    }
                } else {
                    $product = Product::find($item->product_id);
                    if (!$product || $product->quantity < $item->quantity) {
                        return back()->with('error', "Sản phẩm '{$item->product->name}' không đủ tồn kho.");
                    }
                }
            }

            return redirect()->route('checkout', ['selected_items' => $selectedItemIds]);
        } elseif ($request->has('update_cart')) {
            $cartDetailRequest = app(CartDetailRequest::class);
            $validatedData = $cartDetailRequest->validated();
            $selectedItemIds = $validatedData['selected_items'] ?? [];

            return $this->update($cartDetailRequest);
        }
    }
}
