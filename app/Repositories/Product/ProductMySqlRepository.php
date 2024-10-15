<?php

namespace App\Repositories\Product;

use App\Models\Product;


class ProductMySqlRepository implements ProductRepositoryInterface
{
    public function __construct(public Product $model)
    {

    }

    /**
     * @param $productId
     * @return Product|array|null
     */
    public function firstById($productId): Product|array|null
    {
        return $this->model->find($productId);
    }
}
