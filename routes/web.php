<?php
use App\Http\Controllers\ProcessOrdersController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('order/{product_id}/process', ProcessOrdersController::class);
