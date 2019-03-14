<?php

namespace Tests\Feature;

use App\Serie;
use App\Temporada;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuscaPorEpisodiosTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetEpisodiosAssistidosDeveRetornarApenasEpisodiosAssistidos()
    {
        /** @var Serie $serie */
        $serie = factory(Serie::class)->make();
        /** @var Temporada $temporada */
        $temporada = $serie->temporadas->first();

        foreach ($temporada->getEpisodiosAssitidos() as $episodiosAssitido) {
            $this->assertTrue($episodiosAssitido->assistido);
        }
    }

    public function testBuscaPorEpisodiosDeveRetornarUmEpisodio()
    {
        /** @var Serie $serie */
        $serie = factory(Serie::class)->make();
        /** @var Temporada $temporada */
        $temporada = $serie->temporadas->first();

        $this->assertCount(1, $temporada->episodios);
    }
}
