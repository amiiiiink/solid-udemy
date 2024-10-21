<?php
use App\Http\Controllers\ProcessOrdersController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('order/{product_id}/process', ProcessOrdersController::class);
Route::get('area', function(\App\Patterns\AreaCalculator $areaCalculator) {

//    $square = new \App\Patterns\Square(10,10);
//    $triangle = new \App\Patterns\Triangle(10,6);
//    $circle = new \App\Patterns\Circle(10);

    return $areaCalculator->calculate();

});
