<?php

namespace App\Http\Controllers;

use App\Temporada;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function all(int $serieId, Request $request)
    {
        $temporadas = Temporada::query()->where('serie_id', $serieId)->orderBy('numero')->get();
        $mensagem = $request->session()->get('mensagem.sucesso');

        return view('temporadas.all', compact('temporadas', 'mensagem'));
    }
}
