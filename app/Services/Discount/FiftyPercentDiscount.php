<?php

namespace App\Services\Discount;

class FiftyPercentDiscount implements DiscountInterface
{

    public function apply($product)
    {
        return number_format(($product->price - (0.50 * $product->price)), 2);
    }
}
