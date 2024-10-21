<?php

namespace App\Providers;

use App\Patterns\Square;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


//        app()->singleton(\App\Patterns\Shapeable::class, Square::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
