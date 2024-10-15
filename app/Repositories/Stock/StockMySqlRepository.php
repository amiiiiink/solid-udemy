<?php

namespace App\Repositories\Stock;


use App\Models\Stock;

class StockMySqlRepository implements StockRepositoryInterface
{
    public function __construct(public Stock $model)
    {

    }

    /**
     * @param $productId
     * @return Stock|array|null
     */
    public function getQuantity($productId): Stock|array|null
    {
        return $this->model->find($productId);
    }
}
