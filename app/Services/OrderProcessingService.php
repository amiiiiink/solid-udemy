<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Stock\StockRepositoryInterface;
use App\Services\PaymentGateways\Gateway;
use App\Services\PaymentGateways\Stripe;

class OrderProcessingService
{
    public function __construct(
        public ProductRepositoryInterface $productRepository,
        public StockRepositoryInterface   $stockRepository,
        public DiscountService            $discountService,
        public Gateway                     $gateway
    )
    {

    }

    public function execute($productId)
    {
        // Find the Product
        $product = $this->productRepository->firstById($productId);

        // Get the stock level
        $this->stockRepository->getQuantity($productId);

        // check the stock level
        $this->stockRepository->checkAvailability($productId);


        // Apply discount
        $total = $this->discountService->applySpecialDiscount();


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
