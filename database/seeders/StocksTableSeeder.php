<?php
namespace Database\Seeders;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::query()->all();

        foreach ($products as $product) {
            Stock::factory()->create([
                'product_id' => $product->id
            ]);
        }
    }

}
