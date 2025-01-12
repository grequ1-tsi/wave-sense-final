<?php

namespace Database\Factories;

use App\Models\Sala;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemPatrimonial>
 */
class ItemPatrimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */    public function definition(): array
    {
        return [
            'num_patrimonial' => fake()->unique()->numberBetween(10000000, 99999999),
            'marca' => 'Lenovo',
            'descricao' => fake()->text(100),
            'serial' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'setores_id' => Setor::factory(),
            'salas_id'=> Sala::factory(),
        ];
    }
}
