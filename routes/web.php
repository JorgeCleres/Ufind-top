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
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('produtos', 'ProdutoController');
});

Route::get('/anuncios',['as'=>'anuncios','uses'=>'AnuncioController@index']);
Route::get('/anuncios/info/{id}',['as'=>'anuncios.info','uses'=>'AnuncioController@info']);

Route::get('/produtos',['as'=>'produtos','uses'=>'ProdutoController@index']);
Route::get('/anunciar', ['as'=>'produtos.anunciar','uses'=>'ProdutoController@anunciar']);
Route::post('/produtos/salvar',['as'=>'produtos.salvar','uses'=>'ProdutoController@salvar']);
Route::get('/produtos/editar/{id}/{usuario_id}',['as'=>'produtos.editar','uses'=>'ProdutoController@editar']);
Route::put('/produtos/atualizar/{id}',['as'=>'produtos.atualizar','uses'=>'ProdutoController@atualizar']);
Route::get('/produtos/deletar/{id}/{usuario_id}',['as'=>'produtos.deletar','uses'=>'ProdutoController@deletar']);
Route::get('/editarusuario',['as'=>'editarusuario','uses'=>'EditarUserController@index']);
Route::put('/editarusuario/update',['as'=>'editarusuario.update','uses'=>'EditarUserController@update']);