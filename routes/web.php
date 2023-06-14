<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{SeriesController, TemporadasController, EpisodiosController, EntrarController, RegistrarController, HomeController};

Route::get('/', function () {
    return redirect('/series');
});

Route::get('/series', [SeriesController::class, 'all'])
    ->name('listar_series');
Route::get('/remover-serie/{id}', [SeriesController::class, 'destroy'])
    ->name('remover_serie');
Route::get('/adicionar-serie', [SeriesController::class, 'create'])
    ->name('adicionar_serie')
    ->middleware('autenticador');
Route::post('/adicionar-serie', [SeriesController::class, 'save']);
Route::post('/alterar-nome-serie/{id}', [SeriesController::class, 'changeName']);

Route::get('/series/{id}/temporadas', [TemporadasController::class, 'all'])->name('temporadas_da_serie');
Route::get('/temporadas/{temporadaId}/episodios', [EpisodiosController::class, 'all'])->name('episodios_da_temporada');
Route::post('/temporadas/{temporadaId}/assistir-episodios', [EpisodiosController::class, 'assistir'])
    ->name('assistir_episodios')
    ->middleware('autenticador');

Route::get('/entrar', [EntrarController::class, 'form'])
    ->name('entrar');
Route::post('/entrar', [EntrarController::class, 'entrar']);
Route::get('/novo-usuario', [RegistrarController::class, 'create'])
    ->name('novo_usuario');
Route::post('/novo-usuario', [RegistrarController::class, 'store']);

Route::get('/sair', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('entrar');
})->name('sair');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
