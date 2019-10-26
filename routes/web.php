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
    return view('auth.login');
});

Route::get('/inserir',function(){
    return view('inserirevento');  
});

Route::get('/pdf',function(){
    return view('pdfevento');
});

Route::get('/listar','EventoController@listar');
Route::post('/inserir','EventoController@inserir');
Route::get('/editar/{id}','EventoController@editar');
Route::post('/actualizar/{id}','EventoController@actualizar');
Route::get('/eliminar/{id}','EventoController@eliminar');
Route::get('/ver/{id}','EventoController@ver');
Route::get('/eventoPDF/{id}','EventoController@verPDF');


//Route::resource('evento','EventoController');
Route::get('inserir',function(){
    return view('inserirevento');
})->middleware('auth');

//Rotas para AJAX
Route::get('listar','EventoController@listar');
Route::post('inserir','EventoController@inserir');
Route::resource('evento','EventoController');
Route::get('editar/{id}','EventoController@editar');
Route::post('actualizar/{id}','EventoController@actualizar');
Route::get('eliminar/{id}','EventoController@eliminar');
Route::get('/ver/{id}','EventoController@ver');

Route::Post('editarEvento','EventoController@editarEvento');
Route::Post('apagarEvento','EventoController@apagarEvento');

//ROTAS ASSENTO
Route::post('inserirAssento','AssentoController@inserirAssento');
Route::get('/eliminarAssento/{id}/{id1}','AssentoController@eliminar');
Route::get('/verAssento/{id}','AssentoController@ver');

//ROTAS CONVIDADO
Route::post('inserirConvidado','ConvidadoController@inserirConvidado');
Route::get('verqrcode/{nome}','ConvidadoController@verQRCODE');
Route::post('apagarConvidado','ConvidadoController@eliminar');



Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');



