<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Stock\StockRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderProcessingService
{
    public function __construct(
        public ProductRepositoryInterface $productRepository,
        public StockRepositoryInterface   $stockRepository
    )
    {

    }

    public function execute($productId, Request $request)
    {
        // Find the Product
        $product = $this->productRepository->firstById($productId);

        // Get the stock level
        $stock = $this->stockRepository->getQuantity($productId);

        // check the stock level
        if ($stock->quantity < 1) {
            throw ValidationException::withMessages([
                'stock' => ['we are out of stock ']
            ]);
        }

        // Apply discount
        $total = $this->applySpecialDiscount($product);

        // check for payment method
        $paymentSuccessMessage = '';

        // Attempt payment
        if ($request->has('payment_method') && $request->input('payment_method') === 'stripe') {
            $paymentSuccessMessage = $this->processPaymentViaStripe('stripe', $total);
        }

        // payment succeeded
        if (!empty($paymentSuccessMessage)) {

            // update Stock
            DB::table('stocks')
                ->where('product_id', $productId)
                ->update([
                    'quantity' => $stock->quantity - 1
                ]);

            return [
                'payment_message' => $paymentSuccessMessage,
                'discounted_price' => $total,
                'original_price' => $product->price,
                'message' => 'Thank you, your order is being processed'
            ];
        }

    }

    protected function applySpecialDiscount($product)
    {
        $discount = 0.20 * $product->price;
        return number_format(($product->price - $discount), 2);
    }

    protected function processPaymentViaStripe($provider, $total)
    {
        $price = "£{$total}";
        return 'Processing payment of ' . $price . ' through ' . $provider;
    }

}
