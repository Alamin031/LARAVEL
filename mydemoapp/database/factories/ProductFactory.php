<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'product_code' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{3}'),
            'description' => $this->faker->sentence,
            
        ];
    }
}
