<?php

use App\Http\Controllers\ProcessOrdersController;
use App\Http\Controllers\ProductController;
use App\Patterns\AreaCalculator;
use App\Patterns\Circle;
use App\Patterns\Square;
use App\Patterns\Triangle;

Route::get('/', function () {
    return view('welcome');
});

Route::post('order/{product_id}/process', ProcessOrdersController::class);
Route::get('area', function(AreaCalculator $areaCalculator) {
    return $areaCalculator->calculate();
});

Route::get('/', [ProductController::class, 'index']);
