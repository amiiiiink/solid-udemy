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

    /**
     * @param $product
     * @param DiscountInterface $discountInterface
     * @return static
     */
    public static function make($product,DiscountInterface $discountInterface): static
    {
        return new static($product,$discountInterface);
    }

    public function apply($product)
    {
        return $this->discountInterface->apply($product);
    }


}
