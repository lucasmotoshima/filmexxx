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

//namespace App\Http\Controllers;
//use Illuminate\Http\Request;

Route::get('/', 'FilmeController@index');

Route::post('/buscar', 'FilmeController@index');

Route::get('/detalhe/{movie_id}', 'FilmeController@detalhe');
	





















