<?php

namespace App\Helper;

use App\Http\Requests\CriarSerieRequest;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class SerieCreator
{
    public function criarSerieComTemporadas(string $nomeSerie, int $qtdTemporadas, ?int $epPorTemporada)
    {
        DB::transaction(function () use ($nomeSerie, $qtdTemporadas, $epPorTemporada) {
            /** @var Serie $serie */
            $serie = Serie::create(['nome' => $nomeSerie]);
            $episodiosPorTemporada = $epPorTemporada ?? 0;

            $this->criarTemporadas($qtdTemporadas, $serie, $episodiosPorTemporada);
        });
    }

    private function criarTemporadas(int $qtdTemporadas, Serie $serie, int $episodiosPorTemporada): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            /** @var Temporada $temporada */
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criarEpisodios($episodiosPorTemporada, $temporada);
        }
    }

    private function criarEpisodios(int $qtdEpisodios, Temporada $temporada): void
    {
        for ($j = 1; $j <= $qtdEpisodios; $j++) {
            $temporada->episodios()->create([
                'numero' => $j,
                'assistido' => 'false'
            ]);
        }
    }
}
