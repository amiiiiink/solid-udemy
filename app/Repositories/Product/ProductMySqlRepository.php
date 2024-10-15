<?php

namespace App\Repositories\Product;

use DB;

class ProductMySqlRepository
{

    public function firstById($productId)
    {
        return DB::table('products')->find($productId);
    }
}
