<?php

namespace Database\Factories;

use App\Models\MedicoPaciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoPacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MedicoPaciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'paciente_id' => \App\Models\Paciente::factory()->create()->id,
            'medico_id' => \App\Models\Medico::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
