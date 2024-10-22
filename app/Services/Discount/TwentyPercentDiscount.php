<?php

namespace App\Services\Discount;

class TwentyPercentDiscount implements DiscountInterface
{
    /**
     * @param $product
     * @return string
     */
    public function apply($product): string
    {
        return number_format(($product->price - (0.20 * $product->price)), 2);
    }
}
