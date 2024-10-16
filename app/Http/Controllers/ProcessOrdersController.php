<?php

namespace App\Http\Controllers;

use App\Services\OrderProcessingService;
use Illuminate\Http\Request;

class ProcessOrdersController extends Controller
{

    public function __construct(public OrderProcessingService $orderProcessingService)
    {

    }

    /**
     * Handle the incoming request.
     *
     * @param $product_id
     * @param Request $request
     * @return array
     */
    public function __invoke($product_id, Request $request)
    {
        $this->validate($request, [
            'payment_method' => 'required|string',
        ]);
        return $this->orderProcessingService->execute($product_id, $request);
    }
}
