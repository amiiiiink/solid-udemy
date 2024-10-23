<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;

class ApiRepository extends Repository
{


    /**
     * @return Collection
     */
    public function all(): Collection
    {
        $products = File::get(storage_path('products.json'));
        $products= json_decode($products, true);
        return Product::hydrate($products);
    }
}
