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
Route::get('/',                             'MainController@login')->name('login');
Route::post('/checklogin',                  'MainController@checkLogin');
Route::get('/register',                     'MainController@register');
Route::post('/register/process',            'MainController@registerProcess');
Route::get('/login/passwordlost',           'MainController@passwordLost');
Route::post('/login/passwordlost/process',  'MainController@passwordLostProcess');

Route::get('/login/resetpassword/{user_id}/token/{token}',            'MainController@passwordRessetToken');
Route::post('/login/resetpassword/{user_id}/token/{token}/process',   'MainController@passwordRessetTokenProcess');




/*Route::get('/', function () {
    return view('welcome');
});*/

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


 //USUARIOS
 route::get('/users/list',               'UserController@list')->name('users.list');
 route::get('/users/add',                'UserController@add')->name('users.add');
 Route::get('/users/passwordchange',     'UserController@passwordchange');
 route::get('/users/{user_id}',          'UserController@details')->name('users.details');
 route::get('/users/{user_id}/delete',   'UserController@delete')->name('users.delete');
 route::post('/users/process',           'UserController@process')->name('users.process');
 //CAMBIAR CLAVE
 Route::post('/users/passwordchange/process','UserController@passwordchangeProcess');