<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_should_i_can_create_medico(): void
    {
        $response = $this->get('/cidades');
        $response->assertStatus(200);
    }
}
