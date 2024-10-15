<?php

namespace App\Repositories\Stock;


use DB;

class StockMySqlRepository implements StockRepositoryInterface
{

    public function getQuantity($productId)
    {
        return DB::table('stocks')->find($productId);
    }
}
