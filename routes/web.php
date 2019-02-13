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


Route::get('/', 'PagesController@home');


Route::get('/users','UserController@home');

Route::get('/users/create','UserController@createForm');

Route::get('/users/update/{id}','UserController@updateForm');

Route::post('/users','UserController@create');
Route::delete('/users/{id}','UserController@drop');
Route::patch('/users/{id}','UserController@update');
Route::get('/users/{id}','UserController@getUser');