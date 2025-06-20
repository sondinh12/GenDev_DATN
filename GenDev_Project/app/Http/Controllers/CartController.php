<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
        public function mockCart(){
        $cart = [
        [
            'product_id' => 1,
            'variant_id' => 2,
            'product_name' => 'Iphone 14 pro max',
            'variant_name' => 'Màu đỏ - 128GB',
            'price' => 200000,
            'quantity' => 2,
            'attributes' => [
                ['attribute_name' => 'Color', 'value' => 'Đỏ'],
                ['attribute_name' => 'Capacity', 'value' => '128GB'],
            ],
        ],
        // [
        //     'product_id' => 2,
        //     'variant_id' => 3,
        //     'product_name' => 'Samsung A14',
        //     'variant_name' => 'Vàng - 128GB',
        //     'price' => 350000,
        //     'quantity' => 1,
        //     'attributes' => [
        //         ['attribute_name' => 'Color', 'value' => 'Yellow'],
        //         ['attribute_name' => 'Capacity', 'value' => '128GB'],
        //     ],
        // ],
    ];

    session()->put('cart', $cart);

    return redirect()->route('checkout')->with('success', 'Đã mock giỏ hàng thành công!');
    }
}
