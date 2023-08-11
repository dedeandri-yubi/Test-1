<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchant>
 */
class MerchantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_id' => \App\Models\City::factory(),
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'expired_date' => $this->faker->date(),
        ];
    }
}
