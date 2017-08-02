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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//cliente
Route::name('create_client_path')->get('/clients/create','ClientController@create');
Route::name('store_client_path')->post('/clients','ClientController@store');
Route::name('edit_client_path')->get('/clients/{client}/edit','ClientController@edit');
Route::name('update_client_path')->get('/clients/{client}','ClientController@update');
Route::name('delete_client_path')->get('/clients/{client}','ClientController@delete');

Route::name('clients_path')->get('/clients','ClientController@index');
Route::name('client_path')->get('/clients/{client}','ClientController@show');
