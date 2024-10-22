<?php

namespace App\Services\Discount;

use App\Models\Product;

class DiscountServiceFactory
{
    public static function create(Product $product, DiscountInterface $discountInterface): DiscountService
    {
        return new DiscountService($product, $discountInterface);
    }
}
