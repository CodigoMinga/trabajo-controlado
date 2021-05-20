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

//Rutas CLientes
Route::get('/clients/list','ClientController@list')->name('clients.list');
Route::get('/clients/add','ClientController@add')->name('clients.add');
Route::post('/clients/add/process','ClientController@addProcess');
Route::get('/clients/details','ClientController@details')->name('clients.details');
Route::get('/clients/{client_id}','ClientController@details')->name('clients.details');
Route::post('/clients/{client_id}/edit/process','ClientController@editprocess');
Route::get('/clients/{client_id}/delete','ClientController@delete');

//Rutas Proyectos
route::get('/proyects/list','ProyectController@list')->name('proyects.list');
route::get('/proyects/add','ProyectController@add')->name('proyects.add');
route::get('/proyects/{proyect_id}','ProyectController@details')->name('proyects.details');
route::get('/proyects/{proyect_id}/delete','ProyectController@delete')->name('proyects.delete');
route::post('/proyects/process', 'ProyectController@process');

