<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Repositories\ApiRepository;
use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * A basic feature test example.
     */
    public function a_user_can_browse_all_products()
    {
//        $products = ProductFactory::new()->count(10)->create();
        $products = app(ApiRepository::class)->all();
        $response = $this->get('/')->assertOk();
        $data = $response->viewData('products');
        $this->assertSame($products->count(), $data->count());
        $this->assertInstanceOf(Product::class, $data->first());
    }
}
