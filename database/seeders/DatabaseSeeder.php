<?php
namespace Database\Seeders;
use App\Models\Product;
use App\Models\Stock;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 30 products
        ProductFactory::new()->count(30)->create();
        // Create a stock record for each product
        $products = Product::all();

        foreach ($products as $product) {
            Stock::create([
                'product_id' => $product->id,
                'quantity' => rand(1, 10),
            ]);
        }
    }
}
