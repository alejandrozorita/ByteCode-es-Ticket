<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as'=>'tickets.ultimos', 'uses' => 'TicketsController@ultimos']);

Route::get('/populares', ['as'=>'tickets.populares', 'uses' => 'TicketsController@populares']);

Route::get('/pendientes', ['as'=>'tickets.pendientes', 'uses' => 'TicketsController@pendietes']);

Route::get('/cerrados', ['as'=>'tickets.cerrados', 'uses' => 'TicketsController@cerrados']);

Route::get('/solicitud/{id}', ['as'=>'tickets.detalle', 'uses' => 'TicketsController@detalle']);



Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
