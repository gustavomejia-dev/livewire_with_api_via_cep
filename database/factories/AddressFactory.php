<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'zipcode' =>fake()->name(),
            'street' =>Str::random(10),
            'neighborhood' =>Str::random(10),
            'city' =>Str::random(10),
            'state' =>Str::random(2),
        ];
    }
}
