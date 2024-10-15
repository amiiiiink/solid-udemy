<?php

namespace App\Repositories\Stock;

interface StockRepositoryInterface
{

    public function getQuantity($productId);

    public function checkAvailability($productId);
}
