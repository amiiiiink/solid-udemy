<?php

namespace App\Providers;

use App\Repositories\Stock\StockMySqlRepository;
use App\Repositories\Stock\StockRepositoryInterface;
use App\Services\PaymentGateways\Gateway;
use App\Services\PaymentGateways\Stripe;
use Illuminate\Support\ServiceProvider;

class GatewayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Gateway::class,
            Stripe::class);
    }

    public function boot(): void
    {
    }
}
