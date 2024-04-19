<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merk' => fake()->name(),
            'model' => fake()->address(),
            'n_plat' => fake()->phoneNumber(),
            'tarif' => fake()->randomNumber(),
            'foto' => fake()->imageUrl(),
            'stok' => fake()->randomNumber()
        ];
    }
}
