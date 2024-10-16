<?php

namespace App\Services\PaymentGateways;

interface Gateway
{
    public function process($total);
}
