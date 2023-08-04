<?php

namespace Database\Factories;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'especialidade' => fake()->jobTitle(),
            'cidade_id' => \App\Models\Cidade::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
