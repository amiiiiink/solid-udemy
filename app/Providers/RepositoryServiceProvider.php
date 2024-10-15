<?php

namespace App\Providers;

use App\Repositories\Product\ProductMySqlRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Stock\StockMySqlRepository;
use App\Repositories\Stock\StockRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductRepositoryInterface::class,
            ProductMySqlRepository::class);
        $this->app->singleton(StockRepositoryInterface::class,
            StockMySqlRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
