<?php

namespace App\Services\Discount;

interface DiscountInterface
{
    public function apply($product);
}
