<?php

use App\Http\Controllers\ProcessOrdersController;
use App\Patterns\AreaCalculator;
use App\Patterns\Circle;
use App\Patterns\Square;
use App\Patterns\Triangle;

Route::get('/', function () {
    return view('welcome');
});

Route::post('order/{product_id}/process', ProcessOrdersController::class);
Route::get('area', function(AreaCalculator $areaCalculator) {


//    $sqaure = resolve(Square::class,['width'=>10,'height'=>20]);
//    $triangle = resolve(Triangle::class,['height'=>10,'base'=>20]);
    $circle = resolve(Circle::class,['radius'=>21]);
    return $areaCalculator->calculate($circle);

});
