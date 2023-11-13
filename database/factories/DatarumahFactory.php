<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Datarumah>
 */
class DatarumahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return factory(App\Models\User::class)->create()->id;
            },
            'type_id' => function () {
                return factory(App\Models\Type::class)->create()->id;
            },
            'kode_rumah' =>  $this->faker->sentence,
            'alamat' => $this->faker->address,
            'pdam' =>  $this->faker->sentence,
            'pln' =>  $this->faker->sentence,
            'latitude' =>  $this->faker->sentence,
            'longtitude' =>  $this->faker->sentence,
            'jatuh_tempo' =>  $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'foto' => $this->faker->imageUrl(),
            'jumlah_penghuni' =>  $this->faker->numberBetween(1, 10),
        ];
    }
}

