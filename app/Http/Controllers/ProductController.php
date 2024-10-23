<?php

namespace App\Http\Controllers;

use App\Repositories\ApiRepository;
use App\Repositories\DatabaseRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ApiRepository $repository)
    {
        $products = $repository->all();
        return view('welcome', compact('products'));
    }
}
