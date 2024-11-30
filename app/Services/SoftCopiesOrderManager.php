<?php

namespace App\Services;

class SoftCopiesOrderManager extends BaseOrderManager
{
    /**
     * @return object
     */
    public function process()
    {
        return (object)[
            'delivery' => 'Here is your download link',
            'paid' => $this->total
        ];
    }
}
