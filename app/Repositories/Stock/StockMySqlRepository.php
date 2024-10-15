<?php

namespace App\Repositories\Stock;


use App\Models\Stock;
use Illuminate\Validation\ValidationException;

class StockMySqlRepository implements StockRepositoryInterface
{
    const MINIMUM_STOCK_LEVEL = 1;

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

    public function updateQuantity($productId)
    {
        $stock=$this->model
            ->where('product_id', $productId);
            $stock->update([
                'quantity' => $stock->first()->quantity - 1
            ]);
    }

    /**
     * @param $productId

     */
    public function checkAvailability($productId)
    {
        $stock=$this->getQuantity($productId);
        if ($stock->quantity < self::MINIMUM_STOCK_LEVEL) {
            throw ValidationException::withMessages([
                'stock' => ['we are out of stock ']
            ]);
        }
    }
}
