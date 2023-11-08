<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_type' => $this->faker->sentence,
            'ukuran' => $this->faker->sentence,
            'spesifikasi' => $this->faker->sentence,
            'harga' => $this->faker->numberBetween(100000, 100000000),
        ];
    }
}
