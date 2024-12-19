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
            'num_patrimonial' => fake()->unique()->number(6),
            'marca' => 'Lenovo',
            'descricao' => fake()->text(100),
            'serial' => fake()->unique()->number(10),
            'setor' => Setor::factory(),
            'sala'=> Sala::factory(),
        ];
    }
}
