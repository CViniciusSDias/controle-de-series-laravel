<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdicionarSeriePageTest extends TestCase
{
    use RefreshDatabase;

    public function testUsuarioAnonimoNaoDeveAcessarEstaPagina()
    {
        $response = $this->get('/adicionar-serie');

        $response->assertRedirect('/entrar');
    }

    public function testUsuarioLogadoDeveAcessarAPaginaComSucesso()
    {
        $usuarioLogado = factory(User::class)->create();
        $response = $this
            ->actingAs($usuarioLogado)
            ->get('/adicionar-serie');

        $response->assertStatus(200);
    }
}
