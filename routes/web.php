<?php

use App\Http\Controllers\ProcessOrdersController;
use App\Patterns\AreaCalculator;
use App\Patterns\Square;
use App\Patterns\Triangle;

Route::get('/', function () {
    return view('welcome');
});

Route::post('order/{product_id}/process', ProcessOrdersController::class);
Route::get('area', function(AreaCalculator $areaCalculator) {

//    $square = new \App\Patterns\Square(10,10);
//    $triangle = new \App\Patterns\Triangle(10,6);
//    $circle = new \App\Patterns\Circle(10);
//    $sqaure = new Square(10,20);
    $sqaure = resolve(Square::class,['width'=>10,'height'=>20]);
//    $triangle = resolve(Triangle::class,['height'=>10,'base'=>20]);
    return $areaCalculator->calculate($sqaure);

});
