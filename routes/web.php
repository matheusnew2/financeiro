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
Route::get('/dashboard', "DashboardCtrl@index");
Route::get('/lancamento', "LancamentoCtrl@index");
Route::get('/ListaContaFixa', "FixoCtrl@index");

Route::get('/ContaFixa/{id?}', "FixoCtrl@cadastrar")->name('ContaFixa');

Route::post('/CadastrarContaFixa', "FixoCtrl@cadastrar");

