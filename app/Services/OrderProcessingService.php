<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Stock\StockRepositoryInterface;
use Illuminate\Http\Request;

class OrderProcessingService
{
    public function __construct(
        public ProductRepositoryInterface $productRepository,
        public StockRepositoryInterface   $stockRepository,
        public DiscountService $discountService
    )
    {

    }

    public function execute($productId, Request $request)
    {
        // Find the Product
        $product = $this->productRepository->firstById($productId);

        // Get the stock level
        $this->stockRepository->getQuantity($productId);

        // check the stock level
        $this->stockRepository->checkAvailability($productId);


        // Apply discount
//        $total = $this->applySpecialDiscount($product);
        $total = $this->discountService->with($product)->applySpecialDiscount();

        // check for payment method
        $paymentSuccessMessage = '';

        // Attempt payment
        if ($request->has('payment_method') && $request->input('payment_method') === 'stripe') {
            $paymentSuccessMessage = $this->processPaymentViaStripe('stripe', $total);
        }

        // payment succeeded
        if (!empty($paymentSuccessMessage)) {

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



    protected function processPaymentViaStripe($provider, $total)
    {
        $price = "£{$total}";
        return 'Processing payment of ' . $price . ' through ' . $provider;
    }

}
