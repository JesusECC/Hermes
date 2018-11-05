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


// tienda
Route::get('Tienda',['as'=>'tienda','uses'=>'TiendaController@index']);
 Route::get('Tienda/create',['as' => 'tienda-create','uses'=>'TiendaController@create']);
  Route::get('Tienda/{idTienda}/edit',['as'=>'Tienda','uses'=>'ControllerClientes@edit']);


//roles
Route::get('rol',['as' => 'rol-index','uses'=>'RolController@index']);
Route::get('rol/create',['as' => 'rol-create','uses'=>'RolController@create']);
Route::post('rol/guardar',['as' => 'rol-guardar','uses'=>'RolController@store']);
Route::get('rol/editar/{id}',['as' => 'rol-editar','uses'=>'RolController@edit']);
Route::post('rol/update',['as' => 'rol-update','uses'=>'RolController@update']);
Route::get('rol/delete/{id}',['as' => 'rol-delete','uses'=>'RolController@destroy']);


// estado
Route::get('estado',['as' => 'estado-index','uses'=>'EstadoController@index']);
Route::get('estado/create',['as' => 'estado-create','uses'=>'EstadoController@create']);
Route::post('estado/guardar',['as' => 'estado-guardar','uses'=>'EstadoController@store']);
Route::get('estado/editar/{id}',['as' => 'estado-editar','uses'=>'EstadoController@edit']);
<<<<<<< HEAD
Route::post('estado/update/{id}',['as' => 'estado-update','uses'=>'EstadoController@update']);
Route::get('estado/delete/{id}',['as' => 'estado-delete','uses'=>'EstadoController@destroy']);

// tipo documento
Route::get('documento',['as' => 'documento-index','uses'=>'Tipo_documentoController@index']);
Route::get('documento/create',['as' => 'documento-create','uses'=>'Tipo_documentoController@create']);
Route::post('documento/guardar',['as' => 'documento-guardar','uses'=>'Tipo_documentoController@store']);
Route::get('documento/editar/{id}',['as' => 'documento-editar','uses'=>'Tipo_documentoController@edit']);
Route::post('documento/update/{id}',['as' => 'documento-update','uses'=>'Tipo_documentoController@update']);
Route::get('documento/delete/{id}',['as' => 'documento-delete','uses'=>'Tipo_documentoController@destroy']);
=======
Route::post('estado/update',['as' => 'estado-update','uses'=>'EstadoController@update']);
Route::get('estado/delete/{id}',['as' => 'estado-delete','uses'=>'EstadoController@destroy']);


//color
Route::get('color',['as'=> 'color-index','uses'=>'ColorController@index']);
Route::get('color/create',['as'=>'color-create','uses'=>'ColorController@create']);
Route::post('color/guardar',['as'=>'color-guardar','uses'=>'ColorController@store']);
Route::get('color/editar/{id}',['as'=>'color-edit','uses'=>'ColorController@edit']);
Route::post('color/upadte',['as'=>'color-update','uses'=>'ColorController@update']);
Route::get('color/delete/{id}',['as'=>'color-delete','uses'=>'ColorController@destroy']);

//talla
Route::get('talla',['as'=>'talla-index','uses'=>'TallasController@index']);
Route::get('talla/create',['as'=>'talla-create','uses'=>'TallasController@create']);
Route::post('talla/guardar',['as'=>'talla-guardar','uses'=>'TallasController@store']);
Route::get('talla/editar/{id}',['as'=>'talla-edit','uses'=>'TallasController@edit']);
Route::post('talla/update',['as'=>'talla-update','uses'=>'TallasController@update']);
Route::get('tall/delete/{id}',['as'=>'talla-delete','uses'=>'TallasController@destroy']);


//tipo_salida
Route::get('tipo_salida',['as'=>'tipo_salida-index','uses'=>'Tipo_salidaController@index']);
Route::get('tipo_salida/create',['as'=>'tipo_salida-create','uses'=>'Tipo_salidaController@create']);
Route::post('tipo_salida/guardar',['as'=>'tipo_salida-guardar','uses'=>'Tipo_salidaController@store']);
Route::get('tipo_salida/editar/{id}',['as'=>'tipo_salida-edit','uses'=>'Tipo_salidaController@edit']);
Route::post('tipo_salida/update',['as'=>'tipo_salida-update','uses'=>'Tipo_salidaController@update']);
Route::get('tipo_salida/delete/{id}',['as'=>'tipo_salida-delete','uses'=>'Tipo_salidaController@destroy']);


//tipo_salida_mp
Route::get('tipo_salida_mp',['as'=>'tipo_salida_mp-index','uses'=>'Tipo_salida_MPController@index']);
Route::get('tipo_salida_mp/create',['as'=>'tipo_salida_mp-create','uses'=>'Tipo_salida_MPController@create']);
Route::post('tipo_salida_mp/guardar',['as'=>'tipo_salida_mp-guardar','uses'=>'Tipo_salida_MPController@store']);
Route::get('tipo_salida_mp/editar/{id}',['as'=>'tipo_salida_mp-edit','uses'=>'Tipo_salida_MPController@edit']);
Route::post('tipo_salida_mp/update',['as'=>'tipo_salida_mp-update','uses'=>'Tipo_salida_MPController@update']);
Route::get('tipo_salida_mp/delete/{id}',['as'=>'tipo_salida_mp-delete','uses'=>'Tipo_salida_MPController@destroy']);


>>>>>>> 8cdf9ef85044a1cbdc9757679849e000849d98f8
