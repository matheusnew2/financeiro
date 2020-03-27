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

Route::get('/', "DashboardCtrl@index")->name("/")->middleware('autenticar');
Route::get('/dashboard', "DashboardCtrl@index");

Route::get('/Movimentacao/{id?}', "MovimentacaoCtrl@carregar")->name('movimentacao')->middleware('autenticar');
Route::get('/ListaMovimentacao', "MovimentacaoCtrl@lista")->middleware('autenticar');
Route::post('/Movimentacao', "MovimentacaoCtrl@cadastrar")->middleware('autenticar');
Route::post('/Movimentacao/Cancelar/{id?}', "MovimentacaoCtrl@cancelar")->middleware('autenticar');

Route::get('/ListaContaFixa', "FixoCtrl@index")->middleware('autenticar');

Route::get('/ContaFixa/{id?}', "FixoCtrl@carregar")->name('ContaFixa')->middleware('autenticar');
Route::post('/ContaFixa', "FixoCtrl@cadastrar")->middleware('autenticar');

Route::get('/Extrato', "ExtratoCtrl@index")->middleware('autenticar');
Route::post('/Extrato', "ExtratoCtrl@relatorio")->middleware('autenticar');


Route::get('/Conta/{id?}', "ContaCtrl@carregar")->name('Conta')->middleware('autenticar');
Route::post('/Conta', "ContaCtrl@cadastrar")->middleware('autenticar');
Route::get('/ListaConta', "ContaCtrl@lista")->middleware('autenticar');

Route::post('/logar', "LoginCtrl@logar");
Route::get('/login', "LoginCtrl@index");

