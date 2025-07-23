<?php

namespace App\Helpers;

class ProductHelper
{
    /**
     * Lấy thông tin giá của sản phẩm
     */
    public static function getProductPriceInfo($product)
    {
        if ($product->variants && $product->variants->count() > 0) {
            // Sản phẩm có biến thể
            return self::getVariantPriceInfo($product);
        } else {
            // Sản phẩm không có biến thể
            return self::getSimplePriceInfo($product);
        }
    }

    /**
     * Lấy thông tin giá cho sản phẩm có biến thể
     */
    private static function getVariantPriceInfo($product)
    {
        $allPrices = $product->variants->pluck('price')->filter();
        $allSalePrices = $product->variants->pluck('sale_price')->filter(function ($price) {
            return $price > 0;
        });

        $hasDiscount = $allSalePrices->count() > 0;

        if ($hasDiscount) {
            $minPrice = $allSalePrices->min();
            $maxPrice = $allSalePrices->max();
            $originalPrice = $allPrices->max();
            $discountPercent = round((($originalPrice - $minPrice) / $originalPrice) * 100);

            return [
                'has_discount' => true,
                'discount_percent' => $discountPercent,
                'min_price' => $minPrice,
                'max_price' => $maxPrice,
                'original_price' => $originalPrice,
                'is_range' => $minPrice != $maxPrice,
                'display_price' => $minPrice == $maxPrice ?
                    number_format($minPrice) . 'đ' :
                    number_format($minPrice) . 'đ - ' . number_format($maxPrice) . 'đ'
            ];
        } else {
            $minPrice = $allPrices->min();
            $maxPrice = $allPrices->max();

            return [
                'has_discount' => false,
                'discount_percent' => 0,
                'min_price' => $minPrice,
                'max_price' => $maxPrice,
                'original_price' => $maxPrice,
                'is_range' => $minPrice != $maxPrice,
                'display_price' => $minPrice == $maxPrice ?
                    number_format($minPrice) . 'đ' :
                    number_format($minPrice) . 'đ - ' . number_format($maxPrice) . 'đ'
            ];
        }
    }

    /**
     * Lấy thông tin giá cho sản phẩm không có biến thể
     */
    private static function getSimplePriceInfo($product)
    {
        $hasDiscount = $product->sale_price && $product->sale_price > 0 && $product->price > $product->sale_price;

        if ($hasDiscount) {
            $discountPercent = round((($product->price - $product->sale_price) / $product->price) * 100);

            return [
                'has_discount' => true,
                'discount_percent' => $discountPercent,
                'min_price' => $product->sale_price,
                'max_price' => $product->sale_price,
                'original_price' => $product->price,
                'is_range' => false,
                'display_price' => number_format($product->sale_price) . 'đ'
            ];
        } else {
            return [
                'has_discount' => false,
                'discount_percent' => 0,
                'min_price' => $product->price,
                'max_price' => $product->price,
                'original_price' => $product->price,
                'is_range' => false,
                'display_price' => number_format($product->price) . 'đ'
            ];
        }
    }

    /**
     * Kiểm tra sản phẩm có khuyến mãi không
     */
    public static function hasDiscount($product)
    {
        $priceInfo = self::getProductPriceInfo($product);
        return $priceInfo['has_discount'];
    }

    /**
     * Lấy phần trăm giảm giá
     */
    public static function getDiscountPercent($product)
    {
        $priceInfo = self::getProductPriceInfo($product);
        return $priceInfo['discount_percent'];
    }

    /**
     * Lấy giá hiển thị
     */
    public static function getDisplayPrice($product)
    {
        $priceInfo = self::getProductPriceInfo($product);
        return $priceInfo['display_price'];
    }

    /**
     * Lấy phần trăm giảm giá của biến thể đầu tiên (nếu có)
     */
    public static function getFirstVariantDiscountPercent($product)
    {
        $variant = $product->variants->first();
        if ($variant && $variant->sale_price && $variant->sale_price < $variant->price && $variant->price > 0) {
            return round(100 - ($variant->sale_price / $variant->price * 100));
        }
        return null;
    }
}
