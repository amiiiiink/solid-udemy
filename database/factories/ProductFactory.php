<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Porduct>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sku' => $this->faker->randomElement(['BP063-0001','BP063-0002','BP063-0003','UA064-0002']),
            'name' => $this->faker->randomElement(['Giorgio','Firetrap','Kangol','Ben Sherman']),
            'price' => $this->faker->randomElement(['120.25','140.35','156.99'])
        ];
    }
}
