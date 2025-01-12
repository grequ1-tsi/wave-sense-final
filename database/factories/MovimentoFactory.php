<?php

namespace Database\Factories;

use App\Models\ItemPatrimonial;
use App\Models\Sala;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimento>
 */
class MovimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'num_patrimonial' => ItemPatrimonial::factory(),
            'salas_id' => Sala::factory(),
            'status' => fake()->randomElement(['IN', 'OUT']),
            'data' => $this->faker->date(),
            'horario' => $this->faker->time(),
        ];
    }
}
