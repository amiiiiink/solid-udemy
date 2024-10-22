<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Stock\StockRepositoryInterface;
use App\Services\Discount\DiscountService;
use App\Services\Discount\DiscountServiceFactory;
use App\Services\Discount\TwentyPercentDiscount;
use App\Services\PaymentGateways\Gateway;

class OrderProcessingService
{
    public function __construct(
        public ProductRepositoryInterface $productRepository,
        public StockRepositoryInterface   $stockRepository,
        public Gateway                     $gateway
    )
    {

    }

    /**
     * @param $productId
     * @return array
     */
    public function execute($productId): array
    {
        // Find the Product
        $product = $this->productRepository->firstById($productId);

        // Get the stock level
        $this->stockRepository->getQuantity($productId);

        // check the stock level
        $this->stockRepository->checkAvailability($productId);


        // Apply discount
//        $total = DiscountService::make($product,new TwentyPercentDiscount())->apply($product);
        $total = DiscountServiceFactory::create($product, new TwentyPercentDiscount())->apply($product);


        // Attempt payment
        $paymentSuccessMessage = $this->gateway->process($total);


        // update Stock
        $this->stockRepository->updateQuantity($productId);


        return [
            'payment_message' => $paymentSuccessMessage,
            'discounted_price' => $total,
            'original_price' => $product->price,
            'message' => 'Thank you, your order is being processed'
        ];


    }
}
