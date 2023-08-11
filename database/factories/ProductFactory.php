<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'merchant_id' => \App\Models\Merchant::factory(),
            'name' => $this->faker->randomElement(["Nasi Goreng","Mie Ayam","Takoyaki","Sop Buah","Toge Goreng","Bakso"]),
            'price' => $this->faker->randomNumber(),
        ];
    }
}
