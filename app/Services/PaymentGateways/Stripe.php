<?php

namespace App\Services\PaymentGateways;

class Stripe implements Gateway
{
    public function process($total): string
    {
        $price = "£{$total}";
        return 'Processing payment of ' . $price . ' through  Stripe' ;
    }
}
