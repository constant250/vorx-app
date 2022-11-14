<?php

namespace Database\Factories;

use App\Models\Enums\ProductMeasurementTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $products = [
            'Laptop',
            'Mouse',
            'Keyboard',
            'Speaker',
            'Headset'
        ];
        $product = array_rand($products);

        return [
            'sku' => Str::random(10),
            'name' => $products[$product],
            'unit' => null,
            'brand' => $this->faker->company(),
            'measurement_type' => ProductMeasurementTypeEnum::PIECES,
            'low_quantity' => rand(5,10),
            'is_active' => 1,
            'user_id' => 1,
            'account_id' => 1,
        ];
    }
}
