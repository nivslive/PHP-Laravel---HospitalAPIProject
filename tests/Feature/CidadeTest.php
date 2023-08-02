<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CidadeTest extends TestCase
{
    public function test_should_can_i_use_cidades_list_endpoint(): void
    {
        $response = $this->get('/cidades');
        $response->assertStatus(200);
    }


    public function test_list_medicos_by_cidade(): void {
        
        $cidade = \App\Models\Cidade::create([
            'nome' => 'bertioga',
            'estado' => 'SP',
        ]);

        $user = \App\Models\User::factory()->create();
        $token = auth()->attempt(['email' => $user->email, 'password' => 'password']);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token]);
        $response = $response->get("/cidades/{$cidade->id}/medicos");
        $response->assertStatus(200);
    }
}
