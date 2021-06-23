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

//Login
Route::get('/',                      'MainController@login')->name('login');
Route::post('/checklogin',           'MainController@checkLogin');
//Route::get('/register',              'MainController@register');
//Route::post('/register/process',     'MainController@registerProcess');

Route::get('/passwordlost', 'MainController@passwordLost');
Route::post('/passwordlost/process', 'MainController@passwordLostProcess');

Route::get('/resetpassword/{user_id}/token/{token}', 'MainController@passwordRessetToken');
Route::post('/resetpassword/{user_id}/token/{token}/process', 'MainController@passwordRessetTokenProcess');

//ESTAS RUTAS NECESITAN ESTAR LOGUEADO
Route::group(['middleware' => ['auth']], function() {

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
route::get('/proyects/assign','ProyectController@assign')->name('proyects.assign');
route::get('/proyects/add','ProyectController@add')->name('proyects.add');
route::get('/proyects/{proyect_id}','ProyectController@details')->name('proyects.details');
route::get('/proyects/{proyect_id}/delete','ProyectController@delete')->name('proyects.delete');
route::post('/proyects/process', 'ProyectController@process');
route::get('/proyects/{proyect_id}/items','ProyectController@assignitems');

//Rutas Items
route::get('/items/list','ItemController@list')->name('items.list');
route::get('/items/add','ItemController@add')->name('items.add');
route::get('/items/{item_id}','ItemController@details')->name('items.details');
route::get('/items/{item_id}/delete','ItemController@delete')->name('items.delete');
route::post('/items/process', 'ItemController@process');
route::get('proyects/{proyect_id}/items/{item_id}/tasks',    'ItemController@taskitem');

//Rutas Tareas
route::get('/tasks/list',               'TaskController@list')->name('tasks.list');
route::get('/tasks/add',                'TaskController@add')->name('tasks.add');
route::get('/tasks/{task_id}',          'TaskController@details')->name('tasks.details');
route::get('/tasks/{task_id}/delete',   'TaskController@delete')->name('tasks.delete');
route::post('/tasks/process',           'TaskController@process')->name('tasks.process');

//Rutas avance
route::get('/advances/list',               'AdvanceController@list')->name('advances.list');
route::get('/advances/add',                'AdvanceController@add')->name('advances.add');
route::get('/advances/{advance_id}',          'AdvanceController@details')->name('advances.details');
route::get('/advances/{advance_id}/delete',   'AdvanceController@delete')->name('advances.delete');
route::post('/advances/process',           'AdvanceController@process')->name('advances.process');

 //USUARIOS
 route::get('/users/list',               'UserController@list')->name('users.list');
 route::get('/users/add',                'UserController@add')->name('users.add');
 Route::get('/users/passwordchange',     'UserController@passwordchange');
 route::get('/users/{user_id}',          'UserController@details')->name('users.details');
 route::get('/users/{user_id}/delete',   'UserController@delete')->name('users.delete');
 route::post('/users/process',           'UserController@process')->name('users.process');
 //CAMBIAR CLAVE
 Route::post('/users/passwordchange/process','UserController@passwordchangeProcess');

 //LOGOUT
 route::get('/logout','MainController@logout');

});