<?php

namespace App\Http\Controllers;

use App\Helper\SerieCreator;
use App\Helper\SerieRemover;
use App\Http\Requests\CriarSerieRequest;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function all(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem.sucesso');

        return view('series.all', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function save(CriarSerieRequest $request, SerieCreator $criadorDeSerie)
    {
        $criadorDeSerie->criarSerieComTemporadas($request->nome, $request->qtd_temporadas, $request->ep_por_temporada);

        $request->session()->flash('mensagem.sucesso', 'Série com suas respectivas temporadas e episódios adicionada.');
        return redirect()->route('listar_series');
    }

    public function destroy(int $serieId, Request $request, SerieRemover $removedor)
    {
        $nomeSerie = $removedor->removeSerie($serieId);
        $request->session()->flash('mensagem.sucesso', "Série $nomeSerie com suas respectivas temporadas e episódios removida.");

        return redirect()->route('listar_series');
    }

    public function changeName(int $serieId, Request $request)
    {
        sleep(5);
        /** @var Serie $serie */
        $serie = Serie::find($serieId);
        $serie->nome = $request->nome;
        $serie->save();
    }
}
