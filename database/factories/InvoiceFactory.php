<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $no = 0;

    public function definition()
    {
        $client = Client::inRandomOrder()->implode('id');
        return [
            'number' => 'INV' . (self::$no++).'/22',
            'total_price' => fake()->randomDigit(),
            'issuance_date' => fake()->date(),
            'client_id' => $client[0],
        ];
    }
}
