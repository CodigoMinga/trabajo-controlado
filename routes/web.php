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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/clients/list','ClientController@list')->name('clients.list');
Route::get('/clients/add','ClientController@add')->name('clients.add');
Route::post('/clients/add/process','ClientController@addProcess');
Route::get('/clients/details','ClientController@details')->name('clients.details');
Route::get('/clients/{client_id}','ClientController@details')->name('clients.details');
Route::post('/clients/{client_id}/edit/process','ClientController@editprocess');
Route::get('/clients/{client_id}/delete','ClientController@delete');



route::get('/users/list',               'UserController@list')->name('users.list');
route::get('/users/add',                'UserController@add')->name('users.add');
//route::get('/users/{user_id}',          'UserController@details')->name('users.details');
//route::get('/users/{user_id}/delete',   'UserController@delete')->name('users.delete');
//route::post('/users/process',           'UserController@process')->name('users.process');