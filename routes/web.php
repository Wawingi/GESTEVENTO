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
    return view('dashboard');
});

<<<<<<< HEAD
Route::get('/inserir',function(){
    return view('inserirevento');
});

Route::get('/listar','EventoController@listar');
Route::post('/inserir','EventoController@inserir');
Route::get('/editar/{id}','EventoController@editar');
Route::post('/actualizar/{id}','EventoController@actualizar');
Route::get('/eliminar/{id}','EventoController@eliminar');
Route::get('/ver/{id}','EventoController@ver');


//Route::resource('evento','EventoController');
=======
Route::get('inserir',function(){
    return view('inserirevento');
});

Route::get('listar','EventoController@listar');
Route::post('inserir','EventoController@inserir');
Route::resource('evento','EventoController');
Route::get('editar/{id}','EventoController@editar');
Route::post('actualizar/{id}','EventoController@actualizar');
Route::get('eliminar/{id}','EventoController@eliminar');
Route::get('/ver/{id}','EventoController@ver');

Route::Post('editarEvento','EventoController@editarEvento');
Route::Post('apagarEvento','EventoController@apagarEvento');

>>>>>>> Lançamento com requisição AJAX

