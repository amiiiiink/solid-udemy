<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Stock;
use App\Services\Discount\DiscountService;
use App\Services\Discount\EightyPercentDiscount;
use App\Services\Discount\FiftyPercentDiscount;
use App\Services\Discount\TwentyPercentDiscount;
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
        $stock = Stock::query()->create(['product_id' => $product->id, 'quantity' => rand(1, 10),]);

        $response = $this->post('/order/' . $product->id . '/process', ['payment_method' => 'stripe',])->assertOk()->json();

        $this->assertArrayHasKey('payment_message', $response);
        $this->assertArrayHasKey('discounted_price', $response);
        $this->assertArrayHasKey('original_price', $response);
        $this->assertArrayHasKey('message', $response);

        $this->assertDatabaseHas('stocks', ['quantity' => $stock->quantity - 1]);


    }

    /** @test */
    public function an_exception_is_thrown_if_stock_is_less_than_one(): void
    {

        $this->expectException(ValidationException::class);
        ProductFactory::new()->count(1)->create();
        $product = Product::first();
        $stock = Stock::query()->create(['product_id' => $product->id, 'quantity' => 0,]);

        $this->withoutExceptionHandling()->post("/order/{$product->id}/process", ['payment_method' => 'stripe']);


    }

    /** @test */
    public function apply20PercentDiscount(): void
    {

        $product = Product::create([
            'sku' => 'BP063-0001',
            'name' => 'name-0001',
            'price' => '40',
        ]);

        $discountService = new DiscountService($product, new TwentyPercentDiscount);
        $total = $discountService->apply($product);

        $this->assertEquals(32, $total);

    }

    /** @test */
    public function apply50PercentDiscount(): void
    {

        $product = Product::create([
            'sku' => 'BP063-0001',
            'name' => 'name-0001',
            'price' => '40',
        ]);

        $discountService = new DiscountService($product, new FiftyPercentDiscount);
        $total = $discountService->apply($product);

        $this->assertEquals(20, intval($total));

    }


    /** @test */
    public function apply80PercentDiscount(): void
    {

        $product = Product::create([
            'sku' => 'BP063-0001',
            'name' => 'name-0001',
            'price' => '40',
        ]);

        $discountService = new DiscountService($product, new EightyPercentDiscount);
        $total = $discountService->apply($product);

        $this->assertEquals(8, intval($total));

    }


}
