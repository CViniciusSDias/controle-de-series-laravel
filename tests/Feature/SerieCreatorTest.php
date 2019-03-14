<?php

namespace Tests\Feature;

use App\Helper\SerieCreator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SerieCreatorTest extends TestCase
{
    use RefreshDatabase;

    public function testCriarSerieESuasTemporadasDeveSalvarNoBanco()
    {
        $serieCreator = new SerieCreator();
        $nomeSerie = 'Nome seriado';
        $serieCreator->criarSerieComTemporadas($nomeSerie, 1, 1);

        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
        $this->assertDatabaseHas('temporadas', ['numero' => 1]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);

        return 1;
    }
}
