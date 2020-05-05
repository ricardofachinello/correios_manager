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



Auth::routes();

Route::get('encomendas', 'EncomendasController@index');
Route::get('encomendas/create', 'EncomendasController@create');
Route::post('encomendas/store', 'EncomendasController@store');


Route::get('/', function () {return view('home');});
Route::get('home', function () {return redirect('encomendas');});
