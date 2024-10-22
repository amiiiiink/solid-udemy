<?php

namespace App\Services\Discount;

class EightyPercentDiscount implements DiscountInterface
{

    public function apply($product): string
    {
        return number_format(($product->price - (0.80 * $product->price)), 2);
    }
}
