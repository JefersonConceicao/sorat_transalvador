<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class GrupoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_renderiza_lista_grupos()
    {
        $user = User::factory()->create([
            'usu_num_senha' => md5('123456')
        ]);
        
        $response = $this
            ->actingAs($user)
            ->get('/grupos');

        $response->assertSee('Grupos');
    }   
}
