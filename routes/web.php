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
//Route::resource('/Almacen','AlmacenController');


//almacen
Route::get('Almacen',['as' => 'almacen','uses'=>'AlmacenController@index']);
 Route::get('Almacen/create',['as' => 'almacen-create','uses'=>'AlmacenController@create']);
    Route::post('Almacen/guardar',['as' => 'almacen-store','uses'=>'AlmacenController@store']);

Route::get('Tienda',['as' => 'tienda','uses'=>'TiendaController@index']);
