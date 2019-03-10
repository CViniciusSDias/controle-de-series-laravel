<?php

namespace App\Helper;

use App\Http\Requests\CriarSerieRequest;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class SerieCreator
{
    public function criarSerieComTemporadas(CriarSerieRequest $request)
    {
        DB::transaction(function () use ($request) {
            /** @var Serie $serie */
            $serie = Serie::create(['nome' => $request->nome]);
            $episodiosPorTemporada = $request->ep_por_temporada ?? 0;

            $this->criarTemporadas($request, $serie, $episodiosPorTemporada);
        });
    }

    /**
     * @param CriarSerieRequest $request
     * @param Serie $serie
     * @param int $episodiosPorTemporada
     */
    private function criarTemporadas(CriarSerieRequest $request, Serie $serie, int $episodiosPorTemporada): void
    {
        for ($i = 1; $i <= $request->qtd_temporadas; $i++) {
            /** @var Temporada $temporada */
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criarEpisodios($episodiosPorTemporada, $temporada);
        }
    }

    /**
     * @param int $qtdEpisodios
     * @param Temporada $temporada
     */
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
