<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition()
    {
        $user_id = User::inRandomOrder()->implode('id');

        return [
            'name' => fake()->name(),
            'price' => fake()->randomDigit(),
            'user_id' => $user_id[0]
        ];
    }
}
