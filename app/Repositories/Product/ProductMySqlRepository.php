<?php

namespace App\Repositories\Product;

use DB;

class ProductMySqlRepository implements ProductRepositoryInterface
{
    public function firstById($productId)
    {
        return DB::table('products')->find($productId);
    }
}
