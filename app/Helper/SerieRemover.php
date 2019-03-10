<?php

namespace App\Helper;

use App\Episodio;
use App\Serie;
use App\Temporada;

class SerieRemover
{
    public function removeSerie(int $serieId)
    {
        /** @var Serie $serie */
        $serie = Serie::find($serieId);
        $serie->temporadas()->each(function (Temporada $temporada) {
            $temporada->episodios()->each(function (Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
        });
        $nomeSerie = $serie->nome;
        $serie->delete();

        return $nomeSerie;
    }
}
