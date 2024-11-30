<?php

namespace App\Services;

interface Shippable
{

    /**
     * @param int $shipping
     * @return mixed
     */
    public function shipping(int $shipping);

    /**
     * @param $company
     * @return mixed
     */
    public function delivery($company);
}
