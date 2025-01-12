<?php

namespace Database\Factories;

use App\Models\Setor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sala>
 */
class SalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numSala'=> fake()->unique()->numberBetween(212, 432),
            'setores_id' => Setor::factory(),
            'dispositivo' =>fake()->unique()->text(10),
        ];
    }
}
