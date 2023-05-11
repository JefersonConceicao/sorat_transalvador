<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    /**
     * @return void
     */
    public function test_deve_renderizar_tela_login()
    {
        $response = $this->get('/auth/login');
        $response->assertStatus(200);
    }

    public function test_usuario_nao_deve_logar_sem_credenciais(){

        $response = $this
        ->from('/auth/login')->post('/auth/authenticate' , [
            'login' => '',
            'senha' => ''
        ]);

        $response->assertStatus(302);
        $this->followRedirects($response)->assertSee('Campo obrigatório');
    }

    public function test_credenciais_incorretas_retorna_ao_login(){
        
        $response = $this
            ->from('/auth/login')->post('/auth/authenticate' , [
            'login' => '1',
            'senha' => '1'
        ]);

        $response->assertStatus(302);

        $this
            ->followRedirects($response)
            ->assertSee('Login ou senha incorretos');

    }

    public function test_autenticacao_deve_retornar_sucesso(){

        $user = User::factory()->create([
            'usu_num_senha' => md5($senha = '123456')
        ]);

        $credentials = [
            'login' => $user->usu_nom_login,
            'senha' => $senha
        ];
        
        $response = $this->from('/auth/login')->post('/auth/authenticate', $credentials);
        $response->assertRedirect('/');
        
        $this->assertAuthenticatedAs($user);
    }

    public function test_usuario_logout(){

        $user = User::factory()->create([
            'usu_num_senha' => '123456'
        ]);

        $this
        ->actingAs($user)
        ->get('/logout');

        $this->assertGuest();
    }
}
