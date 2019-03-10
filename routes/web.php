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

Route::get('/', function () {
    return redirect('/series');
});

Route::get('/series', 'SeriesController@all')->name('listar_series');
Route::get('/remover-serie/{id}', 'SeriesController@destroy')->name('remover_serie');
Route::get('/adicionar-serie', 'SeriesController@create')->name('adicionar_serie');
Route::post('/adicionar-serie', 'SeriesController@save')->name('salvar_serie');
Route::post('/alterar-nome-serie/{id}', 'SeriesController@changeName');