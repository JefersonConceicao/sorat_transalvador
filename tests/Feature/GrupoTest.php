<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;

class GrupoTest extends TestCase
{
    use DatabaseTransactions;

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

    public function test_nao_deve_armazenar_grupo_sem_nome(){
         
        $user = User::factory()->create([
            'usu_num_senha' => md5('123456')
        ]);
    }
}
