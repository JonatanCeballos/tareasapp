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

Route::get('/', 'TareasController@index')-> name('tareas.index');
Route::post('/tareas/', 'TareasController@store')-> name('tareas.store');
Route::put('/tareas/{tarea}', 'TareasController@update')-> name('tareas.update');

Route::get('/diagrama', 'DiagramaController@index')-> name('diagrama.index');