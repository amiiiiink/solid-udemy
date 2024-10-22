<?php

namespace App\Services\Discount;

use App\Models\Product;

class DiscountService
{

    public function __construct(
        public Product               $product,
        public DiscountInterface $discountInterface)
    {
    }



    public function apply($product)
    {
        return $this->discountInterface->apply($product);
    }


}
