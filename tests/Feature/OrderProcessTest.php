<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Stock;
use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class OrderProcessTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_user_order_can_be_processed()
    {
        $this->withoutExceptionHandling();
        ProductFactory::new()->count(1)->create();
        $product = Product::first();
        $stock=Stock::query()->create([
            'product_id' => $product->id,
            'quantity' => rand(1, 10),
        ]);

        $response=$this->post('/order/'.$product->id.'/process',[
            'payment_method' => 'stripe',
        ])->assertOk()->json();

        $this->assertArrayHasKey('payment_message', $response);
        $this->assertArrayHasKey('discounted_price', $response);
        $this->assertArrayHasKey('original_price', $response);
        $this->assertArrayHasKey('message', $response);

        $this->assertDatabaseHas('stocks', [
            'quantity' => $stock->quantity - 1
        ]);


    }

    /** @test */
    public function an_exception_is_thrown_if_stock_is_less_than_one(): void
    {
        $this->expectException(ValidationException::class);

        ProductFactory::new()->count(1)->create();
        $product = Product::first();
        $stock=Stock::query()->create([
            'product_id' => $product->id,
            'quantity' => 0,
        ]);

        $this->withoutExceptionHandling()
            ->post("/order/{$product->id}/process", [
                'payment_method' => 'stripe'
            ]);

    }
}
