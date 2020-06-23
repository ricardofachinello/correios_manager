<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

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

/*
TO DO
Rotas da API

*/


Auth::routes();
Route::group(['middleware'=>'auth'], function() {
    Route::get('/', function () {return redirect()->route('encomendas');});  
    Route::group(['prefix'=>'encomendas', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any('',             ['as'=>'encomendas',         'uses'=>'EncomendasController@index'  ]);
        Route::get('create',       ['as'=>'encomendas.create',  'uses'=>'EncomendasController@create' ]);
        Route::post('store',       ['as'=>'encomendas.store',   'uses'=>'EncomendasController@store'  ]);
        Route::get('{id}/destroy', ['as'=>'encomendas.destroy', 'uses'=>'EncomendasController@destroy']);
        Route::get('{id}/edit',    ['as'=>'encomendas.edit',    'uses'=>'EncomendasController@edit'   ]);
        Route::put('{id}/update',  ['as'=>'encomendas.update',  'uses'=>'EncomendasController@update' ]);
    });
    Route::group(['prefix'=>'grupos', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any('',             ['as'=>'grupos',         'uses'=>'GruposController@index'  ]);
        Route::get('create',       ['as'=>'grupos.create',  'uses'=>'GruposController@create' ]);
        Route::post('store',       ['as'=>'grupos.store',   'uses'=>'GruposController@store'  ]);
        Route::get('{id}/destroy', ['as'=>'grupos.destroy', 'uses'=>'GruposController@destroy']);
        Route::get('{id}/edit',    ['as'=>'grupos.edit',    'uses'=>'GruposController@edit'   ]);
        Route::put('{id}/update',  ['as'=>'grupos.update',  'uses'=>'GruposController@update' ]);
    });
});

Route::get('home', function () {return redirect('encomendas');});

Route::get('/send-mail', function () {
    Mail::to('ricardomatheu@hotmail.com')->send(new MailNotifica()); 
    return 'A message has been sent to Mailtrap!';
});