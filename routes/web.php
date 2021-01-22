<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@vueroute');
Route::get('/listar-pessoas', 'PessoaController@listarPessoas');
Route::get('/lista-pessoa-por-id', 'PessoaController@listaPessoaPorId');
Route::post('/incluir-pessoa', 'PessoaController@incluirPessoa');
Route::post('/alterar-dados-pessoa', 'PessoaController@alterarDadosPessoa');
Route::post('/excluir-pessoa', 'PessoaController@excluirPessoa');

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
