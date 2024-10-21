<?php

use App\Http\Controllers\ProcessOrdersController;
use App\Patterns\AreaCalculator;

Route::get('/', function () {
    return view('welcome');
});

Route::post('order/{product_id}/process', ProcessOrdersController::class);
Route::get('area', function(AreaCalculator $areaCalculator) {

//    $square = new \App\Patterns\Square(10,10);
//    $triangle = new \App\Patterns\Triangle(10,6);
//    $circle = new \App\Patterns\Circle(10);
    $sqaure = new \App\Patterns\Square(10,20);
    return $areaCalculator->calculate($sqaure);

});
