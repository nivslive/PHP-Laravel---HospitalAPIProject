<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PacienteTest extends TestCase
{
    /**
     * A basic feature test example.
     */ 

    use RefreshDatabase;

    public function test_should_i_can_create_a_new_paciente() {

        $user = \App\Models\User::factory()->create();
        $token = auth()->attempt(['email' => $user->email, 'password' => 'password']);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->post('/pacientes', ['nome' => 'Teste paciente', 'cpf' => '444.585.535-35', 'celular' => '(11)94829-4242']);
    
        $response->assertStatus(200);
    }

    public function test_should_i_can_update_a_paciente() {

        $user = \App\Models\User::factory()->create();
        $paciente = \App\Models\Paciente::factory()->create();
        $token = auth()->attempt(['email' => $user->email, 'password' => 'password']);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->put("/pacientes/{$paciente->id}", ['nome' => 'Teste paciente', 'cpf' => '444.585.535-35', 'celular' => '(11)94829-4242']);
    
        $response->assertStatus(200);
    }
}
