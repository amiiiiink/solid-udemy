<?php

namespace App\Services;

use App\Models\Product;

class DiscountService
{

    public function __construct(public Product $product)
    {
    }

    /**
     * @return string
     */
    public function applySpecialDiscount(): string
    {
        $discount = 0.20 * $this->product->price;
        return number_format(($this->product->price - $discount), 2);
    }
}
