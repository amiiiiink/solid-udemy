<?php

namespace App\Repositories\Stock;


use DB;

class StockMySqlRepository
{

    public function getQuantity($productId)
    {
        return DB::table('stocks')->find($productId);
    }
}
