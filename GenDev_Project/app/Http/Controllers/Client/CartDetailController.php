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
    // public function store(CartDetailRequest $request)
    // {

    //     $productId = $request->input('product_id');
    //     $quantity = $request->input('quantity', 1);
    //     $attributeInput = $request->input('attribute', []);

    //     // Lấy sản phẩm
    //     $product = Product::findOrFail($productId);

    //     //Lấy tất cả biến thể của sản phẩm, kèm thuộc tính
    //     $variants = ProductVariant::with('variantAttributes')
    //         ->where('product_id', $productId)
    //         ->get();

    //     // Duyệt và tìm biến thể khớp 100% với tổ hợp thuộc tính
    //     $matchedVariant = $variants->first(function ($variant) use ($attributeInput) {
    //         $attrPairs = $variant->variantAttributes->mapWithKeys(function ($item) {
    //             return [$item->attribute_id => $item->value_id];
    //         });

    //         return $attrPairs->count() === count($attributeInput) && $attrPairs->diffAssoc($attributeInput)->isEmpty();
    //     });

    //     // Không tìm thấy biến thể
    //     if (!$matchedVariant) {
    //         return back()->with('error', 'Không tìm thấy biến thể phù hợp với lựa chọn của bạn.');
    //     }

    //     // $variant = ProductVariant::findOrFail($request->variant_id);
    //     // if ($variant->quantity < $request->quantity) {
    //     //     return back()->with('error', 'Số lượng vượt quá tồn kho hiện có');
    //     // }

    //     if ($matchedVariant->quantity < $quantity) {
    //         return back()->with('error', 'Số lượng vượt quá tồn kho hiện có.');
    //     }

    //     $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
    //     $testCart = Cartdetail::where('cart_id', $cart->id)
    //         ->where('product_id', $request->product_id)
    //         ->where('variant_id', $matchedVariant->id)
    //         ->first();
    //     if ($testCart) {
    //         $testCart->quantity += $request->quantity;
    //         $testCart->save();
    //     } else {
    //         // // $data = $request->validated();
    //         // $data['cart_id'] = $cart->id;
    //         // $data['price'] = $matchedVariant->sale_price ?? $matchedVariant->price;
    //         // Cartdetail::create($data);

    //         CartDetail::create([
    //             'cart_id' => $cart->id,
    //             'product_id' => $productId,
    //             'variant_id' => $matchedVariant->id,
    //             'quantity' => $quantity,
    //             'price' => $matchedVariant->sale_price ?? $matchedVariant->price,
    //         ]);
    //     }

    //     return redirect()->route('index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    // }

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
                // $attrPairs = $variant->variantAttributes->mapWithKeys(function ($item) {
                //     return [$item->attribute_id => $item->attribute_value_id ];
                // });


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
                'price' => $matchedVariant ? ($matchedVariant->sale_price ?? $matchedVariant->price) : ($product->sale_price ?? $product->price),
            ]);
        }

        return redirect()->route('cart')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
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
                return back()->with('error', 'Số lượng bạn yêu cầu cho sản phẩm "' . $cartDetail->product->name . '" vượt quá tồn kho.');   
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
            $selectedItems = $request->input('selected_items', []);

            if (empty($selectedItems)) {
                return redirect()->route('cart')->with('error', 'Bạn chưa chọn sản phẩm nào để thanh toán.');
            }

            return redirect()->route('checkout', ['selected_items' => $selectedItems]);
        } elseif ($request->has('update_cart')) {
            $cartDetailRequest = app(CartDetailRequest::class);
            $validatedData = $cartDetailRequest->validated();
            $selectedItems = $validatedData['selected_items'] ?? [];

            return $this->update($cartDetailRequest);
        }
    }
}
