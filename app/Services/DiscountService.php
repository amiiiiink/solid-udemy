<?php

namespace App\Services;

use App\Models\Product;

class DiscountService
{

    private Product $product;

    /**
     * @param Product $product
     * @return $this
     */
    public function with(Product $product): static
    {
        $this->product = $product;
        return $this;
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
