<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function all(int $temporadaId, Request $request)
    {
        $episodios = Episodio::query()->where('temporada_id', $temporadaId)->orderBy('numero')->get();
        $mensagem = $request->session()->get('mensagem.sucesso');

        return view('episodios.all', compact('episodios', 'temporadaId', 'mensagem'));
    }

    public function assistir(int $temporadaId, Request $request)
    {
        $episodiosAssitidos = array_keys($request->episodio);
        $temporada = Temporada::find($temporadaId);

        $temporada->episodios->each(function ($episodio) use ($episodiosAssitidos) {
            $episodio->assistido = in_array($episodio->id, $episodiosAssitidos);
        });
        $temporada->push();

        $request->session()->flash('mensagem.sucesso', 'Episódios marcados como assistidos');

        return redirect()->route('temporadas_da_serie', $temporada->serie_id);
    }
}
