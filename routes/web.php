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
Route::group(['prefix'=>'encomendas', 'where'=>['id'=>'[0-9]']], function () {
    Route::get('',             ['as'=>'encomendas',         'uses'=>'EncomendasController@index'  ]);
    Route::get('create',       ['as'=>'encomendas.create',  'uses'=>'EncomendasController@create' ]);
    Route::post('store',       ['as'=>'encomendas.store',   'uses'=>'EncomendasController@store'  ]);
    Route::get('{id}/destroy', ['as'=>'encomendas.destroy', 'uses'=>'EncomendasController@destroy']);
    Route::get('{id}/edit',    ['as'=>'encomendas.edit',    'uses'=>'EncomendasController@edit'   ]);
    Route::put('{id}/update',  ['as'=>'encomendas.update',  'uses'=>'EncomendasController@update' ]);
});


Route::get('/', function () {return view('home');});
Route::get('home', function () {return redirect('encomendas');});
