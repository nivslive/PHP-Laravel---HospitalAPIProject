<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\{PacienteSeeder, MedicoPacienteSeeder, MedicoSeeder, CidadeSeeder};
use \Illuminate\Support\Facades\Session;
class MedicoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_should_can_i_use_medicos_list_endpoint(): void
    {
        $response = $this->get('/medicos');
        $response->assertStatus(200);
    }

    public function test_should_create_a_new_medico(): void {
        $user = \App\Models\User::factory()->create();
        \App\Models\Cidade::create([
            'nome' => 'bertioga',
            'estado' => 'SP',
        ]);
        $token = auth()->attempt(['email' => $user->email, 'password' => 'password']);
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->post('/medicos', ['nome' => 'test', 'cidade' => 'bertioga', 'especialidade' => 'Teste']);
            
        $response->assertStatus(200);
    }

    public function test_should_return_medicos_list_endpoint(): void
    {
        $this->seed(MedicoSeeder::class); 
        $response = $this->get('/medicos');

        $response->assertStatus(200);
                
        // $this->assertCount(10, json_decode($response->getContent()));
        //or...
        $response->assertJsonCount(10);
    }
}
