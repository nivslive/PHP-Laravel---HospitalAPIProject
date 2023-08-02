<?php

namespace Tests\Feature;

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicoPacienteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    
    public function test_should_can_i_vinculate_paciente_in_medico(): void {
        $user = User::factory()->create();
        $token = auth()->attempt(['email' => $user->email, 'password' => 'password']);

        $medico = Medico::factory()->create();
        $paciente = Paciente::factory()->create();

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->post("/medicos/{$medico->id}/pacientes", ['paciente_id' => $paciente->id, 'medico_id' => $medico->id]);

        $response->assertStatus(200);

    }

    public function test_should_return_the_paciente_list_vinculed_in_medico() {
        $user = User::factory()->create();
        $token = auth()->attempt(['email' => $user->email, 'password' => 'password']);

        $medico = Medico::factory()->create();
        $paciente = Paciente::factory()->create();

        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->post("/medicos/{$medico->id}/pacientes", ['paciente_id' => $paciente->id, 'medico_id' => $medico->id]);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->get("/medicos/{$medico->id}/pacientes");

        $response->assertStatus(200);
    }
}
